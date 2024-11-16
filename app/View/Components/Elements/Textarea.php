<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
    public $label, $name, $rows, $placeholder, $helper, $count, $max;
    /**
     * Create a new component instance.
     */
    public function __construct($label = null, $name, $rows = 4, $placeholder = null, $helper = null, $count = false, $max = 250)
    {
        $this->label = __($label);
        $this->name = __($name);
        $this->rows = __($rows);
        $this->placeholder = __($placeholder);
        $this->helper = __($helper);
        $this->count = __($count);
        $this->max = __($max);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.textarea');
    }
}
