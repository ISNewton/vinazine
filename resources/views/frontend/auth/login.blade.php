@extends('frontend.layoutes.main')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="ts-grid-box">
                        <div class="login-page">
                            <h3 class="log-sign-title text-center mb-25">Please Log In, or <a
                                    href="{{ route('register') }}">Sign
                                    Up</a></h3>

                            <div class="row">
                                {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="#" class="btn btn-lg btn-primary btn-fb btn-block">Facebook</a>
                                </div> --}}
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <a href="{{route('googleRedirect')}}" class="btn btn-lg btn-info btn-block">Google</a>
                                </div>
                            </div><!-- row end -->
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or">or</span>
                            </div>

                            <form role="form" action="{{ route('PostLogin') }}" method="POST">
                                @csrf
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger h5">- {{ $error }}</div>
                                @endforeach
                                <div class="form-group">
                                    <label for="inputUsernameEmail">Email</label>
                                    <input value="{{old('email')}}" required name="email" type="email" class="form-control"
                                        id="inputUsernameEmail">
                                </div>
                                <div class="form-group">
                                    <a class="pull-right" href="{{route('password.request')}}">Forgot password?</a>
                                    <label for="inputPassword">Password</label>
                                    <input required name="password" type="password" class="form-control" id="inputPassword">
                                </div>
                                <div class="checkbox pull-right">
                                    <label>
                                        <input type="checkbox">
                                        Remember me </label>
                                </div>
                                <button type="submit" class="btn btn btn-primary">
                                    Log In
                                </button>
                            </form>
                        </div>
                    </div><!-- grid box end -->
                </div>
                <!-- col end-->

            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->
@endsection
