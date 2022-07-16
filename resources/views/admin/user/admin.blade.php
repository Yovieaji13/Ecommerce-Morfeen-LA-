@extends('admin.layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px;">{{ Session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admin</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="category" class="table table-bordered table-responsive">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>No Hp</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key=>$value)
                                            <tr>
                                                <td style="text-align: center">{{ $users->firstItem() + $key }}</td>
                                                <td>{{ $value->nama }}</td>
                                                <td>{{ $value->alamat }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->no_hp }}</td>
                                                <td>{{ $value->password }}</td>
                                                <td>
                                                    @if($value->is_admin == 1)
                                                        <div class="p-1 mb-1 bg-success text-white" style="text-align: center">Admin</div>
                                                    @else
                                                        <div class="p-1 mb-1 bg-danger text-white" style="text-align: center">Customer</div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="fa-pull-left pt-2">
                                    Tampilkan data no
                                    {{ $users->firstItem() }}
                                    sampai no
                                    {{ $users->lastItem() }}
                                    dari
                                    {{ $users->total() }} data
                                </div>
                                <div class="fa-pull-right pt-2">
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
