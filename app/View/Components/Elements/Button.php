<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type, $theme, $classes, $id, $icon, $disable, $label;

    /**
     * Create a new component instance.
     */
    public function __construct($type = 'button', $theme = 'primary', $classes = 'py-1', $id = null, $disable = false, $icon = null, $label = 'Button')
    {
        $this->type = __($type);
        $this->theme = __($theme);
        $this->classes = __($classes);
        $this->id = __($id);
        $this->disable = __($disable);
        $this->icon = __($icon);
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
