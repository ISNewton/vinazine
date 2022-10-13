@extends('frontend.layoutes.main')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">

                    <div class="ts-grid-box">
                        <div class="reg-page">
                            <h3 class="log-sign-title mb-25">Please Signup</h3>
                            @foreach ($errors->all() as $error)
                                <div class="text-danger h5">- {{ $error }}</div>
                            @endforeach
                            <form action="{{ route('PostRegister') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Full name </label>
                                        <input required name="name" type="text" class="form-control" placeholder="">
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row end.// -->
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input name="email" required type="email" class="form-control" placeholder="">
                                    <small class="form-text text-muted">We'll never share your email with anyone
                                        else.</small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Password</label>
                                    <input required name="password" class="form-control" type="password">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input required name="password_confirmation" class="form-control" type="password">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label for="capatcha">Captcha</label>
                                    <div class="captcha">
                                      <span>{!! app('captcha')->display() !!}</span>
                                      <!-- <button type="button" class="btn btn-success refresh-cpatcha"><i class="fa fa-refresh"></i></button> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Register </button>
                                </div> <!-- form-group// -->
                                <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our
                                    Terms of use and Privacy Policy.</small>
                            </form>
                            <div class="border-top card-body text-center">Have an account? <a
                                    href="{{ route('login') }}">Log In</a></div>
                        </div> <!-- card.// -->

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
@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
<script>
         grecaptcha.ready(function() {
             grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
         });
</script>
@endpush
