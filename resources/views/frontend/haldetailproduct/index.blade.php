<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail | Morfeen </title>
    <meta charset="utf-8" />
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

    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/css/rating.css') }}">
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

    <!-- css keranjang -->
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.0/css/bootstrap-combined.min.css" rel="stylesheet">
    {{-- <link href="{{ asset('assetcus/cs/style.css') }}" rel="stylesheet" type="text/css" /> --}}
</head>

<body class="animsition">

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

    @include('frontend.halcust.sidebar')

    <section class="content">
        <h1 class="text-bold text-uppercase text-center text-black p-t-100"
            style="font-size: 20px ; font-family: 'Trebuchet MS'"></h1>
        <div class="d-flex justify-content-center">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 pt-3 pl-5 pb-3">
                            @if ($barang['trending'] == "Yes")
                                <label class="float-end badge btn-danger trending_tag" style="font-size: 12px">Popular</label>
                            @endif

                            <h3 class="my-2">{{ $barang['category']['nama_kategori'] }} - {{ $barang['nama_barang'] }}</h3>
                            <p>{{ $barang['deskripsi'] }}</p>
                            <h2 class="my-2" style="color: rgb(235, 39, 39)"><?= "Rp " . number_format($barang['harga'],0,',','.')?></h2>

                            <form action="{{ url('/add-to-cart') }}" method="post" class="form-horizontal qtyFrom">
                                @csrf
                                <input type="hidden" class="barang_id" name="barang_id" value="{{ $barang['id'] }}">
                                <input type="hidden" name="harga" value="{{ $barang['harga'] }}">
                                <h5 class="mt-2">Ukuran</h5>
                                <div class="form-group">
                                    <select class="span2 pull-left"  name="ukuran" required>
                                        <option value="">Pilih Opsi</option>
                                            @foreach ($barang['atribut'] as $item)
                                                @if($item['stock'] > 0)
                                                    <option value="{{ $item['ukuran'] }}">{{ $item['ukuran'] }} <small>(tersedia {{ $item['stock'] }} pcs)</small> </option>
                                                @elseif($item['stock'] == 0)
                                                    <option value="{{ $item['ukuran'] }}" disabled>{{ $item['ukuran'] }} (Stok Kosong)</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <h5>Jumlah</h5>
                                <div class="mt-2 ">
                                    <div class="">
                                        <div class="input-group text-center mb-4 " style="width: 130px;">
                                            <input type="text" name="qty" class="form-control qty-input text-center" value="1" required>                                        </div><br>
                                        <button type="submit" class="btn btn-success">
                                            <a><i class="fa fa-shopping-cart"></i></a>
                                            Tambah Ke Keranjang
                                        </button>
                                        {{-- <button type="button" class="btn btn-close-white">
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            Tambah Disuka
                                        </button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>

                        {{-- GAMBAR --}}
                        <div class="col-6 pt-30 pl-5">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                    </li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="4" class="active"></li>
                                </ol>
                                <div class="carousel-inner active">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset('images/disply/'. $barang['gambar_disply']) }}" alt="First slide">
                                        </div>
                                    @foreach ($barang['image'] as $item)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('images/katalog/' . $item['url_gambar']) }}" alt="First slide">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev carousel-dark" href="#carouselExampleIndicators" role="button "
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next carousel-dark" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                    href="#product-desc" role="tab" aria-controls="product-desc"
                                    aria-selected="true" style="font-weight: bold">Popular Produk</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="col-12 mb-8 t-center" style="background-color: white">
                                <div class="row">
                                    @foreach ($trendingItems as $items)
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="card" style="border: transparent">
                                                    <ul class="">
                                                        <li>
                                                            <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                                                                <a href="{{ url('product/detail-product/'.$items->id) }}">
                                                                    <img src="{{ asset('images/disply/' . $items->gambar_disply) }}"
                                                                        class="img-fluid img-thumbnail" alt="{{ $items->nama_barang }}"
                                                                        style="border: transparent" />
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-md-center">
                                                            <a href="{{ url('product/detail-product/'.$items->id) }}">
                                                                <h1 class="card-title"
                                                                    style="font-size: 20px; font-weight:bold; color:black">
                                                                    {{ $items->nama_barang }}
                                                                </h1>
                                                                <p class=""><?= "Rp " . number_format($items->harga,0,',','.')?></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
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

    <!--  js keranjang  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('assetcus/js/cart.js') }}"></script>
    <script src="{{ asset('assetcus/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetcus/js/jquery-3.6.0.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();

                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNan(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $('.qty-input').val(value);
                }
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();

                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value, 10);
                value = isNan(value) ? 0 : value;
                if (value > 10) {
                    value--;
                    $('.qty-input').val(value);
                }
            });

        });
    </script>

    <script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('') }}assets/dist/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>

</body>

</html>
