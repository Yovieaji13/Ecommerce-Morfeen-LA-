<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact | Morfeen </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSS Class Content --}}
    @stack('custom-css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assetcus/vendors/daterangepicker/daterangepicker.css') }}">
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


    {{-- ISI HALAMAN CONTAC --}}
    <section class="content ">
        <p class="text-bold text-uppercase text-center text-white p-t-120"
            style="font-size: 20px ; font-family: 'Trebuchet MS'">Contact</p>
        <div class="row">
            <div class="card-body  d-flex align-items-center justify-content-center pl-5 p-t-50"
                style="background: black">
                <div class="col-md-6 p-b-101 text-center">
                    <h2 style="color: white"><strong>MORFEEN OFFICIAL</strong></h2>
                    <small style="color: white">MALANG | SLOROK</small>
                </div>
                <div class="col-md-5 pt-50 pl-5">
                    <h4 class="txt13 m-b-20 ">
                        SOSIAL MEDIA
                    </h4>
                    <ul class="m-b-70">
                        <li class="txt14 m-b-14 " style="color: white">
                            <i class="fa fa-whatsapp fs-16 dis-inline-block size19" aria-hidden="true"></i>
                            (+62) 887-4116-4285
                        </li>

                        <li class="txt14 m-b-14" style="color: white">
                            <i class="fa fa-instagram fs-16 dis-inline-block size19" aria-hidden="true"></i>
                            morfeen_official
                        </li>

                        <li class="txt14 m-b-14" style="color: white">
                            <i class="fa fa-facebook fs-16 dis-inline-block size19 " aria-hidden="true"></i>
                            morfeen_official
                        </li>

                        <li class="txt14 m-b-14" style="color: white">
                            <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
                            morfeen.selfporject@gmail.com
                        </li>
                        <li class="txt14 m-b-14" style="color: white">
                            <i class="fa fa-map-marker fs-13 dis-inline-block size19" aria-hidden="true"></i>
                            Jl. Suwari Sel., Sukun, Kec. Sukun, Kota Malang, Jawa Timur <p class="pl-3 text-white">65147</p>
                        </li>
                        <li class="txt14 m-b-14" style="color: white">
                            <i class="fa fa-map-marker fs-13 dis-inline-block size19" aria-hidden="true"></i>
                            Jl. Kalibiru No.6, Slorok, Kec. Kromengan, Kabupaten Malang, <p class="pl-3 text-white"> Jawa Timur 65165 </p>
                        </li>
                    </ul>
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


    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    @stack('custom-js')
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>

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

</body>

</html>
