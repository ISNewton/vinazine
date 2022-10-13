@extends('dashboard.layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <x-content-wrapper title="Posts">
        <a type="button" class="btn btn-light text-lg" href="{{route('posts.create')}}">Create</a>
    </x-content-wrapper>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <x-filter :categories="$categories" :status="$status" search/>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Title</th>
                <th>User</th>
                <th >Is active</th>
                <th >Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><a class="text-light" href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>
                            <p class="badge badge-{{$post->is_active ? 'success' : 'danger'}}">{{$post->is_active ? 'Active' : 'Inactive'}}</p>
                        </td>
                        <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                        <th>
                            <a class="btn btn-light" href="{{route('posts.edit',$post->slug)}}">Edit</a>
                            <form class="d-inline" action="{{route('posts.destroy',$post->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
            <div>
            </div>
        </table>
        {!! $posts->links() !!}
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
