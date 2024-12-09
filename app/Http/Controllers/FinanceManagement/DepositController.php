<?php

namespace App\Http\Controllers\FinanceManagement;

use App\Enums\FinanceManagement\Payment;
use App\Enums\FinanceManagement\Purpose;
use App\Http\Controllers\Controller;
use App\Models\FinanceManagement\Deposit;
use App\Models\FinanceManagement\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        try {
            $deposits = Deposit::orderBy('created_at', 'DESC')->where('status', Payment::ACCEPTED)->get();
            $pendings = Deposit::orderBy('created_at', 'DESC')->where('status', Payment::REQUESTED)->get();
            return response()->view('backend.finance-management.deposits.index', get_defined_vars());
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
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposit $deposit): JsonResponse
    {
        try {
            $deleted = $deposit->delete();
            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Deposit moved to trash!'], 200);
            } else {
                return response()->json(['success' => true, 'message' => 'No deposit has deleted.'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred!'], 500);
        }
    }

    public function approve($id): JsonResponse {
        try {
            $deposit = Deposit::findOrFail($id);
            $approved = $deposit->update([
                'status' => Payment::ACCEPTED,
            ]);
            if ($approved) {
                Transaction::create([
                    'user_id' => Auth::user()->id,
                    'member_id' => $deposit->member_id,
                    'account_id' => $deposit->account_id,
                    'trx_id' => $deposit->trx_id,
                    'type' => Purpose::DEPOSIT,
                    'credit' => $deposit->amount,
                    'amount' => $deposit->amount,
                    'note' => $deposit->note ?? 'No note provided.',
                ]);
                return response()->json(['success' => true, 'message' => 'Deposit request approved!'], 200);
            } else {
                return response()->json(['success' => true, 'message' => 'No deposit has approved.'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred!'], 500);
        }
    }

    public function today(): Response {
        try {
            return response()->view('backend.finance-management.deposits.today', get_defined_vars());
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
