<?php

namespace App\Http\Controllers\Api;

use App\Enums\FinanceManagement\Payment;
use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\FinanceManagement\Account;
use App\Models\FinanceManagement\Deposit;
use App\Models\FinanceManagement\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function deposit(Request $request)
    {
        try {
            $data = $request->validate([
                'account_id' => 'required',
                'trx_id' => 'required',
                'amount' => 'required',
                'note' => 'nullable',
            ]);
            if ($request->amount < 100) {
                return response()->json([
                    'success' => false,
                    'message' => 'Minimum Deposit 100 BDT',
                ], 203);
            }
            $data['member_id'] = Auth::user()->id;
            $data['status'] = Payment::REQUESTED;

            $deposit = Deposit::create($data);

            if ($deposit) {
                return response()->json([
                    'success' => true,
                    'message' => 'Deposit Request Successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Deposit Request failed',
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function withdraw(Request $request)
    {
        try {
            $data = $request->validate([
                'account_id' => 'required',
                'trx_id' => 'nullable',
                'amount' => 'required',
                'note' => 'nullable',
            ]);
            if ($request->amount < 500) {
                return response()->json([
                    'success' => false,
                    'message' => 'Minimum Withdraw 500 BDT',
                ], 203);
            }
            $data['member_id'] = Auth::user()->id;
            $data['status'] = Payment::REQUESTED;

            $withdraw = Withdraw::create($data);

            if ($withdraw) {
                return response()->json([
                    'success' => true,
                    'message' => 'Withdraw Request Successfully',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Withdraw Request failed',
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function payment()
    {
        try {

            $data = Account::where('status', Status::ENABLE)->get();
            $methods = PaymentResource::collection($data);
            if ($methods) {
                return response()->json([
                    'success' => true,
                    'message' => 'Payment Methods Found',
                    'payment' => $methods
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to display payment methods',
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }
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
}
