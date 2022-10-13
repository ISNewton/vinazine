<?php

namespace App\View\Components;

use App\Models\Category as CategoryModel;
use Illuminate\View\Component;

class Category extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = CategoryModel::withCount('posts')->latest()->limit(7)->get();

        return view('components.category',compact('categories'));
    }
}
