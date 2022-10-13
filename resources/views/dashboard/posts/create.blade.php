@extends('dashboard.layouts.dashboard')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.css') }}">
    @endpush
    <div class="content-wrapper">
        <x-content-wrapper title="Posts">
        </x-content-wrapper>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger col-6">{{ $error }}</div>
                    @endforeach
                    <div class="col-6 text-lg mb-4">
                        <label for="title">Title *</label>
                        <input required id="title" name="title" class="form-control form-control-lg" type="text"
                            placeholder="form-control-lg">
                    </div>

                    <div class="form-group">
                        <label>Category *</label>
                        <select required name="category_id" class="form-control">
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="summernote" class="text-lg">Content *</label>
                    <textarea id="summernote" name="content">
                Place <em>some</em> <u>text</u> <strong>here</strong>
            </textarea>
                    <div class="col-6 text-lg mb-4">
                        <label for="is_active">Is active</label>
                        <input class="text-lg" id="is_active" name="is_active" type="checkbox" name="my-checkbox" data-bootstrap-switch
                            data-off-color="danger" data-on-color="success">
                    </div>
                    {{-- <button type="submit" class="btn btn-light text-lg" name="save">Save</button> --}}
                    <input type="submit" class="btn btn-light text-lg" name="Save" value="Save">
                </form>
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('script')
    <script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
        })
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    </script>
@endpush
