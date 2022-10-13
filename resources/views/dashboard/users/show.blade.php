@extends('dashboard.layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <x-content-wrapper title="{{ $user->name }}">
        </x-content-wrapper>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header text-lg">
                                <p>Name: {{ $user->name }}</p>
                                <p>Email: {{ $user->email }}</p>
                                <p>Bio: {{ $user->bio }}</p>
                                <p>Posts: {{ count($user->posts) }}</p>

                            </div>
                            <div class="card-body">
                                <h2 class="mb-3">Posts:</h2>
                                @forelse ($user->posts as $post)
                                    <h3 class="card-text">
                                        <a class="text-light" href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>
                                    </h3>
                                @empty
                                    <h3>--No posts--</h3>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="image">
                            <img width="100px" height="100px" src="{{asset($user->avatar ?? config('app.default_avatar'))}}" class="img-circle elevation-2" alt="User Image">
                          </div>
                    </div>
                </div>


            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
