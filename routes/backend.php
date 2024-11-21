<?php

use App\Http\Controllers\CompanySetup\CompanyController;
use App\Http\Controllers\GameManagement\GenreController;
use App\Http\Controllers\ProfileManagement\AdminController;
use App\Http\Controllers\SystemConfiguration\SystemController;
use App\Http\Controllers\UserManagement\MemberController;
use App\Http\Controllers\UserManagement\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::controller(AdminController::class)->name('admin.')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::resource('roles', RoleController::class);
    Route::prefix('system')->controller(SystemController::class)->name('system.')->group(function () {
        Route::get('/settings', 'general')->name('settings');
    });

    Route::resource('members', MemberController::class);

    Route::resource('genres', GenreController::class);
    Route::prefix('company')->controller(CompanyController::class)->name('company.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{id}', 'indexUpdate')->name('index.update');
        Route::get('/image', 'image')->name('image');
        Route::put('/image/update/{id}', 'imageUpdate')->name('image.update');
        Route::get('/contact', 'contact')->name('contact');
        Route::put('/contact/update/{id}', 'updateContact')->name('contact.update');

        Route::get('/social', 'social')->name('social');
    });
});
