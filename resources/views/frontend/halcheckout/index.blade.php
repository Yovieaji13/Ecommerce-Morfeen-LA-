<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout | Morfeen </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/logoa.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/vendors/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/themify/themify-icons.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/vendors/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/vendors/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/vendors/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/vendors/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/vendors/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/vendors/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/vendors/lightbox2/css/lightbox.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/css/main.css') }}">
    <!--===============================================================================================-->

    <link href="{{ asset('assetcus/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('assetcus/css/owl.carousel.min.css') }}">

    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-45xZVksjdlAipn7b"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

</head>

<body class="animation " style="background: black">
    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="wrap-menu-header background bgblack">
            <div class="container h-full">
                <div class="wrap_header trans-0-4">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/">
                            <img  src="{{ asset('images/icons/logo2.png') }}" alt="IMG-LOGO" data-logofixed="{{ asset('images/icons/logoa.png') }}">
                        </a>
                    </div>

                    <!-- Menu -->
                    <div class="wrap_menu p-l-45 p-l-0-xl">
                        <nav class="menu">
                            <ul class="main_menu">
                                <li>
                                    <a href="/">Home</a>
                                </li>

                                <li>
                                    <a href="/product">Product</a>
                                </li>

                                <li>
                                    <a href="/store">Store</a>
                                </li>

                                <li>
                                    <a href="/artikel">Artikel</a>
                                </li>

                                <li>
                                    <a href="/about">About</a>
                                </li>

                                <li>
                                    <a href="/contact">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Social -->
                    <div class="social flex-w flex-l-m p-r-20">
                        <a href="/home"><i class="fa fa-user m-l-21" aria-hidden="true"></i></a>
                        <a href="/cart"><i class="fa fa-shopping-cart m-l-21" aria-hidden="true"></i></a>
                        {{-- <a href="#"><i class="fa fa-heart  m-l-21" aria-hidden="true"></i></a> --}}
                        <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="content">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-5 my-3 p-t-100">
                    <p class="text-bold text-uppercase text-center text-white"
                        style="font-size: 20px ; font-family: 'Trebuchet MS'; "> Form Pengiriman </p>
                    <form id="quickForm" action="{{ url('save-checkout') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label style="color: white" for="exampleInputEmail1"><strong>Ongkos Kirim<abbr style="color: red">*</abbr></strong>
                                    <br>
                                    <small>(Ongkos kirim berdasarkan provinsi, serta mendapatkan diskon & Menggunakan ekspedisi JNE)</small>
                                </label><br>
                                <select class="span2 pull-left form-control" name="provinsi" >
                                    <option value="">Pilih Opsi</option>
                                        @foreach ($ongkir as $item)
                                            <option value="{{ $item->id }}" required>{{ $item->provinsi }} | Ongkir <?= "Rp " . number_format($item->harga,0,',','.')?> / 1 kg</option>
                                        @endforeach
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label style="color: white" for="exampleInputEmail1"><strong>Kota/Kabupaten <abbr style="color: red">*</abbr></strong> <br>
                                    <small>(Isikan sesuai dengan kota/kabupaten tujuan)</small>
                                </label>
                                <input style="background-color: black; color:white" type="text" name="kota"
                                    class="form-control border border-white" id="exampleInputEmail1"
                                    placeholder="Kota" required>
                            </div>
                            <div class="form-group">
                                <label style="color: white" for="exampleInputPassword1"><strong>Alamat <abbr style="color: red">*</abbr></strong> <br>
                                    <small></small>
                                </label>
                                <input style="background-color: black; color:white" type="text" name="alamat"
                                    class="form-control border border-white" id="exampleInputPassword1"
                                    placeholder="Alamat" value="{{ Auth::user()->alamat }}" required>
                            </div>
                            <div class="form-group">
                                <label style="color: white" for="inputMessage"><strong>Keterangan </strong> <br>
                                    <small>(Isikan RT, RW & Kode Pos tujuan, Lalu jika ada informasi tambahan)</small>
                                </label>
                                <textarea style="background-color: black; color:white" id="inputMessage" name="keterangan"
                                class="form-control border border-white" rows="4"
                                    placeholder="Keterangan" ></textarea><br>
                                    <small style="color: white"><abbr style="color: red">*</abbr><strong> NB: <br> Sebelum checkout dimohon untuk memeriksa kembali data pengiriman dan transaksi
                                        karena apabila sudah checkout tidak bisa dibatalkan atau data akan hilang</strong></small>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">
                                    <a href="save-checkout" id="pay-button"></a>
                                            Checkout
                                </button>
                                <button class="btn btn-info">
                                    <a href="cart" style="color: white">Kembali</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-7 my-3 p-t-100" style="border: black">
                    <p class="text-bold text-uppercase text-center text-white"
                        style="font-size: 20px ; font-family: 'Trebuchet MS'">Detail Pesanan</p>
                    <div class="card " style="border: black">
                        <div class="card-body " style="background-color: black ; border: black">
                            <div class="row">
                                <table class="table table-responsive pt-4">
                                    <thead class="border-color: black">
                                        <tr class="border-color: black">
                                            <th class="text-white">Gambar</th>
                                            <th class="text-white">Nama</th>
                                            <th class="text-white ">Harga</th>
                                            <th class="text-white ">Berat</th>
                                            <th class="text-white ">Ukuran</th>
                                            <th class="text-white ">Berat</th>
                                            <th class="text-white ">Qty</th>
                                            <th class="text-white ">Sub Total</th>
                                        </tr>
                                    </thead>

                                    @foreach ($cart as $item)
                                        <tr style="color: white; text-align:center; font-size: 13px">
                                            <td>
                                                <img src="{{ asset('images/disply/' . $item->barang->gambar_disply) }}"
                                                    height="90px">
                                            </td>
                                            <td>{{ $item->barang->nama_barang }}</td>
                                            <td>{{ $item->barang->berat }}</td>
                                            <td> <?= 'Rp ' . number_format($item->barang->harga, 0, ',', '.') ?> </td>
                                            <td>{{ $item->atribut->ukuran }}</td>
                                            <td>{{ $item->barang->berat * $item->qty }} / {{ $item->qty }}kg</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>
                                                <?= 'Rp ' . number_format($item->barang->harga * $item->qty, 0, ',', '.') ?>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <td class="text-white text-center" style="width: 10px; height: auto"><strong>Sub Total :</strong></td>
                                    <td class="text-white ">
                                        <h5 style="color: white">
                                            <strong><?= 'Rp ' . number_format($grand_total, 0, ',', '.') ?></strong>
                                        </h5>
                                    </td>
                                    <div class=""></div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.halcust.footer')

    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        </span>
    </div>

    <!-- Container Selection1 -->
    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('assetcus/vendors/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('assetcus/vendors/bootstrap/js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assetcus/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('assetcus/vendors/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('assetcus/vendors/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assetcus/vendors/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('assetcus/vendors/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assetcus/js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('assetcus/vendors/parallax100/parallax100.js') }}"></script>
    <script type="text/javascript">
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('assetcus/vendors/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="{{ asset('assetcus/vendors/lightbox2/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assetcus/js/main.js') }}"></script>
    <!--===============================================================================================-->

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    @stack('custom-js')
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>


</body>

</html>
