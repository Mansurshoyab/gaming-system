<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('layouts')->name('layouts.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('layouts.backend');
    });
    Route::get('/backend', function () {
        return response()->view('backend.sample', get_defined_vars());
    })->name('backend');
    Route::get('/authorize', function () {
        return response()->view('authorize.sample', get_defined_vars());
    })->name('authorize');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/backend.php';
