<!-- post wraper start-->
<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="posts-ad">
                    <a href="#">
                        <img src="images/banner/sidebar-banner4.jpg" alt="">
                    </a>
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-9 col-md-8">
                <div class="ts-grid-box most-populer-item">
                    <h2 class="ts-title">Most Popular</h2>

                    <div class="most-populers owl-carousel">
                        @foreach ($posts->random(10) as $post)
                            <div class="item">
                                <a class="post-cat ts-orange-bg" href="#">{{ $post->category->name }}</a>
                                <div class="ts-post-thumb">
                                    <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">
                                        <img class="img-fluid" src="{{ asset($post->thumbnail) }}" alt="">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">{{ $post->title }}</a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        {{ $post->created_at }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                        <!-- ts-grid-box end-->
                    </div>
                    <!-- most-populers end-->
                </div>
                <!-- ts-populer-post-box end-->
            </div>
            <!-- col end-->
        </div>
        <!-- row end-->
    </div>
    <!-- container end-->
</section>
<!-- post wraper end-->
<!-- post wraper start-->
<section class="block-wrapper mb-30 hot-topics-heighlight">
    <div class="container">

        <div class="ts-grid-box">
            <h2 class="ts-title">Hot Topics</h2>

            <div class="owl-carousel" id="hot-topics-slider">
                @foreach ($posts->random(10) as $post)
                    <div class="item ts-blue-light-heighlight heighlight">
                        <div class="ts-post-thumb">
                            <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">
                                <img class="img-fluid" src="{{asset($post->thumbnail)}}" alt="">
                            </a>
                            <a class="post-cat" href="{{route('category',$post->category->name)}}">{{$post->category->name}}</a>
                        </div>

                        <div class="post-content">

                            <h3 class="post-title">
                                <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">{{$post->title}}</a>
                            </h3>
                            <span class="post-date-info">
                                <i class="fa fa-clock-o"></i>
                                {{$post->created_at}}
                            </span>
                        </div>
                    </div>
                @endforeach
                <!-- ts-grid-box end-->
            </div>
            <!-- most-populers end-->
        </div>
        <!-- ts-populer-post-box end-->
    </div>
    <!-- container end-->
</section>
<!-- post wraper end-->
