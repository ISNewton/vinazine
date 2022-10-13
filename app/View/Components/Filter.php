<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Filter extends Component
{
    public $categories;
    public $status;
    public $search;
    public $blocked;
    public $sort;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories = null, $status = null, $search = null , $blocked = null , $sort = 'desc')
    {
        $this->categories = $categories;
        $this->status = $status;
        $this->search = $search;
        $this->blocked = $blocked;
        $this->sort = $sort;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter');
    }
}
