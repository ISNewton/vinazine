@extends('frontend.layoutes.main')
@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="ts-grid-box">
                        <div class="reg-page">
                            <h3 class="log-sign-title mb-25">Please write your email as we will mail you a link to reset your password</h3>
                            @foreach ($errors->all() as $error)
                                <div class="text-danger h5">- {{ $error }}</div>
                            @endforeach
                            @if (session()->has('status'))
                                <div class="alert-warning p-3">{{session()->get('status')}}</div>
                            @endif
                            <form action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input name="email" required type="email" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label for="capatcha">Captcha</label>
                                    <div class="captcha">
                                      <span>{!! app('captcha')->display() !!}</span>
                                      <!-- <button type="button" class="btn btn-success refresh-cpatcha"><i class="fa fa-refresh"></i></button> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Send </button>
                                </div> <!-- form-group// -->
                            </form>
                            <div class="border-top card-body text-center h6">or <a
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

