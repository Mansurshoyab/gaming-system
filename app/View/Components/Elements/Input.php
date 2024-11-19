<?php

namespace App\View\Components\Elements;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $label, $type, $name, $rows, $placeholder, $required, $readonly, $disable, $value, $helper, $count, $check, $slug, $max;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $label = null,
        $type = 'text',
        $name,
        $rows = 4,
        $required = false,
        $readonly = false,
        $disable = false,
        $value = null,
        $helper = null,
        $count = false,
        $check = false,
        $slug = null,
        $max = 250
    ) {
        $this->label = $label !== null ? __($label) : null;
        $this->type = $type;
        $this->name = $name;
        $this->rows = $rows;
        $this->required = $required;
        if ($readonly) {
            $this->readonly = true;
            $this->disable = false;
        } elseif ($disable) {
            $this->readonly = false;
            $this->disable = true;
        } else {
            $this->readonly = false;
            $this->disable = false;
        }
        $this->value = $value;
        $this->helper = $helper !== null ? __($helper) : null;
        $this->count = (bool)$count;
        if ($check) {
            $this->check = true;
            $this->readonly = true;
        }
        $this->slug = $slug;
        $this->max = (int)$max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.elements.input');
    }
}
