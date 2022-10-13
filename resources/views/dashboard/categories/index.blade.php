@extends('dashboard.layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <x-content-wrapper title="Categories">
        <a type="button" class="btn btn-light text-lg" href="{{route('categories.create')}}">Create</a>
    </x-content-wrapper>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Posts</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->posts_count}}</td>
                        <th>
                            <a class="btn btn-light" href="{{route('categories.edit',$category->name)}}">Edit</a>
                            <form class="d-inline" action="{{route('categories.destroy',$category->name)}}" method="POST">
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
        {!! $categories->links() !!}
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
