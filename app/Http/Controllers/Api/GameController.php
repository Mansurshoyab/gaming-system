<?php

namespace App\Http\Controllers\Api;

use App\Enums\GlobalUsage\Status;
use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Models\GameManagement\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $game = Game::where('status', Status::ENABLE)->get();

        return response()->json([
            'success' => true,
            'message' => 'Game Display',
            'data' => GameResource::collection($game),
        ]);
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
