<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs =====================================-->
    <meta charset="utf-8">

    <!-- Mobile Specific Metas ================================-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Title- -->
    <title>Vinazine - Multi-Concept News, Magazine and Blog HTML Template</title>

    <!-- CSS
   ==================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">

    <!-- IcoFonts -->
    <link rel="stylesheet" href="{{ asset('frontend/css/icofonts.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owlcarousel.min.css') }}">

    <!-- slick -->
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/toastr/toastr.min.css') }}">

    <!-- navigation -->
    <link rel="stylesheet" href="{{ asset('frontend/css/navigation.css') }}">

    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/colors/color-0.css') }}">

    <!-- Responsive -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->

</head>

<body class="body-color">

    <!-- <div id="preloader">
  <div class="spinner">
   <div class="double-bounce1"></div>
   <div class="double-bounce2"></div>
  </div>
  <div class="preloader-cancel-btn-wraper">
   <a href="#" class="btn btn-primary preloader-cancel-btn">Cancel Preloader</a>
  </div>
 </div> -->


    <!-- top bar start -->
    <section class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center md-center-item">
                    {{-- <div class="ts-temperature">
                        <i class="icon-weather"></i>
                        <span>25.8
                            <b>c</b>
                        </span>
                        <span>Dubai</span>

                    </div> --}}

                   {{--  <ul class="ts-top-nav">
                        <li>
                            <a href="#">Blog</a>
                        </li>
                        <li>
                            <a href="#">Forums</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">Advertisement</a>
                        </li>
                    </ul> --}}

                </div>
                <!-- end col-->

                <div class="col-lg-6 text-right align-self-center">
                    <ul class="top-social">
                        <li>
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-pinterest"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-vimeo-square"></i>
                            </a>
                        </li>
                        <li class="ts-date">
                            <i class="fa fa-clock-o"></i>
                            {{ $date }}
                        </li>
                    </ul>
                </div>
                <!--end col -->


            </div>
            <!-- end row -->
        </div>
    </section>
    <!-- end top bar-->

    <!-- ad banner start -->
    <section class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-img">
                        <a href="{{route('home')}}">
                            <img class="img-fluid" src="{{ asset('frontend/images/banner/banner1.jpg') }}"
                                alt="">
                        </a>
                    </div>
                </div>
                <!-- col end -->
            </div>
            <!-- row  end -->
        </div>
        <!-- container end -->
    </section>
    <!-- ad banner end -->

    <!-- header nav start-->
    <header class="header-default">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 pr-0">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{ asset('frontend/images/logo/banner_logo.png') }}" alt="">
                        </a>
                    </div>

                </div>
                <!-- logo end-->
                <div class="col-lg-10 header-nav-item">
                    <div class="ts-breaking-news clearfix">
                        <h2 class="breaking-title float-left">
                            <i class="fa fa-bolt"></i> Breaking News :
                        </h2>

                        <div class="breaking-news-content owl-carousel float-left" id="breaking_slider">
                            @foreach ($breaking_news as $post)
                                <div class="breaking-post-content">
                                    <p>
                                        <a
                                            href="{{ route('post', ['category' => $post->category->name, 'post' => $post->slug]) }}">{{ $post->title }}</a>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--nav top end-->
                    <nav class="navigation ts-main-menu ts-menu-sticky navigation-landscape">
                        <div class="nav-header">
                            <a class="nav-brand mobile-logo visible-xs" href="{{route('home')}}">
                                <img src="{{ asset('frontend/images/logo/footer_logo.png') }}" alt="">
                            </a>
                            <div class="nav-toggle"></div>
                        </div>
                        <!--nav brand end-->

                        <div class="nav-menus-wrapper clearfix">
                            <!--nav right menu start-->
                            <ul class="right-menu align-to-right">
                                <li>
                                    <a href="{{route('myProfile')}}">
                                        <i class="fa fa-user-circle-o"></i>
                                    </a>
                                </li>
                                <li class="header-search">
                                    <div class="nav-search">
                                        <div class="nav-search-button">
                                            <i class="icon icon-search"></i>
                                        </div>
                                        <form action="{{route('search')}}" method="POST">
                                            @csrf
                                            @if ($errors->has('search'))
                                            @error('search')
                                                <div class="text-danger h6">{{$errors->first('search')}}</div>
                                            @enderror

                                            @endif
                                            <span class="nav-search-close-button" tabindex="0">✕</span>
                                            <div class="nav-search-inner">
                                                <input type="search" name="search" name="q"
                                                    placeholder="Type and hit ENTER" required>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                            <!--nav right menu end-->

                            <!-- nav menu start-->
                            <ul class="nav-menu">
                                <li class="active">
                                    <a href="{{route('home')}}">Home</a>
                                </li>
                                @foreach ($header_categories as $category)
                                <li>
									<a href="{{route('category',$category->name)}}">{{$category->name}}</a>
									<div class="megamenu-panel">
										<div class="row">
                                            @foreach ($category->posts as $post)

											<div class="col-12 col-lg-3">
												<div class="item">
													<div class="ts-post-thumb">
														<a href="">
															<img class="img-fluid" src="{{asset($post->thumbnail)}}" alt="">
														</a>
														<a href="{{route('post',['category' => $category->name,'post' => $post->slug])}}" class="fa fa-play-circle-o ts-video-icon"></a>
													</div>
													<div class="post-content">
														<h3 class="post-title">
															<a href="{{route('post',['category' => $category->name,'post' => $post->slug])}}">{{$post->title}}</a>
														</h3>
													</div>
												</div>
											</div>
                                            @endforeach
										</div>
									</div>
								</li>
                                @endforeach
                                {{-- @foreach ($header_categories as $category)
                                    <li class="">
                                        <a
                                            href="{{ route('category', $post->category->name) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach --}}
                            </ul>
                            <!--nav menu end-->
                        </div>
                    </nav>
                    <!-- nav end-->
                </div>
            </div>
        </div>
    </header>
    <!-- header nav end-->
