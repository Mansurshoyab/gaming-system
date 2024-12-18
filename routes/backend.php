<?php

use App\Http\Controllers\CompanySetup\CompanyController;
use App\Http\Controllers\FinanceManagement\AccountController;
use App\Http\Controllers\FinanceManagement\DepositController;
use App\Http\Controllers\FinanceManagement\WithdrawController;
use App\Http\Controllers\GameManagement\GameController;
use App\Http\Controllers\GameManagement\GenreController;
use App\Http\Controllers\ProfileManagement\AdminController;
use App\Http\Controllers\SystemConfiguration\CityController;
use App\Http\Controllers\SystemConfiguration\CountryController;
use App\Http\Controllers\SystemConfiguration\ProvinceController;
use App\Http\Controllers\SystemConfiguration\SystemController;
use App\Http\Controllers\UserManagement\MemberController;
use App\Http\Controllers\UserManagement\RoleController;
use App\Http\Controllers\UserManagement\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::controller(AdminController::class)->name('admin.')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/game', 'dashboard')->name('game');
        Route::prefix('profile')->group(function () {
            Route::get('/', function () {
                return redirect()->route('admin.show', Auth::user()->username);
            });
            Route::get('/{username}', 'show')->name('show');
        });
    });
    Route::prefix('genres')->controller(GenreController::class)->name('genres.')->group(function () {
        Route::post('/{id}/status', 'status')->name('status');
        Route::post('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/remove', 'remove')->name('remove');
    });
    Route::resource('genres', GenreController::class);
    Route::prefix('games')->controller(GameController::class)->name('games.')->group(function () {
        Route::post('/{id}/status', 'status')->name('status');
        Route::post('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/remove', 'remove')->name('remove');
    });
    Route::resource('games', GameController::class);
    Route::resource('accounts', AccountController::class);
    Route::prefix('deposits')->controller(DepositController::class)->name('deposits.')->group(function () {
        Route::get('/today', 'today')->name('today');
        Route::post('/{id}/approve', 'approve')->name('approve');
    });
    Route::resource('deposits', DepositController::class);
    Route::prefix('withdraws')->controller(WithdrawController::class)->name('withdraws.')->group(function () {
        Route::get('/today', 'today')->name('today');
    });
    Route::resource('withdraws', WithdrawController::class);
    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::post('/{id}/status', 'status')->name('status');
        Route::post('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/remove', 'remove')->name('remove');
    });
    Route::resource('users', UserController::class);
    Route::prefix('members')->controller(MemberController::class)->name('members.')->group(function () {
        Route::post('/{id}/status', 'status')->name('status');
        Route::post('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/remove', 'remove')->name('remove');
        Route::get('/today', 'today')->name('today');
    });
    Route::resource('members', MemberController::class);
    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function () {
        Route::post('/{id}/status', 'status')->name('status');
        Route::post('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/remove', 'remove')->name('remove');
    });
    Route::resource('roles', RoleController::class);
    Route::prefix('company')->controller(CompanyController::class)->name('company.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{id}', 'indexUpdate')->name('index.update');
        Route::get('/image', 'image')->name('image');
        Route::put('/image/update/{id}', 'imageUpdate')->name('image.update');
        Route::get('/contact', 'contact')->name('contact');
        Route::put('/contact/update/{id}', 'updateContact')->name('contact.update');
        Route::get('/social', 'social')->name('social');
    });
    Route::prefix('system')->controller(SystemController::class)->name('system.')->group(function () {
        Route::get('/settings', 'general')->name('settings');
    });
    Route::resource('countries', CountryController::class);
    Route::resource('provinces', ProvinceController::class);
    // Route::resource('cities', CityController::class);
});
