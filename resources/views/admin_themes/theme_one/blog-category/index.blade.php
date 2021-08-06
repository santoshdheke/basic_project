@extends($theme_path.'common.layout')

@section('data')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route($base_route.'store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                @include($common_path.'form')

                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark" name="save" value="save">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }} List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Title</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($rows) && count($rows)>0)
                                    @php($key = 0)
                                    @foreach($rows as $row)
                                        @php($key++)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $row['title'] }}</td>
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-dark btn-xs" data-toggle="modal" data-target="#deleteModel{{ $row->id }}"><i class="fa fa-trash"></i></a>
                                                <div class="modal fade" id="deleteModel{{ $row->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route($base_route.'destroy',$row->id) }}" method="post">
                                                                @csrf @method('delete')
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Default Modal</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>One fine body&hellip;</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
