<!DOCTYPE html>
<html lang="en">

<head>
    <title>Store | Morfeen </title>
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


    <section>
        <p class="text-bold text-uppercase text-center text-white p-t-120"
            style="font-size: 20px ; font-family: 'Trebuchet MS'"><strong>Store</strong></p>
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-md-6 mb-5 m-2  p-t-50 pb-5">
                        <div class="card" style="background-color: black">
                            <ul class="list-inline social-media">
                                <li class="list-inline item">
                                    <a
                                        href="https://www.google.co.id/maps/place/Morfeen+Store/@-7.9916414,112.6157063,17z/data=!3m1!4b1!4m5!3m4!1s0x2e7882a7c716fad5:0x1552d59781a64992!8m2!3d-7.9916803!4d112.6178358">
                                        <img src="images/slide-1.jpeg" class="card-img-top" alt="...">
                                    </a>
                                </li>
                            </ul>
                            <div class="m-3">
                                <h4 class="text-center text-uppercase text-white" style="font-weight: bold"> Morfeen
                                    Store Sukun</h4>
                                <p class="m-1 text-center text-white"> Jl. Suwari Selatan No. 07 , Sukun, Kec. Sukun, Kota
                                    Malang<br />
                                    Setiap Hari 12.00 - 21.30 WIB<br />
                                    (+62) 887-4116-4285</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-5 m-2  p-t-50 pb-5">
                        <div class="card" style="background-color: black">
                            <ul class="list-inline social-media">
                                <li class="list-inline item">
                                    <a
                                        href="https://www.google.com/maps/place/Morfeen+2nd+Store,+Slorok/@-8.1425777,112.5211889,17z/data=!3m1!4b1!4m5!3m4!1s0x2e789f32d601ed31:0x27f74ee587bd47b2!8m2!3d-8.1425919!4d112.523373?shorturl=1">
                                        <img src="images/slorok.jpeg" class="card-img-top" alt="...">
                                    </a>
                                </li>
                            </ul>
                            <div class="m-3">
                                <h4 class="text-center text-uppercase text-white" style="font-weight: bold">Morfeen
                                    Store Slorok </h4>
                                <p class="m-1 text-center text-white "> Jl. Kalibiru No.6, Slorok, Kec. Kromengan,
                                    Kabupaten Malang<br />
                                    Setiap Hari 12.00 - 21.30 WIB<br />
                                    (+62) 887-4116-4285</p>
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
    <script src="{{ asset('') }}assets/plugins/jquery/jquery.min.js"></script>
    @stack('custom-js')
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('') }}assets/dist/js/demo.js"></script>

</body>

</html>
