<!DOCTYPE html>
<html lang="en">

<head>
    <title>Artikel | Morfeen</title>
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

    <!-- ARTIKEL -->
    <section>
        <h1 class="text-bold text-uppercase text-center  p-t-100 "
            style="font-size: 20px ; font-family: 'Trebuchet MS'"></h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="sidebar2 p-t-20 p-b-20 p-l-20 p-l-0-md p-t-0-md">
                        <div class="categories">
                            <h4 class="txt33 bo5-b p-b-35 p-t-30">
                                Kategori Artikel
                            </h4>
                            @foreach ($catarticle2 as $item => $value)
                                <ul>
                                    <li
                                        class="{{ request()->is('artikel/' . $value->slug) ? 'active' : '' }} nav-item bo5-b p-t-4 p-b-4">
                                        <a style="font-weight: {{ request()->is('artikel/' . $value->slug) ? '900' : '' }}"
                                            href="{{ url('artikel/' . $value->slug) }}">
                                            {{ $value->nama_cat }}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                        <div class="fa-pull-right p-t-10">
                            {{ $catarticle2->links() }}
                        </div>
                    </div>
                </div>

                @foreach ($article as $items)
                    <div class="col-md-4 p-t-30">
                        <div class="blo1" style="border-bottom: 2px solid black">
                            <ul>
                                <li>
                                    <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                                        <img src="{{ asset('images/artikel/' . $items->gambar_artikel) }}"
                                            class="img-fluid" alt="{{ $items->judul }}" />
                                    </div>
                                </li>
                            </ul>
                            <div class="wrap-text-blo1 p-t-35">
                                <h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    {{ $items->judul_artikel }}
                                </h4>
                                <p class="m-b-20">
                                    {{ Str::limit($items->deskripsi_artikel, '80', ' . . . . . . . ') }}
                                </p>
                                <a href="{{ url('artikel/detail-artikel/' . $items->id) }}" class="txt4">
                                    Lanjutkan Membaca
                                    <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="fa-pull-right p-t-10">
                {{ $article->links() }}
            </div>
            <br>
        </div>
    </section>

    <br><br>
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
    <script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
    @stack('custom-js')
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('') }}assets/dist/js/demo.js"></script>

</body>

</html>
