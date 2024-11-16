<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $label, $name, $rows, $placeholder;
    /**
     * Create a new component instance.
     */
    public function __construct($label = null, $name, $rows = 4, $placeholder = null)
    {
        $this->label = __($label);
        $this->name = __($name);
        $this->rows = __($rows);
        $this->placeholder = __($placeholder);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.textarea');
    }
}
