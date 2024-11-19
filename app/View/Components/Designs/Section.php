<?php

namespace App\View\Components\Designs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    public string $class;
    /**
     * Create a new component instance.
     */
    public function __construct(string $class = 'col-sm-12')
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.designs.section');
    }
}
