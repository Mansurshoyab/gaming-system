<?php

namespace App\View\Components\Designs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id, $center, $scroll, $header, $footer, $theme, $button;
    /**
     * Create a new component instance.
     */
    public function __construct($id = 'staticBackdrop', $center = false, $scroll = false, $header = 'Modal title', $footer = null, $theme = 'primary', $button = 'Understood')
    {
        $this->id = $id;
        $this->center = $center;
        $this->scroll = $scroll;
        $this->header = $header;
        $this->footer = $footer;
        $this->theme = $theme;
        $this->button = $button;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.designs.modal');
    }
}
