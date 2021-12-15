<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{

    public $menu;

    public function __construct($menu = true)
    {
        $this->menu = $menu;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}
