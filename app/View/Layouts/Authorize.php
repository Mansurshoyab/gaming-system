<?php

namespace App\View\Layouts;

use App\Models\CompanySetup\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Authorize extends Component
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
     * Footer navigation menu
     */
    public array $menu;

    /**
     * Create a new component instance.
     */
    public function __construct(string $page = 'Sample Page', array $menu = []) {
        $this->page = __($page);
        $this->menu = $this->navigation();
        $this->company = Company::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('layouts.authorize');
    }

    private function navigation(): array {
        return [
            [ 'label' => 'Terms of Service', 'url' => '' ],
            [ 'label' => 'Privacy Policy', 'url' => '' ],
            [ 'label' => 'Responsible Gaming', 'url' => '' ],
        ];
    }
}
