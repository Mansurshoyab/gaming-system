<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Show extends Component
{
    public $href, $header, $item;
    /**
     * Create a new component instance.
     */
    public function __construct($href = null, $header = 'Modal Title', $item = null)
    {
        $this->href = $href;
        $this->header = $header;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.show');
    }
}
