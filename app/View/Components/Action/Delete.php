<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Delete extends Component
{
    public $class, $href, $id, $title;
    /**
     * Create a new component instance.
     */
    public function __construct($class = null, $href = null, $id = null, $title = 'Delete')
    {
        $this->class = $class;
        $this->href = $href;
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.delete');
    }
}
