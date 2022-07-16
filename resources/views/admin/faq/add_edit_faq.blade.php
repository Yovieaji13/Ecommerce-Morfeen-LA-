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
                            <li class="breadcrumb-item active">Faq</li>
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
                                @if(empty($faq['id'])) action="{{ url('add-edit-faq') }}"
                                @else action="{{ url('add-edit-faq/' . $faq['id']) }}"
                                @endif
                            method="POST" enctype="multipart/form-data"> @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputBorder"> Pertanyaan  <abbr style="color: red">*</abbr></label>
                                        <input type="text" class="form-control" id="exampleInputBorder" name="pertanyaan" placeholder="Pertanyaan"
                                            @if (!empty($faq['pertanyaan'])) value="{{ $faq['pertanyaan'] }}"
                                            @else value="{{ old('pertanyaan') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Jawaban <abbr style="color: red">*</abbr></label>
                                        <input type="text" class="form-control" id="exampleInputBorder" name="jawaban" placeholder=" Jawaban"
                                            @if (!empty($faq['jawaban'])) value="{{ $faq['jawaban'] }}"
                                            @else value="{{ old('jawaban') }}"
                                            @endif
                                        >
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1" value="1"
                                            @if (!empty($faq['status']) && $faq['status'] == "1")
                                                checked = ""
                                            @endif
                                        >
                                        <label class="form-check-label" >Status (Aktif / Non Aktif)</label>
                                    </div>
                                    <small>NB: Jika checkbox (v = centang) menandakan data faqs aktif (ditampilkan pada halaman customer)</small>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url ('faq')}}" class="btn btn-primary">Kembali</a>
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
