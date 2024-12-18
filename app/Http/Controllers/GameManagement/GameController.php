<?php

namespace App\Http\Controllers\GameManagement;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Models\GameManagement\Game;
use App\Models\GameManagement\Genre;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        try {
            $games = Game::orderBy('created_at', 'DESC')->get();
            $trashes = Game::onlyTrashed('deleted_at', 'DESC')->get();
            $total = Game::withTrashed()->count();
            $genres = Genre::where('status', Status::ENABLE)->pluck('title', 'id');
            return response()->view('backend.game-management.games.index', get_defined_vars());
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
    public function show(Game $game): JsonResponse
    {
        try {
            return response()->json($game);
        } catch (\Exception $e) {
            return back()->json(['error', 'Failed to display game', $e->getMessage()], 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game): JsonResponse
    {
        try {
            $deleted = $game->delete();
            if ($deleted) {
                return response()->json(['success' => true, 'message' => 'Game moved to trash!'], 200);
            } else {
                return response()->json(['success' => true, 'message' => 'No game has deleted.'], 200);
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
            $game = Game::find($id);
            if (!$game) {
                return response()->json(['error' => 'Game not found'], 404);
            }
            $updated = $game->update(['status' => $status, 'updated_at' => now()]);
            if ($updated) {
                return response()->json(['success' => true, 'message' => 'Game status changed!'], 200);
            } else {
                return response()->json(['success' => false, 'message' => 'No record updated!'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to change game status'], 500);
        }
    }

    /**
     * Restore a trashed resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore($id): JsonResponse {
        try {
            $game = Game::onlyTrashed()->find($id);
            if ($game) {
                $game->restore();
                return response()->json(['message' => 'Game restored successfully'], 200);
            } else {
                return response()->json(['message' => 'Game not found or already restored'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to restore game', $e->getMessage()], 500);
        }
    }

    /**
     * Permanently delete soft deleted resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function remove($id): JsonResponse {
        try {
            $game = Game::withTrashed()->find($id);
            if ($game) {
                $game->forceDelete();
                return response()->json(['message' => 'Game permanently deleted'], 200);
            } else {
                return response()->json(['message' => 'Game not found or already removed'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to permanently delete game', $e->getMessage()], 500);
        }
    }
}
