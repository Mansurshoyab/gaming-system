<?php

namespace App\View\Components\Designs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Quickform extends Component
{
    public $centered, $scrollable, $header, $theme, $button;
    /**
     * Create a new component instance.
     */
    public function __construct($centered = false, $scrollable = false, $header = 'Quick Form', $theme = 'primary', $button = 'Submit')
    {
        $this->centered = $centered;
        $this->scrollable = $scrollable;
        $this->header = $header;
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
