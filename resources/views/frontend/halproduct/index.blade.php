<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product | Morfeen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!--===============================================================================================-->
    <link href="{{ asset('assetcus/css/owl.theme.default.min.css') }}">

    <link href="{{ asset('assetcus/css/owl.carousel.min.css') }}">
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

    <!-- Sidebar -->
    @include('frontend.halcust.sidebar')


    <!-- Sidebar kategori -->
    <section class="slider-section  pb-4">
        <h1 class="text-bold text-uppercase text-center text-black p-t-120"
            style="font-size: 20px ; font-family: 'Trebuchet MS'"></h1>

        <div class="container">
            <div class="slider-inner">
                <div class="row">
                    <div class="col-md-3 pt-5">
                        <nav class="nav-category">
                            <form action="" name="sortProducts" id="sortProducts" class="form-horizontal span6">
                                <div class="control-group">
                                    <label for="exampleFormControlSelect2">Cari berdasarkan</label>
                                    <select id="sort" name="sort">
                                        <option value="">Pilih</option>
                                        <option value="product_a_z" @if(isset($_GET['sort']) && $_GET['sort'] == "product_a_z") selected="" @endif>Nama product dari A - Z</option>
                                        <option value="product_z_a" @if(isset($_GET['sort']) && $_GET['sort'] == "product_z_a") selected="" @endif>Nama product dari Z - A</option>
                                        <option value="product_rendah" @if(isset($_GET['sort']) && $_GET['sort'] == "product_rendah") selected="" @endif>Harga terendah</option>
                                        <option value="product_tinggi" @if(isset($_GET['sort']) && $_GET['sort'] == "product_tinggi") selected="" @endif>Harga tertinggi</option>
                                    </select>
                                </div>
                            </form><br>
                            <h3 style="font-size: 30px ; font-family: 'Trebuchet MS'"><strong>Kategori</strong> </h3>
                            <ul  class="menu-category mt-3 navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                                @foreach ($category as $key => $value)
                                    <li>
                                        <a href="{{ url('product/'. $value->slug) }}"> {{ $value->nama_kategori }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    {{-- Product Card --}}
                    <div class="col-md-9 mb-8 pt-5">
                        <div class="row">
                            @foreach ($barang as $items)
                                <div class="col-md-3 pb-2 pr-4">
                                    <div class="row">
                                        <div class="card">
                                            <ul>
                                                <li>
                                                    @if ($items->trending == "Yes")
                                                        {{-- <label class="float-end badge btn-danger trending_tag" style="font-size: 16px">Popular</label> --}}
                                                        <div class="p-1 mb-1 bg-danger text-white" style="text-align: center">Popular Produk</div>
                                                    @else
                                                        {{-- <label class="float-end badge btn-dark trending_tag" style="font-size: 16px">Product Morfeen</label> --}}
                                                        <div class="p-1 mb-1 bg-success text-white" style="text-align: center">{{ $items->category->nama_kategori }}</div>
                                                    @endif
                                                    <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                                                        <a href="{{ url('product/detail-product/'.$items->id) }}">
                                                            <img src="{{ asset('images/disply/' . $items->gambar_disply) }}"
                                                                class="img-fluid img-thumbnail"
                                                                alt="{{ $items->nama_barang }}"
                                                                style="border: transparent" />
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="card-body ">
                                                <div class="t-center">
                                                    <a href="{{ url('product/detail-product/'.$items->id) }}">
                                                        <h1 class="card-title"
                                                            style="font-size: 20px; font-weight:bold">
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
                        @if(isset($_GET['sort']) && !empty($_GET['sort']))
                            {{ $barang->appends(['sort' => $_GET['sort']])->links()}}
                        @else
                            {{ $barang->links() }}
                        @endif
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
    <script type="text/javascript" src="{{ asset('assetcus/js/frontend.js') }}"></script>
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
    <script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
    @stack('custom-js')
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('') }}assets/dist/js/demo.js"></script>

    <script src="{{ asset('assetcus/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetcus/js/jquery-3.6.0.min.js') }}"></script>

    @section('script')
        <script>
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        </script>
    @endsection
</body>

</html>
