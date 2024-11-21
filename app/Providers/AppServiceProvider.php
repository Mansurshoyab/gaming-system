<?php

namespace App\Providers;

use App\View\Layouts\Authorize as AuthorizeLayout;
use App\View\Layouts\Backend as BackendLayout;
use App\View\Partials\Backend\Sidebar as BackendSidebar;
use App\View\Partials\Backend\Navbar as BackendNavbar;
use App\View\Partials\Backend\Breadcrumb as BackendBreadcrumb;
use App\View\Partials\Backend\Footer as BackendFooter;
use App\View\Components\Designs\Section as BaseSection;
use App\View\Components\Designs\Table as DataTable;
use App\View\Components\Designs\Form as FormDesign;
use App\View\Components\Designs\Card as CardDesign;
use App\View\Components\Designs\Modal as ModalDesign;
use App\View\Components\Designs\Quickform as QuickForm;
use App\View\Components\Elements\Input as FormInput;
use App\View\Components\Elements\Textarea as FormTextarea;
use App\View\Components\Elements\Select as FormSelect;
use App\View\Components\Elements\Enum as FormEnum;
use App\View\Components\Elements\Discard as FormDiscard;
use App\View\Components\Elements\Button as FormButton;
use App\View\Components\Action\Drawer as ActionDrawer;
use App\View\Components\Action\Toggle as ToggleSwitch;
use App\View\Components\Action\Edit as EditAction;
use App\View\Components\Action\Show as ShowAction;
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

        // Design Components
        Blade::component('base-section', BaseSection::class);
        Blade::component('data-table', DataTable::class);
        Blade::component('form-design', FormDesign::class);
        Blade::component('card-design', CardDesign::class);
        Blade::component('modal-design', ModalDesign::class);
        Blade::component('quick-form', QuickForm::class);

        // Form Elements
        Blade::component('form-input', FormInput::class);
        Blade::component('form-textarea', FormTextarea::class);
        Blade::component('form-select', FormSelect::class);
        Blade::component('form-enum', FormEnum::class);
        Blade::component('form-discard', FormDiscard::class);
        Blade::component('form-button', FormButton::class);

        // Actions
        Blade::component('action-drawer', ActionDrawer::class);
        Blade::component('toggle-switch', ToggleSwitch::class);
        Blade::component('edit-action', EditAction::class);
        Blade::component('show-action', ShowAction::class);
    }
}
