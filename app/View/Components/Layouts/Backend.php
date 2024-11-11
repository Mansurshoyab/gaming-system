<?php

namespace App\View\Components\Layouts;

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
     * Create a new component instance.
     */
    public function __construct(string $page = 'Sample Page')
    {
        $this->page = __($page);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.backend');
    }
}
