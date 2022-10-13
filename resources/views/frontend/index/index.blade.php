@extends('frontend.layoutes.main')
@section('content')

    @include('frontend.index.block-post')

    @include('frontend.index.post-wrapper')

	<!-- ad banner 2 start-->
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="banner-img text-center">
						<a href="index.html">
							<img class="img-fluid" src="images/banner/banner2.jpg" alt="">
						</a>
					</div>
				</div>
				<!-- col end -->
			</div>
			<!-- row  end -->
		</div>
		<!-- container end -->
	</section>
	<!-- ad banner 2 end-->

	@include('frontend.index.watch-now')

	@include('frontend.index.more-news')
@endsection
