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
                            <li class="breadcrumb-item active">Artikel</li>
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
                                @if(empty($article['slug'])) action="{{ url('add-edit-article') }}"
                                @else action="{{ url('add-edit-article/' . $article['slug']) }}"
                                @endif
                            method="POST" enctype="multipart/form-data"> @csrf
                                <div class="card-body">
                                    @if ($article->gambar_artikel)
                                        <img src="{{ asset('images/artikel/'. $article->gambar_artikel) }}" alt="" width=150px height=auto>
                                    @endif
                                    <div class="form-group pt-2">
                                        <label for="exampleInputFile">Gambar Artikel <abbr style="color: red">*</abbr></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"  name="gambar_artikel" id="gambar_artikel"
                                                    @if (!empty($article['gambar_artikel'])) value="{{ $article['gambar_artikel'] }}"
                                                    @else value="{{ old('gambar_artikel') }}"
                                                    @endif
                                                >
                                                <label for="exampleInputFile" class="custom-file-label">Pilih Gambar </label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Kategori <abbr style="color: red">*</abbr></label>
                                        <select name="id_catarticle" id="id_catarticle" class="custom-select">
                                            <option selected disabled><b>Pilih Kategori</b></option>
                                            @foreach ($catarticle as $key)
                                                <option value="{{ $key->id }}"
                                                    @if (!empty(@old('id_catarticle')) && $key['id'] == old('id_catarticle'))
                                                        selected=""
                                                    @elseif (!empty($article['id_catarticle']) && $article['id_catarticle'] == $key['id'])
                                                        selected=""
                                                    @endif
                                                    >{{ $key->nama_cat }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Judul Artikel <abbr style="color: red">*</abbr></label>
                                        <input type="text" class="form-control" id="exampleInputBorder" name="judul_artikel" placeholder="Judul Artikel"
                                            @if (!empty($article['judul_artikel'])) value="{{ $article['judul_artikel'] }}"
                                            @else value="{{ old('judul_artikel') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Deskripsi Artikel <abbr style="color: red">*</abbr></label>
                                        <textarea type="text" class="form-control" id="exampleInputBorder" name="deskripsi_artikel" placeholder="Deskripsi Artikel">
                                            @if (!empty($article['deskripsi_artikel'])) {{ $article['deskripsi_artikel'] }}
                                            @else {{ old('deskripsi_artikel') }}
                                            @endif
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Sumber Artikel <abbr style="color: red">*</abbr></label>
                                        <input type="text" class="form-control" id="exampleInputBorder" name="sumber_artikel" placeholder="Sumber Artikel"
                                            @if (!empty($article['sumber_artikel'])) value="{{ $article['sumber_artikel'] }}"
                                            @else value="{{ old('sumber_artikel') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="featured" id="exampleCheck1" value="Yes"
                                            @if (!empty($article['featured']) && $article['featured'] == "Yes")
                                                checked = ""
                                            @endif
                                        >
                                        <label class="form-check-label" >Trending (Ya / Tidak)</label>
                                    </div>
                                    <small>NB: Jika checkbox (v = centang) menandakan artikel trending</small><br><br>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1" value="1"
                                            @if (!empty($article['status']) && $article['status'] == "1")
                                                checked = ""
                                            @endif
                                        >
                                        <label class="form-check-label" >Status (Aktif / Non Aktif)</label>
                                    </div>
                                    <small>NB: Jika checkbox (v = centang) menandakan artikel aktif (ditampilkan pada halaman customer)</small>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url ('article')}}" class="btn btn-primary">Kembali</a>
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
