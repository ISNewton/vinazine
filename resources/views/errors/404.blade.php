{{-- @extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
 --}}

 @extends('frontend.layoutes.main')

 @section('content')
 <section class="block-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="error-page text-center col ts-grid-box">
                    <div class="error-code">
                        <h2>
                            <strong>404</strong>
                        </h2>
                    </div>
                    <div class="error-message">
                        <h3>Sorry! The Page Not Found ;(</h3>
                    </div>
                    <div class="error-body">
                        <h4>The Link You Followed Probably Broken or the page has been removed.</h4>
                        <a href="{{route('home')}}" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row end -->


    </div>
    <!-- Container end -->
</section>
 @endsection
