<?php

namespace App\View\Components\Action;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Delete extends Component
{
    public $theme, $class, $href, $id, $title, $icon;
    /**
     * Create a new component instance.
     */
    public function __construct($theme = 'warning', $class = null, $href = null, $id = null, $title = 'Delete', $icon = 'trash-alt')
    {
        $this->theme = $theme;
        $this->class = $class;
        $this->href = $href;
        $this->id = $id;
        $this->title = $title;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action.delete');
    }
}
