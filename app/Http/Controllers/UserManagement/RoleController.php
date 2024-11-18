<?php

namespace App\Http\Controllers\UserManagement;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserManagement\RoleRequest;
use App\Models\UserManagement\Role;
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
            $role->update($data);
            return redirect()->route('roles.index')->with('updated', 'Role updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
