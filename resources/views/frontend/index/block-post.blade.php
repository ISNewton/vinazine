<!-- block post area start-->
<section class="block-wrapper mt-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div id="featured-slider" class="owl-carousel ts-overlay-style ts-featured">
                    @foreach ($posts->random(10) as $post)
                        <div class="item" style="background-image:url({{ asset($post->thumbnail) }})">
                            <a class="post-cat ts-orange-bg" href="{{route('category',$post->category->name)}}">{{ $post->category->name }}</a>
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <h2 class="post-title lg">
                                        <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">{{ $post->title }}</a>
                                    </h2>
                                    <ul class="post-meta-info">
                                        <li class="author">
                                            <a href="#">
                                                <img src="{{ $post->user->avatart }}" alt="">
                                                {{ $post->user->name }}
                                            </a>
                                        </li>
                                        <li>
                                            <i class="fa fa-clock-o"></i>
                                            {{ $post->created_at }}
                                        </li>
                                        <li class="active">
                                            <i class="icon-fire"></i>
                                            {{$post->views_count}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ Featured post end -->

                        </div>
                    @endforeach
                    <!-- Item 1 end -->
                </div>
                <!-- Featured owl carousel end-->
            </div>
            <!-- col end-->

            <div class="col-lg-3">
                <div class="ts-grid-box ts-grid-content">
                    <a class="post-cat ts-orange-bg" href="#">{{ $posts[0]->category->name }}</a>
                    <div class="ts-post-thumb">
                        <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">
                            <img class="img-fluid" src="{{ asset($posts[0]->thumbnail) }}" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="{{route('post',['category' => $posts[0]->category->name,'post' => $posts[0]->slug])}}">{{ $posts[0]->title }}</a>
                        </h3>
                        <span class="post-date-info">
                            <i class="fa fa-clock-o"></i>
                            {{ $posts[0]->created_at }}
                        </span>
                    </div>
                </div>
                <!-- ts single post item end-->
                <div class="ts-grid-box ts-grid-content">
                    <a class="post-cat ts-pink-bg" href="#">{{ $posts[1]->category->name }}</a>
                    <div class="ts-post-thumb">
                        <a href="#">
                            <img class="img-fluid" src="{{ asset($posts[1]->thumbnail) }}" alt="">
                        </a>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                            <a href="#">{{ $posts[1]->title }}</a>
                        </h3>
                        <span class="post-date-info">
                            <i class="fa fa-clock-o"></i>
                            {{ $posts[1]->created_at }}
                        </span>
                    </div>
                </div>
                <!-- ts single post item end-->
            </div>
            <!-- col end-->
            <div class="col-3">
                <x-recent-sidebar />

            </div>
            <!-- col end-->
        </div>
        <!-- row end-->
    </div>
    <!-- container end-->
</section>
<!-- block post area end-->
