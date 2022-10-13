@extends('dashboard.layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <x-content-wrapper title="{{$post->title}}">
    </x-content-wrapper>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header text-lg">
                <p>By: {{$post->user->name}}</p>
                <p>Category: {{$post->category->name}}</p>
            </div>
            <div class="card-body">
              <p class="card-text">
                {!! $post->content !!}
              </p>
            </div>
          </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
