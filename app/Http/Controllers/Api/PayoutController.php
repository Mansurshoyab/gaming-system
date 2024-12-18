<?php

namespace App\Http\Controllers\Api;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Http\Resources\PayoutResource;
use App\Models\ProfileManagement\Payout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $data = Payout::where('member_id', Auth::user()->id)->where('status', Status::ENABLE)->get();
            $payout = PayoutResource::collection($data);
            return response()->json([
                'suceess' => true,
                'massege' => 'Payout Data show',
                'data' => $payout
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $data = $request->validate([
                'member_id' => 'required',
                'account_id' => 'required',
                'account_no' => 'required',
            ]);

            $data['status'] = Status::ENABLE;

            // $method = Payout::where('member_id', Auth->user()->id)->get();

            // if ($request->account_id !== $method['account_id']) {
            $payout = Payout::create($data);
            if ($payout) {
                return response()->json([
                    'success' => true,
                    'method' => $payout->id,
                    'message' => 'Payout Method Created',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Payout Method not Created',
                ], 403);
            }
            // }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                // 'id' => ['required', 'numeric'],
                'member_id' => ['required', 'numeric'],
                'account_id' => ['required', 'numeric'],
                'account_no' => ['required', 'numeric'],
                'status' => ['required', 'in:' . implode(',', Status::fetch())]
            ]);
            $payout = Payout::where('member_id', $data['member_id'])->where('id', $request->id)->first();
            if ($payout) {
                $payout->update([
                    'account_id' => $data['account_id'],
                    'account_no' => $data['account_no'],
                    'status' => $data['status'] ?? Status::PENDING,
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Payout method updated'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Payout method not found'
                ], 200);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
