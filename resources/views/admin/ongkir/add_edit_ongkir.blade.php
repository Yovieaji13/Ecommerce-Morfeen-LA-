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
                @if ($errors->any())
                    <div class="alert alert-danger" style="margi-top:10px">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }}</h3>
                            </div>
                            <form id="quickForm"
                                @if(empty($ongkir['slug'])) action="{{ url('add-edit-ongkir') }}"
                                @else action="{{ url('add-edit-ongkir/' . $ongkir['slug']) }}"
                                @endif
                            method="POST" enctype="multipart/form-data"> @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Nama Provinsi <abbr style="color: red">*</abbr></label>
                                        <input type="text" class="form-control" id="exampleInputBorder" name="provinsi" placeholder="Nama Provinsi"
                                            @if (!empty($ongkir['provinsi'])) value="{{ $ongkir['provinsi'] }}"
                                            @else value="{{ old('provinsi') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Harga <abbr style="color: red">*</abbr> </label>
                                        <input type="text" class="form-control" id="exampleInputBorder" name="harga" placeholder="Harga"
                                            @if (!empty($ongkir['harga'])) value="{{ $ongkir['harga'] }}"
                                            @else value="{{ old('harga') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1" value="1"
                                            @if (!empty($ongkir['status']) && $ongkir['status'] == "1")
                                                checked = ""
                                            @endif
                                        >
                                        <label class="form-check-label" >Status (Aktif / Non Aktif)</label>
                                    </div>
                                    <small>NB: Jika checkbox (v = centang) menandakan data ongkir aktif (ditampilkan pada halaman customer)</small>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url ('ongkir')}}" class="btn btn-primary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.card -->
    </div>
    <!-- /.content-wrapper -->
@endsection
