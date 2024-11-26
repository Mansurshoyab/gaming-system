<?php

namespace App\Http\Controllers\ProfileManagement;

use App\Http\Controllers\Controller;
use App\Models\UserManagement\Member;
use App\Models\UserManagement\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        try {
            $widgets = $this->defaultWidgets();
            return response()->view('backend.dashboard', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function defaultWidgets() {
        return [
            [ 'icon' => 'coins', 'theme' => 'success', 'label' => 'Today Deposit', 'href' => null, 'data' => 0 ],
            [ 'icon' => 'coins', 'theme' => 'success', 'label' => 'Total Deposit', 'href' => null, 'data' => 0 ],
            [ 'icon' => 'coins', 'theme' => 'info', 'label' => 'Today Withdraw', 'href' => null, 'data' => 0 ],
            [ 'icon' => 'coins', 'theme' => 'info', 'label' => 'Total Withdraw', 'href' => null, 'data' => 0 ],
            [ 'icon' => 'ticket-alt', 'theme' => 'warning', 'label' => 'Support Tickets', 'href' => null, 'data' => 0 ],
            [ 'icon' => 'users', 'theme' => 'primary', 'label' => 'Today Members', 'href' => route('members.today'), 'data' => Member::withTrashed()->whereDate('created_at', today())->count() ],
            [ 'icon' => 'users', 'theme' => 'primary', 'label' => 'Total Members', 'href' => route('members.index'), 'data' => Member::withTrashed()->count() ],
            [ 'icon' => 'users-cog', 'theme' => 'danger', 'label' => 'Admin Users', 'href' => route('users.index'), 'data' => User::withTrashed()->count() ],
            // [ 'icon' => '', 'theme' => '', 'label' => '', 'href' => null, 'data' => 0 ],
        ];
    }
}
