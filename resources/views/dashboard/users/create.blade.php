@extends('dashboard.layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <x-content-wrapper title="Users">
    </x-content-wrapper>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger col-6">{{$error}}</div>
            @endforeach
            <div class="col-6 text-lg mb-4">
                <label for="name">Name *</label>
                <input required id="name" name="name" class="form-control form-control-lg" type="text" placeholder="name">
            </div>
            <div class="col-6 text-lg mb-4">
                <label for="bio">Bio</label>
                <input id="bio" name="bio" class="form-control form-control-lg" type="text" placeholder="Bio">
            </div>
            <div class="col-6 text-lg mb-4">
                <label for="email">Email *</label>
                <input required id="email" name="email" class="form-control form-control-lg" type="email" placeholder="example@example.com">
            </div>
            <div class="col-6 text-lg mb-4">
                <label for="password">Password *</label>
                <input required id="password" name="password" class="form-control form-control-lg" type="password" placeholder="*********">
            </div>
            <div class="col-6 text-lg mb-4">
                <label for="password_confirmation">Password confirmation</label>
                <input required id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" type="password" placeholder="*********">
            </div>

            <div class="col-6 text-lg mb-4">
                <div class="form-group">
                    <label for="user_type">User type</label>
                    <select name="user_type" id="user_type">
                        @foreach ($roles as $key => $role)
                            <option value="{{$role}}">{{$key}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-light text-lg">Save</button>
        </form>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
