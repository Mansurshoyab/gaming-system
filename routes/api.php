<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BetController;
use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\PayoutController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout']);

    // Pfoile Routes
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::post('/profile', [ProfileController::class, 'update']);

    // Games Routes
    Route::get('/games', [GameController::class, 'index']);
    Route::post('/match', [GameController::class, 'store']);
    Route::post('/match/update', [GameController::class, 'update']);

    // Bet Routes
    Route::post('/round', [BetController::class, 'index']);
    Route::post('/bet', [BetController::class, 'store']);
    Route::post('/bet/update', [BetController::class, 'update']);

    // Route::post('/match', [MatchController::class, 'store']);
    // Route::post('/match/update', [MatchController::class, 'update']);
    // Route::post('round', [MatchController::class, 'matchRound']);
    // Route::post('bet', [MatchController::class, 'bet']);
    // Route::post('bet/update', [MatchController::class, 'betUpdate']);

    //Transaction
    Route::post('deposit', [TransactionController::class, 'deposit']);
    Route::post('withdraw', [TransactionController::class, 'withdraw']);
    Route::get('payment', [TransactionController::class, 'payment']);

    Route::post('payout', [PayoutController::class, 'store']);
    Route::get('payouts', [PayoutController::class, 'index']);
    Route::post('payout/update', [PayoutController::class, 'update']);


    Route::get('wallet', [ProfileController::class, 'wallet']);
    Route::post('balance', [ProfileController::class, 'balance']);
});

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::post('dataCheck', [AuthController::class, 'dataCheck']);
});
