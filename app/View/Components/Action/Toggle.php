<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toggle extends Component
{
    public $name, $href, $id, $enable, $disable, $value;
    /**
     * Create a new component instance.
     */
    public function __construct($name = 'status', $href = null, $id = null, $enable = null, $disable = null, $value = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->href = $href;
        $this->enable = $enable;
        $this->disable = $disable;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.switch');
    }
}
