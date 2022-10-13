@extends('frontend.layoutes.main')

@section('content')
    <!-- block post area start-->
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row mb-30">
                <div class="col-lg-12">
                    <div class="ts-grid-box">
                        <ol class="ts-breadcrumb">
                            <li>
                                <a href="#">
                                    <i class="fa fa-home"></i>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">Category</a>
                            </li>

                        </ol>
                        <div class="clearfix entry-cat-header">
                            <h2 class="ts-title float-left">{{ $category->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($category->posts->random(10) as $post)
                            <div class="col-lg-6 col-md-6 mb-30">
                                <div class="item post-content-box">
                                    <div class="ts-post-thumb">
                                        <a href="{{route('post',['category' => $category->name,'post' => $post->slug])}}">
                                            <img class="img-fluid" src="{{ asset($post->thumbnail) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <a class="post-cat orange-color no-bg" href="#">{{ $category->name }}</a>
                                        <h3 class="post-title md">
                                            <a href="{{route('post',['category' => $category->name,'post' => $post->slug])}}">{{ $post->title }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <x-follow-us />

                        <div class="widgets widget-banner">
                            <a href="#">
                                <img class="img-fluid" src="images/banner/sidebar-banner4.jpg" alt="">
                            </a>
                        </div>
                        <!-- widgets end-->
                        <x-recent-sidebar />
                        <!-- widgets end-->
                        <div class="ts-grid-box widgets category-list-item">
                            <x-category />
                        </div>
                    </div>
                </div>
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- block area end-->
@endsection
