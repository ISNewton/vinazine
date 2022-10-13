@extends('frontend.layoutes.main')

@section('content')
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Verify Your Email Address</div>
                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    A verification link has been sent to your email address.
                                </div>
                            @endif
                            Before proceeding, please check your email for a verification link.
                            If you did not receive the email,
                             <form class="mt-6 d-inline" action="{{route('verification.send')}}" method="POST">
                                @csrf
                                <button class="border-0 btn-link bg-white " type="submit">click here to request another</button>

                            </form>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
