<?php

use App\Http\Controllers\GameManagement\GenreController;
use App\Http\Controllers\ProfileManagement\AdminController;
use App\Http\Controllers\SystemConfiguration\SystemController;
use App\Http\Controllers\UserManagement\MemberController;
use App\Http\Controllers\UserManagement\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->group( function () {
    Route::controller(AdminController::class)->name('admin.')->group( function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::resource('roles', RoleController::class);
    Route::prefix('system')->controller(SystemController::class)->name('system.')->group( function () {
        Route::get('/settings', 'general')->name('settings');
    });

    Route::resource('members', MemberController::class);

    Route::resource('genre', GenreController::class);
});
