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
                            <li class="breadcrumb-item active"> Gambar Detail</li>
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
                @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                style="margin-top: 10px;">{{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="margin-top: 10px;">{{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                <form id="quickForm" method="POST" action="{{ url('add-image/'. $barang['id']) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $title }}</h3>
                                </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputBorder">Kode Produk <abbr style="color: red">*</abbr></label>
                                                    <input type="text" value="{{ $barang['kode_barang'] }}" type="text" class="form-control" id="exampleInputBorder" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputBorder">Nama Produk <abbr style="color: red">*</abbr></label>
                                                    <input type="text" value="{{ $barang['nama_barang'] }}" type="text" class="form-control" id="exampleInputBorder" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputBorder">Gambar Produk <abbr style="color: red">*</abbr></label>
                                                    @if ($barang->gambar_disply)
                                                        <img src="{{ asset('images/disply/'. $barang->gambar_disply) }}" alt="" width=300px height=auto>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputBorder">Gambar Detail <abbr style="color: red">*</abbr></label>
                                                        <div class="field_wrapper">
                                                            <input multiple="" type="file" name="url_gambar[]" id="url_gambar" value="" name="url_gambar[]" placeholder="Gambar Detail Barang" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url ('barang')}}" class="btn btn-primary">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="editImage" method="POST" action="{{ url('edit-image/'. $barang['id']) }}">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Gambar Detail Produk {{ $barang->nama_barang }}</h3>
                        </div>
                        <div class="card-body">
                            <table id="product" class="table table-bordered table-hover">
                                <thead>
                                    <tr style="text-align: center">
                                        <th>Gambar Produk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang['image'] as $key)
                                        <input type="text" style="display: none" name="id_gam[]" value="{{ $key['id'] }}">

                                        <tr style="text-align: center">
                                            <td>
                                                <img src="{{ asset('images/katalog/' . $key['url_gambar']) }}"
                                                    alt="{{ $key['nama_barang'] }}" width="200px" />
                                            </td>
                                            <td style="text-align: center">
                                                <a class="confirmDelete" name="gambar"
                                                    href="{{ url('delete-image/' . $key->id) }}"><i
                                                    class='fas fa-trash-alt'></i>
                                                </a>
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
