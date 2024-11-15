<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type, $theme, $icon, $name, $label;

    /**
     * Create a new component instance.
     */
    public function __construct($type = 'button', $theme = 'primary', $icon = false, $name = 'save', $label = 'Button')
    {
        $this->type = __($type);
        $this->theme = __($theme);
        $this->icon = __($icon);
        $this->name = __($name);
        $this->label = __($label);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.button');
    }
}
