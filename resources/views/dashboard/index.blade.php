@extends('dashboard.layouts.dashboard')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <x-content-wrapper title="Dashboard" />

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Website Traffic</span>
                  <span class="info-box-number">

                    {{$traffic}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Posts</span>
                  <span class="info-box-number">{{$posts}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Authors</span>
                  <span class="info-box-number">{{$authors}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number">{{$users}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- TABLE: LATEST ORDERS -->
        <div class="card m-4">
            <div class="card-header border-transparent">
              <h3 class="card-title">Latest Orders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Author</th>
                    <th>Views</th>
                    <th>Time</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($latest_posts as $post)
                        <tr>
                            <td><a href="{{route('posts.show',$post->slug)}}">{{$post->id}}</a></td>
                            <td>{{$post->title}}</td>
                            <td><span class="badge badge-{{$post->is_active ? 'success' : 'danger'}}">{{$post->is_active ? 'Active' : 'Inactive'}}</span></td>
                            <td>{{$post->user->name ?? $post->user->email}}</td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$post->views_count}}</div>
                            </td>
                            <td>{{$post->created_at}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="{{route('posts.create')}}" class="btn btn-sm btn-info float-left">Create New Post</a>
              <a href="{{route('posts.index')}}" class="btn btn-sm btn-secondary float-right">View All Posts</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- USERS LIST -->
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Most Active Authors</h3>

              <div class="card-tools">
                <span class="badge badge-danger">{{$active_authors->count()}}</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <ul class="users-list clearfix">
                @foreach ($active_authors->reverse() as $user)
                    <li>
                    <img width="150" height="150" src="{{$user->avatar}}" alt="User Image">
                    <a class="users-list-name" href="#">{{$user->name ?? $user->email}}</a>
                    <span class="users-list-date">{{$user->created_at->diffForHumans()}}</span>
                    <span class="users-list-date">Posts: {{$user->posts_count}}</span>
                    </li>
                @endforeach
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="javascript:">View All Users</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!--/.card -->
          <!-- /.card -->
          <!-- /.row -->

          <div class="container-fluid">

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
