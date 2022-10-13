<!-- post wraper start-->
<section class="block-wrapper mb-45" id="more-news-section">
    <div class="container">
        <div class="ts-grid-box ts-grid-box-heighlight">
            <h2 class="ts-title">More News</h2>

            <div class="owl-carousel" id="more-news-slider">
                @foreach ($posts->random(6) as $post)
                    <div class="ts-overlay-style">
                        <div class="item">
                            <div class="ts-post-thumb">
                                <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">
                                    <img class="img-fluid" src="{{asset($post->thumbnail)}}" alt="">
                                </a>
                            </div>
                            <a class="post-cat ts-green-bg" href="{{route('category',$post->category->name)}}">{{$post->category->name}}</a>
                            <div class="overlay-post-content">
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
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts-overlay-style end-->

                @endforeach
            </div>
            <!-- most-populers end-->
        </div>
        <!-- ts-populer-post-box end-->
    </div>
    <!-- container end-->
</section>
<!-- post wraper end-->
