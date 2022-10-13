@extends('dashboard.layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <x-content-wrapper title="Categories">
        <a type="button" class="btn btn-light text-lg" href="{{route('tags.create')}}">Create</a>
    </x-content-wrapper>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <th>
                            <a class="btn btn-light" href="{{route('tags.edit',$tag->id)}}">Edit</a>
                            <form class="d-inline" action="{{route('tags.destroy',$tag->id)}}" method="POST">
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
        {!! $tags->links() !!}
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
