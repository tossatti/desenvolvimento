<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImportCsv extends Component
{
    public $route;
    public $inputId;
    public $buttonId;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $inputId, $buttonId)
    {
        $this->route = $route;
        $this->inputId = $inputId;
        $this->buttonId = $buttonId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.import-csv');
    }
}
