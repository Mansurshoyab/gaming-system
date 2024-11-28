<?php

namespace App\View\Partials\Backend;

use App\Models\CompanySetup\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Company Data
     */
    public object $company;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->company = Company::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('partials.backend.navbar');
    }
}
