<?php

namespace App\Http\Controllers\UserManagement;

use App\Enums\GlobalUsage\Status;
use App\Enums\UserManagement\Approval;
use App\Events\MemberCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\MemberRequest;
use App\Models\UserManagement\Member;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        try {
            $members = Member::orderBy('created_at', 'DESC')->get();
            $trashes = Member::onlyTrashed('deleted_at', 'DESC')->get();
            $total = Member::withTrashed()->count();
            return response()->view('backend.user-management.members.index', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        try {
            $approval = Approval::fetch();
            return response()->view('backend.user-management.members.create', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['username'] = 'member' . time();
            $data['password'] = Hash::make($data['password']);
            $member = Member::create($data);
            event(new MemberCreated($member));
            return redirect()->route('members.index')->with('created', 'Member created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        try {
            $member->load('profile');
            return response()->json($member);
        } catch (\Exception $e) {
            return back()->json(['error', 'Failed to display member', $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        try {
            $status = Status::fetch();
            return response()->view('backend.user-management.members.edit', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $request, Member $member): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['updated_at'] = now();
            $member->update($data);
            return redirect()->route('members.index')->with('updated', 'Member updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member): JsonResponse
    {
        try {
            $deleted = $member->delete();
            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Member moved to trash!'], 200);
            } else {
                return response()->json(['success' => true, 'message' => 'No member has deleted.'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred!'], 500);
        }
    }

    /**
     * Change status of the specified resource from storage.
     */
    public function status(Request $request) {
        try {
            $id = $request->input('id');
            $status = $request->input('status');
            if (!in_array($status, [Approval::APPROVED, Approval::SUSPENDED])) {
                return response()->json(['error' => 'Invalid status value'], 401);
            }
            $member = Member::find($id);
            if (!$member) {
                return response()->json(['error' => 'Member not found'], 404);
            }
            $updated = $member->update(['status' => $status, 'updated_at' => now()]);
            if ($updated) {
                return response()->json(['success' => true, 'message' => 'Member status changed!'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'No record updated!'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to change member status'], 500);
        }
    }
}
