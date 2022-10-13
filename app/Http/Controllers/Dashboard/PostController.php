<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::filter()
            ->with('user:id,name')
            ->withoutGlobalScopes()
            ->search(request()->q)
            ->latest()
            ->when(auth()->user()->user_type !== User::ROLE_ADMIN, fn ($query) => $query->where('user_id', auth()->id()))
            ->paginate(20);

        $categories = Category::pluck('name', 'id');

        $status = Post::STATUS;

        return view('dashboard.posts.index', compact('posts', 'categories', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
        $data['is_active']  = $request->is_active == 'on';

        if($request->hasFile('thumbnail')) {
            $data['thumbnail'] = Storage::disk('custome')->put('images/thumbnail',$request->thumbnail);
        }

        Post::create($data);

        return redirect(route('posts.index'))
            ->with('message', config('app.alert_messages.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->withoutGlobalScopes()->firstOrFail();

        $this->authorize($post, 'view');

        $post->load('category', 'user:id,name');

        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->withoutGlobalScopes()->first();

        $this->authorize($post, 'update');

        $categories = Category::pluck('name', 'id');

        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $slug)
    {
        $post = Post::where('slug', $slug)->withoutGlobalScopes()->first();

        $this->authorize($post, 'update');

        $data = $request->validated();

        if($request->hasFile('thumbnail')) {
            $data['thumbnail'] = Storage::disk('custome')->put('images/thumbnail',$request->thumbnail);
        }

        $data['is_active'] = $request->is_active == 'on';

        $post->update($data);

        return redirect(route('posts.index'))
            ->with('message', config('app.alert_messages.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->withoutGlobalScopes()->first();

        $this->authorize('delete', $post);

        $post->delete();

        return redirect(route('posts.index'))
            ->with('message', config('app.alert_messages.success'));
    }
}
