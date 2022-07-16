<!DOCTYPE html>
<html lang="en">

<head>
    <title>Whislist | Morfeen </title>
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

<body class="animsition" style="background: black">

    <!-- Header -->
    @include('frontend.halcust.header')

    <!-- Sidebar -->
    @include('frontend.halcust.sidebar')

    <!-- Slide1 -->
    {{-- <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(images/banner/bgstore.jpg);">
                </div>
            </div>
        </div>
    </section> --}}

    <br>

    <section class="animation">
        <div class=" p-t-100 ">
            <p class="text-bold text-uppercase text-center text-white"
                style="font-size: 20px ; font-family: 'Trebuchet MS'">whislist</p>
            <div class="row">
                <div class="col-md-3 pl-5 p-t-50 p-b-100 card-dark">
                    <div class="row">
                        <div class="card">
                            <ul>
                                <li>
                                    <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                                        <a href="detail">
                                            <img src="images/katalog/akse1-1.jpg" class="img-fluid img-thumbnail"
                                                alt="" style="border: transparent" />
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <div class="card-body ">
                                <div class="t-center">
                                    <h1 class="card-title" style="font-size: 20px; font-weight:bold">
                                        Kacamata
                                    </h1>
                                    <p>Rp 100.000.00</p>
                                    </a>
                                </div>
                                <p class="t-right m-0 " style="font-size: 10px;">Terjual 0 </p>


                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 pl-5 p-t-50 p-b-100 card-dark">
                    <div class="row">
                        <div class="card">
                            <ul>
                                <li>
                                    <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                                        <a href="detail">
                                            <img src="images/katalog/akse1-1.jpg" class="img-fluid img-thumbnail"
                                                alt="" style="border: transparent" />
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <div class="card-body ">
                                <div class="t-center">
                                    <h1 class="card-title" style="font-size: 20px; font-weight:bold">
                                        Kacamata
                                    </h1>
                                    <p>Rp 100.000.00</p>
                                    </a>
                                </div>
                                <p class="t-right m-0 " style="font-size: 10px;">Terjual 0 </p>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    {{-- <div class="container-fluid">
        <div class="col-12s my-auto " style="border: black">
            <p class="text-bold text-uppercase text-center text-white"
                style="font-size: 20px ; font-family: 'Trebuchet MS'">whislist</p>
            <div class="card " style="border: black">
                <div class="card-body " style="background-color: black ; border: black">
                    <div class="row">
                        <table class=" table  ">
                            <thead class="border-color: black">
                                <tr class="border-color: black">
                                    <th class="text-white">Produk</th>
                                    <th class="text-white">Nama Produk </th>
                                    <th class="text-white">Harga</th>
                                    <th class="text-white">Qty</th>
                                    <th class="text-white" colspan="2"></th>
                                </tr>
                            </thead>

                            <tr>
                                <td class="text-white text-left"><img style="width: 75px; height: auto"
                                        src="images/katalog/akse1-1.jpg" alt=""></td>
                                <td class="text-white text-center" style="width: 300px">Sandal </td>
                                <td class="text-white ">Rp. 100.000.00</td>
                                <td>
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus button is-form"> <label
                                            class="screen-reader-text" for="quantity"></label>
                                        <input type="number" id="quantity" class="input-text qty text"
                                            step="1" min="1" max="2" name="quantity" value="1" title="Qty" size="4"
                                            placeholder="" inputmode="numeric" />
                                        <input type="button" value="+" class="plus button is-form text-black">
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-danger mb-2">
                                        Hapus
                                    </button>

                                    <button type="submit" class="btn btn-sm btn-primary mb-2">
                                        Add
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-white "><img style="width: 75px; height: auto"
                                        src="images/katalog/akse2-1.jpg" alt=""></td>
                                <td class="text-white text-center" style="width: 300px">Kacamata</td>
                                <td class="text-white ">Rp. 100.000.00</td>
                                <td class="text-white"> 1 </td>
                                <td><button type="submit" class="btn btn-sm btn-danger mb-2">
                                        Hapus
                                    </button>
                                    <button type="submit" class="btn btn-sm btn-primary mb-2">
                                        Add
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

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
    <script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
    @stack('custom-js')
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('') }}assets/dist/js/demo.js"></script>

</body>

</html>
