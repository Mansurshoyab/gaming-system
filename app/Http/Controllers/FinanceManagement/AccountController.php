<?php

namespace App\Http\Controllers\FinanceManagement;

use App\Http\Controllers\Controller;
use App\Models\FinanceManagement\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $accounts = Account::orderBy('created_at', 'DESC')->get();
            $trashes = Account::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
            $total = Account::withTrashed()->count();
            return response()->view('backend.finance-management.accounts.index', get_defined_vars());
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
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
