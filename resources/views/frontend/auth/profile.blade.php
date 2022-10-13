@extends('frontend.layoutes.main')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ts-grid-box">
                        <div class="author-box author-box-item">
                            <img class="author-img" src="{{ asset($user->avatar) }}" alt="">
                            <div class="author-info">
                                <div class="author-name">
                                    <h4>{{ $user->name }}</h4>
                                </div>

                                <div class="authors-social">
                                    @if (auth()->id() === $user->id)
                                        <a class="btn btn-danger" href="{{ route('editProfile') }}" class="bg-red">
                                            Edit profile
                                        </a>
                                            <form class="d-inline" action="{{route('logout')}}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger" type="submit" >Logout</button>
                                            </form>
                                    @endif

                                </div>
                                <div class="clearfix"></div>
                                <p>{{ $user->bio }} </p>
                            </div>
                            <ul class="post-meta-info">
                                <li>
                                    <a href="">
                                        {{$user->postsCount()}}
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-comments"></i>
                                        {{$user->commentsCount()}}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($user->posts as $post)
                            <div class="col-md-6">
                                <div class="ts-grid-box ts-grid-content mb-30">
                                    <a class="post-cat ts-yellow-bg" href="#">{{ $post->category->name }}</a>
                                    <div class="ts-post-thumb">
                                        <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">
                                            <img class="img-fluid" src="{{ asset($post->thumbnail) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title md">
                                            <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">{{ $post->title }}</a>
                                        </h3>
                                        <p>
                                            {{ $post->shortDescription() }}
                                        </p>
                                        <span class="post-date-info">
                                            <i class="fa fa-clock-o"></i>
                                            {{ $post->created_at }}
                                        </span>

                                    </div>
                                </div>
                                <!-- ts grid box-->
                            </div>
                        @endforeach
                        <!-- col end-->

                    </div>
                    {{-- pagination --}}
                </div>
                <!-- col end-->
                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <x-follow-us />
                        <!-- widgets end-->

                        <div class="widgets widget-banner">
                            <a href="#">
                                <img class="img-fluid" src="images/banner/sidebar-banner2.jpg" alt="">
                            </a>
                        </div>
                        <!-- widgets end-->
                        <x-recent-sidebar />
                        <!-- widgets end-->

                    </div>
                    <!-- right sidebar end-->
                </div>
                <!-- col end-->
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->
@endsection
