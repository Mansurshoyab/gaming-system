<?php

namespace App\Providers;

use App\View\Layouts\Authorize as AuthorizeLayout;
use App\View\Layouts\Backend as BackendLayout;
use App\View\Partials\Backend\Sidebar as BackendSidebar;
use App\View\Partials\Backend\Navbar as BackendNavbar;
use App\View\Partials\Backend\Breadcrumb as BackendBreadcrumb;
use App\View\Partials\Backend\Footer as BackendFooter;
use App\View\Components\Elements\Button as FormButton;
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
        Blade::component('authorize-layout', AuthorizeLayout::class);

        // Backend Partials
        Blade::component('backend-sidebar', BackendSidebar::class);
        Blade::component('backend-navbar', BackendNavbar::class);
        Blade::component('backend-breadcrumb', BackendBreadcrumb::class);
        Blade::component('backend-footer', BackendFooter::class);

        // Form Elements
        Blade::component('form-button', FormButton::class);
    }
}
