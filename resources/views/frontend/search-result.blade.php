@extends('frontend.layoutes.main')

@section('content')
    <!-- block post area start-->
		<section class="block-wrapper mt-15">
			<div class="container">
				<div class="row mb-30">
					<div class="col-lg-12">
						<div class="">
							<ol class="ts-breadcrumb">
								<li>
									<a href="#">
										<i class="fa fa-home"></i>
										Home
									</a>
								</li>
								<li>
									<a href="#">Search</a>
								</li>

							</ol>

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9">
						<div class="post-list">
							<!-- ts title end-->

                            @forelse ($posts as $post)

							<div class="row mb-10">
								<div class="col-md-4">
									<div class="ts-post-thumb">
										<a href="#" class="post-cat ts-purple-bg">{{$post->category->name}}</a>
										<a href="#">
											<img class="img-fluid" src="{{asset($post->thumbnail)}}" alt="">
										</a>
									</div>
								</div>
								<!-- col lg end-->
								<div class="col-md-8">
									<div class="post-content">
										<h3 class="post-title md">
											<a href="{{route('post',['category' => $post->category->name,'post' => $post->slug])}}">{{$post->title}}</a>
										</h3>
										<ul class="post-meta-info">
											<li>
												<a href="{{route('author',$post->user->username)}}"> {{$post->user->name}}</a>
											</li>
											<li>
												<i class="fa fa-clock-o"></i>
												{{$post->created_at}}
											</li>
										</ul>
										<p>
                                            {{$post->shortDescription()}}
										</p>
									</div>
								</div>
							</div>
                            @empty
                            <div class="row mb-10">
                                <div class="col">
                                    <h3 class="text-center">No posts found</h3>
                                </div>
                            </div>
                            @endforelse
							<!-- row end-->
						</div>
					</div>
					<div class="col-lg-3">
						<div class="right-sidebar-1">

							{{-- <div class="widgets widgets-item">
								<h3 class="widget-title">
									<span>On social</span>
								</h3>
								<ul class="ts-block-social-list">
									<li class="ts-facebook">
										<a href="#">
											<i class="fa fa-facebook"></i>
											<b>facebook </b>
											<span>1.5 k</span>
										</a>

									</li>
									<li class="ts-google-plus">
										<a href="#">
											<i class="fa fa-google-plus"></i>
											<b>Google Plus </b>
											<span>1.5 k</span>
										</a>

									</li>
									<li class="ts-twitter">
										<a href="#">
											<i class="fa fa-twitter"></i>
											<b>Twitter </b>
											<span>1.5 k</span>
										</a>

									</li>
									<li class="ts-pinterest">
										<a href="#">
											<i class="fa fa-pinterest-p"></i>
											<b>facebook </b>
											<span>1.5 k</span>
										</a>

									</li>
									<!-- <li class="ts-linkedin">
											<a href="#">
												<i class="fa fa-linkedin"></i>
												<b>12.5 k </b>
												<span>Follwers</span>
											</a>

										</li>
										<li class="ts-youtube">
											<a href="#">
												<i class="fa fa-youtube"></i>
												<b>12.5 k </b>
												<span>Follwers</span>
											</a>

										</li> -->
								</ul>
							</div> --}}
                            <x-follow-us />

							<!-- widgets end-->

							<div class="widgets widget-banner">
								<a href="#">
									<img class="img-fluid" src="images/banner/sidebar-banner4.jpg" alt="">
								</a>
							</div>
							{{-- <!-- widgets end-->
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
													<a href="">Beats did announce something today</a>
												</h4>
											</div>
										</div>
										<!--post-content end-->
										<div class="post-content media">
											<img class="d-flex sidebar-img" src="images/news/sports/sports3.jpg" alt="">
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
											<img class="d-flex sidebar-img" src="images/news/fashion/fashion4.jpg" alt="">
											<div class="media-body">
												<span class="post-tag">
													<a href="#" class="pink-color"> Fashion</a>
												</span>
												<h4 class="post-title">
													<a href="">Beats did announce something today</a>
												</h4>
											</div>
										</div>
										<!--post-content end-->

									</div>
									<!--ts-grid-box end -->

									<div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
										<div class="post-content media">
											<img class="d-flex sidebar-img" src="images/news/sports/sports2.jpg" alt="">
											<div class="media-body">
												<span class="post-tag">
													<a href="#" class="green-color"> sports</a>
												</span>
												<h4 class="post-title">
													<a href="">Beats did announce something today</a>
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
											<img class="d-flex sidebar-img" src="images/news/sports/sports2.jpg" alt="">
											<div class="media-body">
												<span class="post-tag">
													<a href="#" class="blue-color"> Lifestyle</a>
												</span>
												<h4 class="post-title">
													<a href="">Beats did announce something today</a>
												</h4>
											</div>
										</div>
										<!--post-content end-->
										<div class="post-content media">
											<img class="d-flex sidebar-img" src="images/news/fashion/fashion4.jpg" alt="">
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
									</div>
									<!--ts-grid-box end -->
								</div>
								<!-- tab content end-->
							</div> --}}
                            <x-recent-sidebar />
							<!-- widgets end-->

							{{-- <div class="widgets category-widget widgets-item">
									<x-category />
							</div> --}}
                            <div class="ts-grid-box widgets category-widget">
                                <x-category />
                            </div>

							<div class="widgets widgets-item">
								<div class="ts-widget-newsletter">
									<div class="newsletter-introtext">
										<h4>Newsletter</h4>
										<p>Subscribe to get the best stories into your inbox!</p>
									</div>

									<div class="newsletter-form">
										<form action="#" method="post">
											<div class="form-group">
												<input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="E-mail" autocomplete="off">
												<button class="btn btn-primary">Subscribe</button>
											</div>
										</form>
									</div>
								</div>
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
