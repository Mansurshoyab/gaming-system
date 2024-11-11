<?php

namespace App\Providers;

use App\View\Layouts\Backend as BackendLayout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Layouts
        Blade::component('backend-layout', BackendLayout::class);
    }
}
