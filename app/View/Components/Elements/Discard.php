<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Discard extends Component
{
    public $route, $theme, $class, $icon, $label;
    /**
     * Create a new component instance.
     */
    public function __construct($route = null, $theme = 'info', $class = 'py-1', $icon = null, $label = 'Discard')
    {
        $this->route = $route;
        $this->theme = __($theme);
        $this->class = $class;
        $this->icon = __($icon);
        $this->label = __($label);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.discard');
    }
}
