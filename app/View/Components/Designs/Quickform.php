<?php

namespace App\View\Components\Designs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Quickform extends Component
{
    public $center, $scroll, $header, $footer, $theme, $button;
    /**
     * Create a new component instance.
     */
    public function __construct($center = false, $scroll = false, $header = 'Quick Form', $footer = null, $theme = 'primary', $button = 'Submit')
    {
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
        return view('components.designs.quickform');
    }
}
