@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/select2/css/select2.min.css') }}">
    <style>
        .select2-selection {
            background-color: #343a40 !important;
            color: #dae0e5 !important;
        }

        .select2-selection__rendered {
            color: #dae0e5 !important;
            margin-top: -6px !important;
        }
    </style>
@endpush
<div>
    <form action="">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Filter</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @isset($categories)
                <!-- /.card-body -->
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control select2 " style="width: 100%;">
                                    <option value="All">All</option>
                                    @foreach ($categories as $id => $name)
                                        <option {{ $id == request()->category_id ? 'selected' : '' }}
                                            value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            @endisset
            @isset($status)
                <!-- /.card-body -->
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Is active</label>
                                <select name="is_active" class="form-control select2 " style="width: 100%;">
                                    <option selected value="All">All</option>
                                    @foreach ($status as $key => $value)
                                        <option
                                            {{ request()->has('is_active') && $key == request()->is_active ? 'selected' : '' }}
                                            value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            @endisset
            @isset($sort)
                <!-- /.card-body -->
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Order by:</label>
                                <select name="order_by" class="form-control select2 " style="width: 100%;">
                                    <option selected selected value="desc">Desc</option>
                                    <option {{request()->order_by == 'asc' ? 'selected' : ''}} value="asc">Asc</option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            @endisset
            @isset($blocked)
                <!-- /.card-body -->
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User status</label>
                                <select name="is_blocked" class="form-control select2 " style="width: 100%;">
                                    <option selected value="All">All</option>
                                    @foreach ($blocked as $key => $value)
                                        <option
                                            {{ request()->has('is_blocked') && $key == request()->is_blocked ? 'selected' : '' }}
                                            value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            @endisset
            @isset($search)
                <div class="form-group">
                    <div class="input-group col-6">
                        <input value="{{ request()->q ?? '' }}" name="q" type="search"
                            class="form-control form-control-md" placeholder="Keywords">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-md btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endisset
            <div class="card-footer" style="display: block;">
                <button class="btn btn-light">Filter</button>
            </div>
        </div>
    </form>
</div>
@push('script')
    <script src="{{ asset('dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        //Initialize Select2 Elements
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
    </script>
    <!-- Select2 -->

@endpush
