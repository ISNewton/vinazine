<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Middleware\Author;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index()
    {
        $posts = Post::select('id', 'title', 'thumbnail', 'created_at', 'slug', 'category_id', 'user_id')
            ->with('category:id,name', 'user:id,name,username')
            ->orderByDesc('created_at')
            ->take(100)
            ->get();
        return view('frontend.index.index', compact('posts'));
    }

    public function category(Category $category)
    {
        $category->load('posts');

        return view('frontend.category', compact('category'));
    }

    public function post(Category $category, Post $post)
    {
        $post->loadCount('views')->load(['user', 'category', 'comments' => fn ($query) => $query->with('user','replies')->latest()->take(10)]);

        $previous = $post->getPreviousPost();

        $next = $post->getNextPost();

        views($post)->record();

        return view('frontend.post', compact('post', 'previous','next'));
    }

    public function author(User $user)
    {
        $user->load(['posts' => function ($query) {
            $query->select('id', 'category_id', 'title', 'user_id', 'created_at', 'slug', 'thumbnail')
                ->with('category')
                ->withCount('comments')
                ->latest()
                ->take(6);
        }]);
        return view('frontend.auth.profile', compact('user'));
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string'
        ]);

        if ($validator->fails()) {
            return back()->with('message', [
                'message' => $validator->errors()->first(),
                'type' => 'error'
            ]);
        }

        $posts = Post::with('user:id,name,username', 'category')->where('title', 'LIKE', "%{$request->search}%")->latest()->take(10)->get();
        return view('frontend.search-result', compact('posts'));
    }
}
