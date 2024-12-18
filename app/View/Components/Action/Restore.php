<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Restore extends Component
{
    public $href, $item;
    /**
     * Create a new component instance.
     */
    public function __construct($href = null, $item = null)
    {
        $this->href = $href;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.restore');
    }
}
