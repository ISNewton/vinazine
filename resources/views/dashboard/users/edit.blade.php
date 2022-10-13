@extends('dashboard.layouts.dashboard')

@section('content')
    <div class="content-wrapper">
        <x-content-wrapper title="Users">
        </x-content-wrapper>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger col-6">{{ $error }}</div>
                    @endforeach
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <input type="file" name="avatar" id="">
                            </div>
                            <div class="com-4">
                                <div class="image">
                                    <img src="{{asset($user->avatar ?? config('app.default_avatar'))}}" class="img-circle elevation-2" alt="User Image">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-lg mb-4">
                        <label for="name">Name *</label>
                        <input value="{{ $user->name }}" required id="name" name="name"
                            class="form-control form-control-lg" type="text" placeholder="name">
                    </div>
                    <div class="col-6 text-lg mb-4">
                        <label for="bio">Bio</label>
                        <input value="{{$user->bio}}" id="bio" name="bio" class="form-control form-control-lg" type="text" placeholder="Bio">
                    </div>
                    <div class="col-6 text-lg mb-4">
                        <label for="email">Email *</label>
                        <input value="{{ $user->email }}" required id="email" name="email"
                            class="form-control form-control-lg" type="email" placeholder="example@example.com">
                    </div>
                    <div class="col-6 text-lg mb-4">
                        <label for="password">Password *</label>
                        <input id="password" name="password" class="form-control form-control-lg" type="password"
                            placeholder="*********">
                    </div>
                    <div class="col-6 text-lg mb-4">
                        <label for="password_confirmation">Password confirmation</label>
                        <input id="password_confirmation" name="password_confirmation" class="form-control form-control-lg"
                            type="password" placeholder="*********">
                    </div>
                    <div class="col-6 text-lg mb-4">
                        <div class="form-group">
                            <label for="user_type">User type</label>
                            <select name="user_type" id="user_type">
                                @foreach ($roles as $key => $role)
                                    <option {{$user->user_type == $role ? 'selected' : ''}} value="{{$role}}">{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 text-lg mb-4">
                        <label for="is_blocked">Is blocked</label>
                        <input id="is_blocked" name="is_blocked" {{ $user->is_blocked ? 'checked' : '' }} type="checkbox"
                            name="my-checkbox" data-bootstrap-switch data-off-color="danger" data-on-color="success">
                    </div>

                    <button type="submit" class="btn btn-light text-lg">Save</button>
                </form>
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('script')
    <!-- Bootstrap Switch -->
    <script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    </script>
@endpush
