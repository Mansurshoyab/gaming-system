<?php

namespace App\Http\Controllers\UserManagement;

use App\Enums\UserManagement\Approval;
use App\Http\Controllers\Controller;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
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
            $updated = $user->update(['status' => $status]);
            if ($updated) {
                return response()->json(['success' => true, 'message' => 'User status changed!'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'No record updated!'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to change user status'], 500);
        }
    }
}
