<?php

namespace App\Http\Controllers\UserManagement;

use App\Enums\GlobalUsage\Status;
use App\Enums\UserManagement\Approval;
use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\UserRequest;
use App\Models\UserManagement\Role;
use App\Models\UserManagement\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        try {
            $users = User::orderBy('created_at', 'DESC')->get();
            $trashes = User::onlyTrashed('deleted_at', 'DESC')->get();
            $total = User::withTrashed()->count();
            $roles = Role::where('status', Status::ENABLE)->pluck('title', 'id');
            return response()->view('backend.user-management.users.index', get_defined_vars());
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
            $roles = Role::where('status', Status::ENABLE)->pluck('title', 'id');
            $approval = Approval::fetch();
            return response()->view('backend.user-management.users.create', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['username'] = 'user' . time();
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            event(new UserCreated($user));
            return redirect()->route('users.index')->with('created', 'User created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
        try {
            $user->load('profile');
            return response()->json($user);
        } catch (\Exception $e) {
            return back()->json(['error', 'Failed to display user', $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        try {
            $roles = Role::where('status', Status::ENABLE)->pluck('title', 'id');
            $approval = Approval::fetch();
            return response()->view('backend.user-management.users.edit', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['updated_at'] = now();
            $user->update($data);
            return redirect()->route('users.index')->with('updated', 'User updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            $deleted = $user->delete();
            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'User moved to trash!'], 200);
            } else {
                return response()->json(['success' => true, 'message' => 'No user has deleted.'], 200);
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
            $user = User::find($id);
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }
            $updated = $user->update(['status' => $status, 'updated_at' => now()]);
            if ($updated) {
                return response()->json(['success' => true, 'message' => 'User status changed!'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'No record updated!'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to change user status'], 500);
        }
    }

    /**
     * Restore a trashed resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id): JsonResponse {
        try {
            $user = User::withTrashed()->find($id);
            if ($user) {
                $user->restore();
                return response()->json(['message' => 'User restored successfully'], 200);
            } else {
                return response()->json(['message' => 'User not found or already restored'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to restore user', $e->getMessage()], 500);
        }
    }
}
