<?php

namespace App\Http\Controllers\UserManagement;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\RoleRequest;
use App\Models\UserManagement\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        try {
            $roles = Role::orderBy('created_at', 'DESC')->get();
            $total = Role::withTrashed()->count();
            return response()->view('backend.user-management.roles.index', get_defined_vars());
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
            $status = Status::fetch();
            return response()->view('backend.user-management.roles.create', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['status'] = $request->status ?? Status::PENDING;
            Role::create($data);
            return redirect()->route('roles.index')->with('created', 'Role created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): Response
    {
        try {
            $status = Status::fetch();
            return response()->view('backend.user-management.roles.edit', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        try {
            $data = $request->validated();
            $data['updated_at'] = now();
            $role->update($data);
            return redirect()->route('roles.index')->with('updated', 'Role updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): JsonResponse
    {
        try {
            $deleted = $role->delete();
            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Role moved to trash!'], 200);
            } else {
                return response()->json(['success' => true, 'message' => 'No role has deleted.'], 200);
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
            if (!in_array($status, [Status::ENABLE, Status::DISABLE])) {
                return response()->json(['error' => 'Invalid status value'], 401);
            }
            $role = Role::find($id);
            if (!$role) {
                return response()->json(['error' => 'Role not found'], 404);
            }
            $updated = $role->update(['status' => $status, 'updated_at' => now()]);
            if ($updated) {
                return response()->json(['success' => true, 'message' => 'Role status changed!'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'No record updated!'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to change role status'], 500);
        }
    }
}
