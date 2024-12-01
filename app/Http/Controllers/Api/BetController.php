<?php

namespace App\Http\Controllers\Api;

use App\Enums\GameManagement\Outcome;
use App\Http\Controllers\Controller;
use App\Models\GameManagement\Bet;
use App\Models\GameManagement\Round;
use App\Models\ProfileManagement\Wallet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'member_id' => ['required', 'numeric'],
                'match_id' => ['required', 'numeric']
            ]);
            $data['start'] = now();
            $data['end'] = now();
            $round = Round::create($data);
            if ($round) {
                return response()->json([
                    'success' => true,
                    'round'  => $round->id,
                    'message' => 'Round completed successfully!'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to complete round!!!'
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'member_id' => ['required', 'numeric'],
                'match_id' => ['required', 'numeric'],
                'round_id' => ['required', 'numeric'],
                'amount' => ['required', 'numeric'],
            ]);
            $data['payout'] = 0;
            $data['status'] = Outcome::HELD;
            $bet = Bet::create($data);
            $wallet = Wallet::where('member_id', $data['member_id'])->first();
            if ($bet) {
                $wallet->decrement('amount', $data['amount']);
                return response()->json([
                    'success' => true,
                    'bet' => $bet->id,
                    'message' => 'Bet placed successfully!'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to placed bet!!!'
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): JsonResponse
    {
        try {
            $data = $request->validate([
                'member_id' => ['required', 'numeric'],
                'payout' => ['required', 'numeric'],
                'status' => ['required', 'in:' . implode(',', Outcome::fetch())],
            ]);
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'No bet found!!!'
                ], 404);
            }
            $bet = Bet::where('id', $request->id)->first();
            $wallet = Wallet::where('member_id', $data['member_id'])->first();
            if ($bet) {
                $bet->update([
                    'payout' => $data['payout'] ?? 0,
                    'status' => $data['status'] ?? Outcome::HELD,
                ]);
                if ($data['status'] === Outcome::WIN) {
                    $wallet->increment('amount', $data['payout']);
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Bet updated successfully!'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to update bet!!!'
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
