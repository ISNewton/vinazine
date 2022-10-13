<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        $traffic = views(Post::class)->unique()->count();
        $posts = Post::count();
        $authors = User::where('user_type', User::ROLE_AUTHOR)->count();
        $users = User::where('user_type', User::ROLE_USER)->count();

        $latest_posts = Post::withCount('views')->with('user:id,name')->latest()->limit(7)->get();

        $active_authors = User::withCount('posts')
            ->orderBy('posts_count')
            ->latest()
            ->limit(8)
            ->get();

        return view('dashboard.index', compact('traffic', 'posts', 'authors', 'users', 'latest_posts','active_authors'));
    }
}
