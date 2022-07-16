<!DOCTYPE html>
<html lang="en">

<head>
    <title>Morfeen Thirteen</title>
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

    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/css/owl.theme.default.min.css') }}">
    <!--===============================================================================================-->

    {{-- css keranjang --}}
    <link href="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.0/css/bootstrap-combined.min.css" rel="stylesheet">

    <link href="{{ asset('assetcus/cs/style.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="animsition">

    <!-- Header -->
    @include('frontend.halcust.header')

    <!-- Sidebar -->
    @include('frontend.halcust.sidebar')

    <!-- Banner & Story -->
    @include('frontend.halcust.banner')

    <!-- Event -->
    @include('frontend.halcust.event')

    <!-- Produk Disply -->
    @include('frontend.halcust.produk')

    <!-- Video & Artikel -->
    @include('frontend.halcust.video')

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

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
                <div class="video-mo-01">
                    <iframe src="https://www.youtube.com/embed/suxwY9BhxaA?start=1" title="YouTube video player"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>

        {{-- js keranjang --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.0/js/bootstrap.min.js"></script>

        <script src="{{ asset('assetcus/js/cart.js') }}"></script>

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

        <script src="{{ asset('assetcus/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assetcus/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assetcus/js/jquery-3.6.0.min.js') }}"></script>
        <script>
            $('.trending-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });
        </script>

</body>

</html>
