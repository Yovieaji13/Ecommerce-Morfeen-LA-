@extends('admin.layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Morfeen Thirteen
                                        <small class="float-right">Invoice # {{ $orders->no_order }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info"><br>
                                <div class="col-sm-6 invoice-col">
                                    <br>
                                    <b>Nama : </b> {{ $orders->user->nama }} <br>
                                    <b>No Hp : </b> {{ $orders->user->no_hp }} <br>
                                    <b>Alamat : </b> {{ $orders->alamat }} <br><br>
                                    <b>Tanggal Transaksi :</b> {{ date('F d, Y ', strtotime($orders->updated_at) )}}<br>
                                    <b>Jam Transaksi : </b>{{ date('H:i', strtotime($orders->updated_at) )}} WIB <br>
                                    <b>Tipe Pembayaran : </b> {{ $orders->payment_type }}
                                </div>
                                <!-- /.col -->
                            </div><br>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Ukuran</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Ongkir</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders->orderDetail as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->barang->nama_barang }}</td>
                                                <td>{{ $order->ukuran }}</td>
                                                <td>{{ $order->qty }} pcs</td>
                                                <td>Rp {{ number_format ($order->total/$order->qty , 0 , '.', '.') }}</td>
                                                <td>Rp {{ number_format ($orders->ongkir->harga, 0 , '.', '.') }} / 1kg</td>
                                                <td>{{ $orders->transaction_status }}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">

                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead"></p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>Rp {{ number_format ($subtotal, 0 , '.', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ongkir {{ $orders->ongkir->provinsi }}:</th>
                                                <td>Rp {{ number_format ($ongkir, 0 , '.', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>Rp {{ number_format ($subtotal + $ongkir, 0 , '.', '.') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <a href="/penjualan" style="color: white">Kembali</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
