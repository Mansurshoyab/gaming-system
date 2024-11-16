<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $label, $name, $rows, $placeholder, $value, $helper, $count, $max;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $label = null,
        $name,
        $rows = 4,
        $placeholder = null,
        $value = null,
        $helper = null,
        $count = false,
        $max = 250
    ) {
        $this->label = $label !== null ? __($label) : null;
        $this->name = $name;
        $this->rows = $rows;
        $this->placeholder = $placeholder !== null ? __($placeholder) : null;
        $this->value = $value;
        $this->helper = $helper !== null ? __($helper) : null;
        $this->count = (bool)$count;
        $this->max = (int)$max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.textarea');
    }
}
