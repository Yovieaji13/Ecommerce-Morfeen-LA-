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
                            <li class="breadcrumb-item active">Ongkir</li>
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
                                <h3 class="card-title">Ongkir</h3>
                                <a class="btn btn-block btn-success" href="{{ url ('/add-edit-ongkir')}}"
                                style="max-width: 150px; float:right; disply:inline-block">
                                <i>Tambah Ongkir</i>
                            </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="category" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>No.</th>
                                            <th>Provinsi</th>
                                            <th>Harga</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ongkir as $key=>$value)
                                            <tr>
                                                <td style="text-align: center">{{ $ongkir->firstItem() + $key }}</td>
                                                <td>{{ $value->provinsi }}</td>
                                                <td><?= "Rp " . number_format($value->harga,0,',','.')?></td>
                                                <td>{{ $value->slug }}</td>
                                                <td>
                                                    @if($value->status == 1)
                                                        <div class="p-1 mb-1 bg-success text-white" style="text-align: center">Aktif</div>
                                                    @else
                                                        <div class="p-1 mb-1 bg-danger text-white" style="text-align: center">Non Aktif</div>
                                                    @endif
                                                </td>
                                                <td style="text-align: center"><a  href="{{ url('add-edit-ongkir/'.$value->slug) }}" title="Edit ongkir"><i class='fas fa-edit'></i></a></td></td>
                                                <td style="text-align: center"><a class="confirmDelete" name="ongkir" href="{{ url('delete-ongkir/'.$value->slug) }}" title="Hapus ongkir"><i class='fas fa-trash-alt'></i></a></td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="fa-pull-left pt-2">
                                    Tampilkan data no
                                    {{ $ongkir->firstItem() }}
                                    sampai no
                                    {{ $ongkir->lastItem() }}
                                    dari
                                    {{ $ongkir->total() }} data
                                </div>
                                <div class="fa-pull-right pt-2">
                                    {{ $ongkir->links() }}
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
