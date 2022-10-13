@extends('dashboard.layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <x-content-wrapper title="Categories">
    </x-content-wrapper>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger col-6">{{$error}}</div>
            @endforeach
            <div class="col-6 text-lg mb-4">
                <label for="name">name *</label>
                <input required id="name" name="name" class="form-control form-control-lg" type="text" placeholder="name">
            </div>
            <button type="submit" class="btn btn-light text-lg">Save</button>
        </form>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
