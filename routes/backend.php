<?php

use App\Http\Controllers\ProfileManagement\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group( function () {
    Route::controller(AdminController::class)->name('admin.')->group( function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
});
