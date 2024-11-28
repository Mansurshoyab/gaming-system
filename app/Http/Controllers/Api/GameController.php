<?php

namespace App\Http\Controllers\Api;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\GameManagement\Contest;
use App\Models\GameManagement\Game;
use App\Models\GameManagement\Round;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $game = Game::where('status', Status::ENABLE)->get();
            if ($game) {
                return response()->json([
                    'success' => true,
                    'message' => 'Game displayed successfully!',
                    'games' => GameResource::collection($game),
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to display games!!!',
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
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
                'game_id' => [ 'required']
            ]);
            $data['member_id'] = Auth::guard('games')->user()->id;
            $data['start'] = now();
            $match = Contest::create($data);
            if ($match) {
                return response()->json([
                    'success' => true,
                    'match' => $match->id,
                    'message' => 'Match started successfully!'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to start match!!!'
                ], 403);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occured.'
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
                'id' => [ 'required', 'numeric', 'exists:contests,id' ]
            ]);
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'No match found!!!'
                ], 404);
            }
            $match = Contest::where('id', $request->id)->first();
            if ($match) {
                $match->update([
                    'end' => now()
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Match ended successfully!'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to end match!!!'
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
