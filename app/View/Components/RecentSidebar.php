<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class RecentSidebar extends Component
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
        $recent = Post::select('id', 'title', 'thumbnail', 'slug', 'category_id')
            ->with('category')
            ->latest()
            ->limit(6)
            ->get();

        $popular = Post::select('id', 'title', 'thumbnail', 'slug', 'category_id')
            ->with('category')
            ->orderByViews()
            ->limit(6)
            ->get();

        return view('components.recent-sidebar', compact('recent','popular'));
    }
}
