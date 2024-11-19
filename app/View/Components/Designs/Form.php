<?php

namespace App\View\Components\Designs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public $action, $method, $spoof, $attachment, $class;
    /**
     * Create a new component instance.
     */
    public function __construct($action = null, $method = 'POST', $spoof = null, $attachment = false, $class = null)
    {
        $this->action = $action;
        $this->method = in_array(strtoupper($method), [ 'GET', 'POST' ]) ? strtoupper($method) : 'POST';
        $this->spoof = in_array(strtolower($spoof), [ 'put', 'patch', 'delete' ]) ? strtolower($spoof) : null;
        $this->attachment = $attachment;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.designs.form');
    }
}
