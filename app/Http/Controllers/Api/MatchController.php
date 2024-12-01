<?php

namespace App\Http\Controllers\Api;

use App\Enums\GameManagement\Outcome;
use App\Http\Controllers\Controller;
use App\Http\GameManagement\Requests\MatchRequest;
use App\Models\GameManagement\Bet;
use App\Models\GameManagement\Contest;
use App\Models\GameManagement\Round;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
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
    // public function store(MatchRequest $request)
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'member_id' => ['nullable'],
                'game_id' => ['required'],
                'start' => ['nullable'],
                'end' => ['nullable'],
            ]);
            $data['member_id'] = Auth::user()->id;
            $data['start'] = now();
            $match = Contest::create($data);
            return response()->json([
                'success' => true,
                'data' => $match,
                'message' => 'Match started!!!'
            ], 200);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'message' => 'An error occured.',
                'error' => $e->getMessage()
            ];
            return response()->json(['data' => $data], 500);
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
            // $data = $request->validate([
            //     'member_id' => ['nullable'],
            //     'game_id' => ['required'],
            //     'start' => ['nullable'],
            //     'end' => ['nullable'],
            // ]);
            $id = $request->id ?? 1;
            $match = Contest::where('id', $id)->first();
            $match->update([
                'end' => now()
            ]);
            return response()->json([
                'success' => true,
                'data' => $match,
                'message' => 'Match started!!!'
            ], 200);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'message' => 'An error occured.',
                'error' => $e->getMessage()
            ];
            return response()->json(['data' => $data], 500);
        }
    }

    public function matchRound(Request $request)
    {
        try {

            $data = $request->validate([
                'member_id' => ['nullable'],
                'match_id' => ['required'],
                'start' => ['nullable'],
                'end' => ['nullable'],
            ]);
            $data['member_id'] = Auth::user()->id;
            $data['start'] = now();
            $data['end'] = now();
            $match = Round::create($data);
            return response()->json([
                'success' => true,
                'data' => $match,
                'message' => 'Round started!!!'
            ], 200);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'message' => 'An error occured.',
                'error' => $e->getMessage()
            ];
            return response()->json(['data' => $data], 500);
        }
    }

    public function bet(Request $request)
    {
        try {
            $data = $request->validate([
                'member_id' => ['nullable'],
                'match_id' => ['required'],
                'round_id' => ['required'],
                'amount' => ['required'],
                'payout' => ['nullable'],
                'status' => ['nullable'],
            ]);
            $data['member_id'] = Auth::user()->id;
            $data['payout'] = 0;
            $data['status'] = Outcome::HELD;
            $bet = Bet::create($data);
            return response()->json([
                'success' => true,
                'data' => $bet,
                'message' => 'Bet Success!'
            ], 200);
        } catch (\Exception $e) {
            $data = [
                'success' => false,
                'message' => 'An error occured.',
                'error' => $e->getMessage()
            ];
            return response()->json(['data' => $data], 500);
        }
    }

    public function betUpdate(Request $request)
    {
        try {
            $betData = $request->validate([
                'member_id' => ['nullable'],
                'payout' => ['required'],
                'status' => ['required'],
            ]);

            $id = $request->id ?? 1;
            $betData = Bet::where('id', $id)->first();
            $betData->update([
                'payout' => $request->payout,
                'status' => $request->status,
            ]);
            return response()->json([
                'success' => true,
                'data' => $betData,
                'message' => 'Match started!!!'
            ], 200);
        } catch (\Exception $e) {
            $betData = [
                'success' => false,
                'message' => 'An error occured.',
                'error' => $e->getMessage()
            ];
            return response()->json(['data' => $betData], 500);
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
