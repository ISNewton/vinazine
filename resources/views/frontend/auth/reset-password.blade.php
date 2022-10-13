@extends('frontend.layoutes.main')

@section('content')
@extends('frontend.layoutes.main')

@section('content')
    <!-- post wraper start-->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="ts-grid-box">
                        <div class="reg-page">
                            <h3 class="log-sign-title mb-25">Please write your email and the new password</h3>
                            @foreach ($errors->all() as $error)
                                <div class="text-danger h5">- {{ $error }}</div>
                            @endforeach
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{$token}}">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" required type="email" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>New password</label>
                                    <input name="password" required type="password" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>New password confirmation</label>
                                    <input name="password_confirmation" required type="password" class="form-control" placeholder="">
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Submit </button>
                                </div> <!-- form-group// -->
                            </form>
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

@endsection
