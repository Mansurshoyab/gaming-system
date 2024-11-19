<?php

namespace App\View\Components\Designs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public $id, $striped, $hover, $theme, $headers, $datatable;
    /**
     * Create a new component instance.
     */
    public function __construct($id = 'dataTable', $striped = false, $hover = false, $theme = null, $headers = [], $datatable = false)
    {
        $this->id = $id;
        $this->striped = $striped;
        $this->hover = $hover;
        $this->theme = $theme;
        $this->headers = $headers;
        $this->datatable = $datatable;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.designs.table');
    }
}
