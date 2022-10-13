@extends('frontend.layoutes.main')

@section('content')
    @livewireStyles
    <!-- single post start -->
    <section class="single-post-wrapper post-layout-7">
        <div class="single-big-img mb-30" style="background-image: url({{ asset($post->thumbnail) }})">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-8 align-self-center entry-header-item">
                        <div class="entry-header">
                            <div class="category-name-list">
                                <span>
                                    <a href="#" class="post-cat ts-pink-bg">{{ $post->category->name }}</a>
                                </span>
                            </div>
                            <h2 class="post-title lg">{{ $post->title }}</h2>
                            <ul class="post-meta-info">
                                <li class="author">
                                    <a
                                        href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">
                                        <img src="{{ asset($post->thumbnail) }}" alt="">{{ $post->user->name }}
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $post->created_at }}
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-comments"></i>
                                        {{ $post->commentsCount() }}
                                    </a>
                                </li>
                                <li class="active">
                                    <i class="icon-fire"></i>
                                    {{ $post->views_count }}
                                </li>
                                <li class="share-post">
                                    <a href="#">
                                        <i class="fa fa-share"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ts-grid-box content-wrapper single-post">

                        <!-- single post header end-->
                        <div class="post-content-area">
                            <div class="entry-content">

                                {!! $post->content !!}

                            </div>
                            <!-- entry content end-->
                        </div>
                        <!-- post content area-->
                        <div class="author-box">
                            <img class="author-img" src="{{ asset($post->user->avatar) }}" alt="">
                            <div class="author-info">
                                <h4 class="author-name"> <a
                                        href="{{ route('author', $post->user->username) }}">{{ $post->user->name }}</a>
                                </h4>
                                <div class="authors-social">
                                    <a href="" class="ts-twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="ts-facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="ts-google-plus">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <a href="#" class="ts-linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <p>{{ $post->user->bio }} </p>

                            </div>
                        </div>
                        <!-- author box end-->
                        <div class="post-navigation clearfix">
                            @if ($previous)
                                <div class="post-previous float-left">
                                    <a
                                        href="{{ route('post', ['category' => $previous->category->name, 'post' => $previous->slug]) }}">
                                        <img src="{{ asset($previous->thumbnail) }}" alt="">
                                        <span>Read Previous</span>
                                        <p>
                                            {{ $previous->title }}
                                        </p>
                                    </a>
                                </div>
                            @endif
                            @if ($next)
                                <div class="post-next float-right">
                                    <a
                                        href="{{ route('post', ['category' => $next->category->name, 'post' => $next->slug]) }}">
                                        <img src="{{ asset($next->thumbnail) }}" alt="">
                                        <span>Read Next</span>
                                        <p>
                                            {{ $next->title }}
                                        </p>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <!-- post navigation end-->
                    </div>
                    <!--single post end -->
                    <div class="comments-form ts-grid-box">

                        <ul class="comments-list">
                            <!-- Comments-list li end-->
                                @livewire('comments',['comments' => $post->comments])
                        </ul>
                        <!-- Comments-list ul end-->

                        <h3 id="add-comment" class="comment-reply-title">Add Comment</h3>
                        @auth

                            @livewire('comment-field',['post' => $post])

                            @elseguest

                            <div>
                                <a href="{{route('login')}}" class="btn btn-danger">Sign in to add comments</a>
                            </div>
                        @endauth

                        <!-- Form end -->
                    </div>
                </div>
                <!-- Form row end -->
                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <!-- widgets end-->

                        <div class="widgets widget-banner">
                            <a href="#">
                                <img class="img-fluid" src="images/banner/sidebar-banner2.jpg" alt="">
                            </a>
                        </div>
                        <!-- widgets end-->
                        <x-recent-sidebar />
                        <!-- widgets end-->

                        <div class="ts-grid-box widgets category-widget">
                            <x-category />
                        </div>

                    </div>
                </div>
            </div>
            <!-- comment form end-->

        </div>
        <!-- col end -->

        <!-- right sidebar end-->
        <!-- col end-->
        </div>
        <!-- row end-->
        </div>
        <!-- container-->
            @livewireScripts
    </section>
@endsection
