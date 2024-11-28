<?php

namespace App\View\Layouts;

use App\Models\CompanySetup\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Backend extends Component
{
    /**
     * Current web page title
     */
    public string $page;

    /**
     * Company Data
     */
    public object $company;

    /**
     * Create a new component instance.
     */
    public function __construct(string $page = 'Sample Page')
    {
        $this->page = __($page);
        $this->company = Company::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.backend');
    }
}
