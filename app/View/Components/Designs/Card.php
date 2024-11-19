<?php

namespace App\View\Components\Designs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $class, $header, $tool, $icon, $dropdowns, $body, $footer;
    /**
     * Create a new component instance.
     */
    public function __construct($class = null, $header = null, $tool = null, $icon = 'ellipsis-v', $dropdowns = [], $body = null, $footer = null)
    {
        $this->class = $class;
        $this->header = $header;
        $this->tool = $tool;
        $this->icon = $icon;
        $this->dropdowns = $dropdowns;
        $this->body = $body;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.designs.card');
    }
}
