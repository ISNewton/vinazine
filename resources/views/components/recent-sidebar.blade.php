<div>
        <div class="post-list-item">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation">
                    <a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">
                        <i class="fa fa-clock-o"></i>
                        Recent
                    </a>
                </li>
                <li role="presentation">
                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                        <i class="fa fa-heart"></i>
                        Popular
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
                    @foreach ($recent as $post)
                        <div class="post-content media ">
                            <img class="d-flex sidebar-img" src="{{ asset($post->thumbnail) }}" alt="">
                            <div class="media-body">
                                <span class="post-tag">
                                    <a href="{{route('category',['category' => $post->category->name])}}" class="light-blue-color"> {{ $post->category->name }}</a>
                                </span>
                                <h4 class="post-title">
                                    <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">{{ $post->title }}</a>
                                </h4>
                            </div>
                        </div>
                        <!--post-content end-->
                    @endforeach
                </div>
                <!--ts-grid-box end -->

                <div role="tabpanel" class="tab-pane fade ts-grid-box post-tab-list" id="profile">
                    @foreach ($popular as $post)
                        <div class="post-content media">
                            <img class="d-flex sidebar-img" src="{{asset($post->thumbnail)}}" alt="">
                            <div class="media-body">
                                <span class="post-tag">
                                    <a href="{{route('category',$post->category->name)}}" class="green-color"> {{$post->category->name}}</a>
                                </span>
                                <h4 class="post-title">
                                    <a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">{{$post->title}}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                    <!--post-content end-->
                </div>
                <!--ts-grid-box end -->
            </div>
            <!-- tab content end-->
        </div>
        <!-- post-list-item end-->

</div>
