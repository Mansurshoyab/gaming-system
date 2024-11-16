<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Enum extends Component
{
    public $label, $name, $options, $value, $required, $disable;
    /**
     * Create a new component instance.
     */
    public function __construct($label = null, $name, $options = [], $value = null, $required = false, $disable = false)
    {
        $this->label = __($label);
        $this->name = __($name);
        $this->options = is_array($options) ? $options : [];
        $this->value = __($value);
        $this->required = __($required);
        $this->disable = __($disable);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.enum');
    }
}
