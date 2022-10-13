@extends('frontend.layoutes.main')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact-box ts-grid-box">

                        <h3>Edit profile</h3>
                        <form id="contact-form" action="{{ route('PostEditProfile') }}" method="post" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="error-container">
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger h5">- {{ $error }}</div>
                                @endforeach
                            </div>

                            <div class="row">
                                        <div class="col-md-12 my-3">
                                            <img style="border-radius: 50%;height: 100px;width:100px" height="200px" width="200px" class="author-img text-start"
                                                src="{{ asset($user->avatar) }}" alt="">

                                            <input type="file" name="avatar" id="">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Full name</label>
                                                <input value="{{ $user->name }}" class="form-control form-control-name"
                                                    name="name" id="name" placeholder="" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control form-control-email" name="email" id="email"
                                                    placeholder="" value="{{ $user->email }}" type="email" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bio</label>
                                                <input value="{{ $user->bio }}" class="form-control form-control-subject"
                                                    name="bio" id="subject" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control form-control-subject" name="password"
                                                    id="password" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Password confirmation</label>
                                                <input type="password" class="form-control form-control-subject"
                                                    name="password_confirmation" id="password" placeholder="">
                                            </div>
                                        </div>

                        </div>
                        </div>
                    <div class="text-right"><br>
                        <button class="btn btn-primary solid blank" type="submit">Update</button>
                    </div>
                    </form>
                </div><!-- grid box end -->



            </div>
            <!-- col end-->
            <div class="col-lg-3">
                <div class="right-sidebar">
                    <div class="ts-grid-box widgets">
                        <h2 class="ts-title">Follow us</h2>
                        <ul class="ts-social-list">
                            <li class="ts-facebook">
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <label>12.5 k </label>
                                <span>Likes</span>
                            </li>
                            <li class="ts-google-plus">
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <label>12.5 k </label>
                                <span>Follwers</span>
                            </li>
                            <li class="ts-twitter">
                                <a href="#">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <label>12.5 k </label>
                                <span>Follwers</span>
                            </li>
                            <li class="ts-pinterest">
                                <a href="#">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                                <label>12.5 k </label>
                                <span>Photos</span>
                            </li>
                            <li class="ts-linkedin">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <label>12.5 k </label>
                                <span>Follwers</span>
                            </li>
                            <li class="ts-youtube">
                                <a href="#">
                                    <i class="fa fa-youtube"></i>
                                </a>
                                <label>12.5 k </label>
                                <span>Follwers</span>
                            </li>
                        </ul>
                    </div>
                    <!-- widgets end-->

                    <div class="widgets widget-banner">
                        <a href="#">
                            <img class="img-fluid" src="images/banner/sidebar-banner2.jpg" alt="">
                        </a>
                    </div>
                    <!-- widgets end-->
                    <div class="post-list-item widgets">
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
                                    Favorites
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
                                <div class="post-content media">
                                    <img class="d-flex sidebar-img" src="images/news/sports/sports2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="green-color"> sports</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                                <div class="post-content media ">
                                    <img class="d-flex sidebar-img" src="images/news/tech/tech4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="yellow-color"> Technology</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                                <div class="post-content media">
                                    <img class="d-flex sidebar-img" src="images/news/sports/sports4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="blue-color"> Lifestyle</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                                <div class="post-content media">
                                    <img class="d-flex sidebar-img" src="images/news/fashion/fashion4.jpg"
                                        alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="pink-color"> Fashion</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                                <div class="post-content  media">
                                    <img class="d-flex sidebar-img" src="images/news/travel/travel6.jpg" alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="yellow-color"> Travel</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->

                            </div>
                            <!--ts-grid-box end -->

                            <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
                                <div class="post-content media">
                                    <img class="d-flex sidebar-img" src="images/news/travel/travel6.jpg" alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="green-color"> sports</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                                <div class="post-content media ">
                                    <img class="d-flex sidebar-img" src="images/news/fashion/fashion4.jpg"
                                        alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="yellow-color"> Technology</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                                <div class="post-content media">
                                    <img class="d-flex sidebar-img" src="images/news/sports/sports4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="blue-color"> Lifestyle</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                                <div class="post-content media">
                                    <img class="d-flex sidebar-img" src="images/news/sports/sports2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="pink-color"> Fashion</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                                <div class="post-content  media">
                                    <img class="d-flex sidebar-img" src="images/news/travel/travel6.jpg" alt="">
                                    <div class="media-body">
                                        <span class="post-tag">
                                            <a href="#" class="yellow-color"> Travel</a>
                                        </span>
                                        <h4 class="post-title">
                                            <a href="">18 month old shoots himself by gun </a>
                                        </h4>
                                    </div>
                                </div>
                                <!--post-content end-->
                            </div>
                            <!--ts-grid-box end -->
                        </div>
                        <!-- tab content end-->
                    </div>
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
