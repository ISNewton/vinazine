@extends('dashboard.layouts.dashboard')
@section('content')

<div class="content-wrapper">
    <x-content-wrapper title="Users">
        <a type="button" class="btn btn-light text-lg" href="{{route('users.create')}}">Create</a>
    </x-content-wrapper>

    <!-- Main content -->
    <section class="content">
        <x-filter search :blocked="$status" />
      <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th >Email</th>
                <th >Posts</th>
                <th >Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a class="text-light" href="{{route('users.show',$user->id)}}">{{$user->name}}</a> </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->posts_count}}</td>
                        <td>
                            <p class="badge badge-{{$user->is_blocked ? 'danger' : 'success'}}">{{$user->is_blocked ? 'Blocked' : 'Unblocked'}}</p>
                        </td>
                        <th>
                            <a class="btn btn-light" href="{{route('users.edit',$user->id)}}">Edit</a>
                            <form class="d-inline" action="{{route('users.destroy',$user->id)}}" method="POST">
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
        {!! $users->links() !!}
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
