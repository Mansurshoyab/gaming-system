<?php

namespace App\View\Partials\Backend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public string $module;
    public array $breadcrumbs;
    /**
     * Create a new component instance.
     */
    public function __construct(string $module = "Sample Page", array $breadcrumbs = []) {
        $this->module = $module;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('partials.backend.breadcrumb');
    }
}
