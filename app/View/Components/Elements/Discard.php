<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Discard extends Component
{
    public $route, $theme, $classes, $icon, $label;
    /**
     * Create a new component instance.
     */
    public function __construct($route = null, $theme = 'info', $classes = 'py-1', $icon = null, $label = 'Discard')
    {
        $this->route = $route;
        $this->theme = __($theme);
        $this->classes = __($classes);
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
