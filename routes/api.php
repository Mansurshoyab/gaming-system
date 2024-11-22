<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/profile', [ProfileController::class, 'show']);
    Route::post('/profile', [ProfileController::class, 'update']);

    Route::get('games', [GameController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/match', [MatchController::class, 'store']);
    Route::post('/match/update', [MatchController::class, 'update']);

    Route::post('round', [MatchController::class, 'matchRound']);
    Route::post('bet', [MatchController::class, 'bet']);
    Route::post('bet/update', [MatchController::class, 'betUpdate']);
});

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::post('dataCheck', [AuthController::class, 'dataCheck']);
});
