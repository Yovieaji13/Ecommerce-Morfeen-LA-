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
                            <li class="breadcrumb-item active">Produk</li>
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
                                @if(empty($barang['slug'])) action="{{ url('add-edit-product') }}"
                                @else action="{{ url('add-edit-product/' . $barang['slug']) }}"
                                @endif
                            method="POST" enctype="multipart/form-data"> @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        @if ($barang->gambar_disply)
                                        <img src="{{ asset('images/disply/'. $barang->gambar_disply) }}"  width=300px height=auto>
                                    @endif
                                    <div class="form-group pt-2">
                                        <label for="exampleInputFile">Gambar Produk<abbr style="color: red">*</abbr></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"  name="gambar_disply" id="gambar_disply"
                                                    @if (!empty($barang['gambar_disply'])) value="{{ $barang['gambar_disply'] }}"
                                                    @else value="{{ old('gambar_disply') }}"
                                                    @endif
                                                >
                                                <label for="exampleInputFile" class="custom-file-label">Pilih Gambar</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                        <label>Pilih Kategori <abbr style="color: red">*</abbr></label>
                                        <select name="id_kategori" id="id_kategori" class="custom-select">
                                            <option selected disabled><b>Pilih Kategori</b></option>
                                            @foreach ($category as $key)
                                                <option value="{{ $key->id }}"
                                                    @if (!empty(@old('id_kategori')) && $key['id'] == old('id_kategori'))
                                                        selected=""
                                                    @elseif (!empty($barang['id_kategori']) && $barang['id_kategori'] == $key['id'])
                                                        selected=""
                                                    @endif
                                                    >{{ $key->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Kode Produk <abbr style="color: red">*</abbr></label>
                                        <input type="text" class="form-control" id="exampleInputBorder" name="kode_barang" placeholder="Kode Barang"
                                            @if (!empty($barang['kode_barang'])) value="{{ $barang['kode_barang'] }}"
                                            @else value="{{ old('kode_barang') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Nama Produk <abbr style="color: red">*</abbr></label>
                                        <input type="text" class="form-control" id="exampleInputBorder" name="nama_barang" placeholder="Nama Barang"
                                            @if (!empty($barang['nama_barang'])) value="{{ $barang['nama_barang'] }}"
                                            @else value="{{ old('nama_barang') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Harga Produk <abbr style="color: red">*</abbr></label>
                                        <input type="number" class="form-control"  name="harga" placeholder="Harga Barang"
                                            @if (!empty($barang['harga'])) value="{{ $barang['harga'] }}"
                                            @else value="{{ old('harga') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Deskripsi Produk <abbr style="color: red">*</abbr></label>
                                        <textarea type="text" class="form-control" rows="3" id="exampleInputBorder" name="deskripsi" placeholder="Deskripsi Barang">
                                            @if (!empty($barang['deskripsi'])) {{ $barang['deskripsi'] }}
                                            @else {{ old('deskripsi') }}
                                            @endif
                                        </textarea>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="trending" id="exampleCheck1" value="Yes"
                                            @if (!empty($barang['trending']) && $barang['trending'] == "Yes")
                                                checked = ""
                                            @endif
                                        >
                                        <label class="form-check-label" >Trending (Ya / Tidak)</label>
                                    </div>
                                    <small>NB: Jika checkbox (v = centang) menandakan produk trending</small><br><br>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1" value="1"
                                            @if (!empty($barang['status']) && $barang['status'] == "1")
                                                checked = ""
                                            @endif
                                        >
                                        <label class="form-check-label" >Status (Aktif / Non Aktif)</label>
                                    </div>
                                    <small>NB: Jika checkbox (v = centang) menandakan produk aktif (ditampilkan pada halaman customer)</small>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url ('barang')}}" class="btn btn-primary">Kembali</a>
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
