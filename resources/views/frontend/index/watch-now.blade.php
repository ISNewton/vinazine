<!-- watch now start-->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="ts-grid-box watch-post mb-30">
                    <h2 class="ts-title">Watch Now</h2>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="tab-content featured-post" id="nav-tabContent">
                                <div class="tab-pane ts-overlay-style fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="item"
                                        style="background-image: url({{ asset('frontend/images/news/travel/travel2.jpg') }})">

                                        <a class="post-cat ts-orange-bg" href="#">TRAVEL</a>
                                        <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                                            <i class="fa fa-play-circle-o"></i>
                                        </a>
                                        <div class="overlay-post-content">
                                            <div class="post-content">
                                                <h3 class="post-title md">
                                                    <a href="#">They’re back! Kennedy Darling, LeCras named to
                                                        return</a>
                                                </h3>
                                                <ul class="post-meta-info">
                                                    <li class="author">
                                                        <a href="#">
                                                            <img src="images/avater/author1.jpg" alt=""> Donald
                                                            Ramos
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-clock-o"></i>
                                                        March 21, 2019
                                                    </li>
                                                    <li class="active">
                                                        <i class="icon-fire"></i>
                                                        3,005
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- overlay post content-->
                                    </div>
                                    <!-- item end-->
                                </div>
                                <!--tab-pane ts-overlay-style end-->
                            </div>

                        </div>
                        <!-- col end-->

                        <div class="col-lg-5">
                            <div class="nav post-list-box" id="nav-tab" role="tablist">
                                @foreach ($posts->random(3) as $post)
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                        href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}"
                                        role="tab" aria-controls="nav-home" aria-selected="true">
                                        <div class="post-content media">
                                            <img class="d-flex" src="{{ asset($post->thumbnail) }}" alt="">
                                            <div class="media-body align-self-center">
                                                <h4 class="post-title">
                                                    {{ $post->title }}
                                                </h4>
                                                <span class="post-date-info">
                                                    <i class="fa fa-clock-o"></i>
                                                    {{ $post->created_at }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <!-- watch list post end-->
                        </div>
                        <!-- col end -->
                    </div>
                    <!-- row end-->
                </div>
                <!-- ts-populer-post-box end-->

                <!-- tranding post start -->
                <div class="row category-style">
                    <div class="col-lg-4">
                        <div class="ts-grid-box ts-col-box">
                            <h2 class="ts-title">Fashion</h2>
                            @foreach ($posts->random(2) as $post)
                                <div class="item">
                                    <div class="ts-post-thumb">
                                        <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                                        <a
                                            href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">
                                            <img class="img-fluid" src="{{ asset($post->thumbnail) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a
                                                href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">{{ $post->title }}</a>
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                            <!-- ts-grid-box end-->
                        </div>
                        <!-- ts-populer-post-box end-->
                    </div>
                    <!-- col end-->
                    <div class="col-lg-8">
                        <div class="ts-grid-box ts-tranding-post">
                            <h2 class="ts-title">Trending</h2>
                            <!-- arrow start -->
                            <div class="ts-arrow">
                                <a class="control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="fa fa-angle-left" aria-hidden="true"></span>
                                </a>
                                <a class="control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="fa fa-angle-right" aria-hidden="true"></span>
                                </a>
                            </div>
                            <!-- arrow end -->

                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($posts->take(2) as $post)
                                        <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                                            <div class="ts-overlay-style">
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="#">
                                                            <img class="img-fluid" src="{{ asset($post->thumbnail) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md">
                                                                <a
                                                                    href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">{{ $post->title }}</a>
                                                            </h3>
                                                            <ul class="post-meta-info">
                                                                <li class="author">
                                                                    <a
                                                                        href="{{ route('author',$post->user->username) }}">
                                                                        <img src="{{ asset($post->user->avatar) }}"
                                                                            alt="">{{ $post->user->name }}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>
                                                                    {{ $post->created_at }}
                                                                </li>
                                                                <li class="active">
                                                                    <i class="icon-fire"></i>
                                                                    {{ $post->views_count }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                    <!-- ts-overlay-style end-->

                                    {{-- <div class="carousel-item">
                                        <div class="ts-overlay-style">
                                            <div class="item">
                                                <div class="ts-post-thumb">
                                                    <a href="#">
                                                        <img class="img-fluid" src="images/news/fashion/fashion4.jpg"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="overlay-post-content">
                                                    <div class="post-content">
                                                        <h3 class="post-title md">
                                                            <a href="#">They’re back! Kennedy Darling, LeCras
                                                                named Kennedy Darling, LeCras named to return</a>
                                                        </h3>
                                                        <ul class="post-meta-info">
                                                            <li class="author">
                                                                <a href="#">
                                                                    <img src="images/avater/author1.jpg"
                                                                        alt=""> Donald Ramos
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-clock-o"></i>
                                                                March 21, 2019
                                                            </li>
                                                            <li class="active">
                                                                <i class="icon-fire"></i>
                                                                3,005
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- carousel-inner end -->



                                <!-- slider dot start -->
                                <ol class="slider-indicators carousel-indicators heighlight clearfix">
                                    @foreach ($posts->random(2) as $post)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                            class="active">
                                            <div class="post-content media">
                                                <div class="d-flex post-count">{{ $loop->index + 1 }}</div>
                                                <div class="media-body align-self-center">
                                                    <h4 class="post-title">
                                                        <a
                                                            href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">{{ $post->title }}
                                                        </a>
                                                    </h4>
                                                    <span class="post-date-info">
                                                        <i class="fa fa-clock-o"></i>
                                                        {{ $post->created_at }}
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                                <!-- slider dot end -->
                            </div>
                            <!-- watch now content end-->
                        </div>
                    </div>
                </div>
                <!-- tranding post end -->

            </div>
            <!-- col end-->
            <div class="col-lg-3">
                <div class="right-sidebar">
                    <x-follow-us />
                    <!-- widgets end-->

                    <div class="widgets widget-banner">
                        <a href="#">
                            <img src="images/banner/sidebar-banner1.jpg" alt="">
                        </a>
                    </div>
                    <!-- widgets end-->
                    <div class="widgets ts-grid-box widgets-populer-post">
                        <div class="topic-list">
                            hot Topics
                        </div>
                        <div class="ts-overlay-style">
                            @foreach ($posts->random(1) as $post)
                                <div class="item">
                                    <div class="ts-post-thumb">
                                        <a
                                            href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">
                                            <img class="img-fluid" src="{{ asset($post->thumbnail) }}"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="overlay-post-content">
                                        <div class="post-content">
                                            <h3 class="post-title">
                                                <a
                                                    href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">{{ $post->title }}</a>
                                            </h3>
                                            <span class="post-date-info">
                                                <i class="fa fa-clock-o"></i>
                                                {{ $post->created_at }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- ts-overlay-style  end-->
                        @foreach ($posts->random(2) as $post)
                            <div class="post-content media">
                                <img class="d-flex sidebar-img" src="{{ asset($post->thumbnail) }}" alt="">
                                <div class="media-body align-self-center">
                                    <h4 class="post-title">
                                        <a
                                            href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">{{ $post->title }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                        <!-- post content end-->
                    </div>
                    <!-- widgets end-->
                </div>
                <!-- right sidebar end-->
            </div>
            <!-- col end-->
        </div>
    </div>
    <!-- container end-->
</section>
<!-- watch now end-->
