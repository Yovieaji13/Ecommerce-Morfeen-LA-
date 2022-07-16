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
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                style="margin-top: 10px;">{{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Produk</h3>
                                <a class="btn btn-block btn-success" href="{{ url('/add-edit-product') }}"
                                    style="max-width: 150px; float:right; disply:inline-block">
                                    <i>Tambah Produk</i>
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="product" class="table table-bordered table-responsive">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>No.</th>
                                            <th>Gambar </th>
                                            <th>Kategori </th>
                                            <th>Kode </th>
                                            <th>Nama </th>
                                            <th>Slug </th>
                                            <th>Harga </th>
                                            <th>Deskripsi </th>
                                            <th>Status </th>
                                            <th>Trending</th>
                                            <th colspan="4">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $key => $value)
                                            <tr>
                                                <td style="text-align: center">{{ $barang->firstItem() + $key }}</td>
                                                <td><img src="{{ asset('images/disply/' . $value->gambar_disply) }}"
                                                    alt="{{ $value->nama_barang }}" width=150px height=auto />
                                                </td>
                                                <td>{{ $value->category->nama_kategori }}</td>
                                                <td>{{ $value->kode_barang }}</td>
                                                <td>{{ $value->nama_barang }}</td>
                                                <td>{{ $value->slug }}</td>
                                                <td><?= "Rp " . number_format($value->harga,0,',','.')?></td>
                                                <td>{{ Str::limit($value->deskripsi, '50', ' . . . . . . . ') }}</td>
                                                <td>
                                                    @if($value->status == 1)
                                                        <div class="p-1 mb-1 bg-success text-white" style="text-align: center">Aktif</div>
                                                    @else
                                                        <div class="p-1 mb-1 bg-danger text-white" style="text-align: center">Non Aktif</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($value->trending == "Yes")
                                                        <div class="p-1 mb-1 bg-success text-white" style="text-align: center">Iya</div>
                                                    @else
                                                        <div class="p-1 mb-1 bg-danger text-white" style="text-align: center">Tidak</div>
                                                    @endif
                                                </td>
                                                <td style="text-align: center"><a title="Edit Produk"
                                                        href="{{ url('add-edit-product/' . $value->slug) }}"><i
                                                            class='fas fa-edit'></i></a></td>
                                                </td>
                                                <td style="text-align: center"><a title="Tambah Stok"
                                                    href="{{ url('add-atribut/' . $value->id) }}"><i
                                                        class='fas fa-plus'></i></a></td>
                                                <td style="text-align: center"><a title="Tambah Gambar"
                                                    href="{{ url('add-image/' . $value->id) }}"><i
                                                        class='fas fa-plus-circle'></i></a></td>
                                            </td>
                                                <td style="text-align: center"> <a class="confirmDelete" name="produk" title="Hapus Produk"
                                                        href="{{ url('delete-product/' . $value->id) }}"><i
                                                            class='fas fa-trash-alt'></i></a></td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="fa-pull-left pt-2">
                                    Tampilkan data no
                                    {{ $barang->firstItem() }}
                                    sampai no
                                    {{ $barang->lastItem() }}
                                    dari
                                    {{ $barang->total() }} data
                                </div>
                                <div class="fa-pull-right pt-2">
                                    {{ $barang->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
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
