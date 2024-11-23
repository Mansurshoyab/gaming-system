<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/clear-cache', function () {
        Artisan::call('optimize:clear');
        Session::flash('cleared', 'Cache cleared successfully!');
        return redirect()->back();
    })->name('clear-cache');
});
