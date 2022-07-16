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
                            <li class="breadcrumb-item active">Penjualan</li>
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
                                <h3 class="card-title">Penjualan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h5><strong>Modal : </strong> <?= 'Rp ' . number_format($modal, 0, ',', '.') ?></h5>
                                <h5><strong>Total Pemasukkan : </strong> <?= 'Rp ' . number_format($penjualan, 0, ',', '.') ?></h5>
                                <h5><strong>Total Profit : </strong> <?= 'Rp ' . number_format($penjualan - $modal, 0, ',', '.') ?></h5><br>
                                <table id="category" class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Order</th>
                                            <th>Total</th>
                                            <th>Ongkir</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $key=>$value)
                                            <tr>
                                                <td style="text-align: center">{{ $order->firstItem() + $key }}</td>
                                                <td>{{ $value->user->nama }}</td>
                                                <td><a href="laba/{{$value->id}}"> {{ $value->no_order }}</a></td>
                                                <td><?= 'Rp ' . number_format($value->total, 0, ',', '.') ?></td>
                                                <td><?= 'Rp ' . number_format($value->harga, 0, ',', '.') ?> / kg</td>
                                                <td>{{ $value->transaction_status }}</td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="fa-pull-left pt-2">
                                    Tampilkan data no
                                    {{ $order->firstItem() }}
                                    sampai no
                                    {{ $order->lastItem() }}
                                    dari
                                    {{ $order->total() }} data
                                </div>
                                <div class="fa-pull-right pt-2">
                                    {{ $order->links() }}
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
