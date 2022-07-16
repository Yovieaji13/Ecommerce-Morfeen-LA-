<!DOCTYPE html>
<html lang="en">

<head>
    <title>Penilaian | Morfeen </title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assetcus/css/rating.css') }}">
</head>

<body class="animsition" style="background: black">

    <!-- Header -->
    @include('frontend.halcust.header')

    <!-- Sidebar -->
    @include('frontend.halcust.sidebar')

    <!-- Slide1 -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(images/banner/bgstore.jpg);">
                </div>
            </div>
        </div>
    </section>


    <section class="section-penilaian">
        <div class="container-fluid">
            <div class="col-12s my-auto " style="border: black">
                <p class="text-bold text-uppercase text-center text-white"
                    style="font-size: 20px ; font-family: 'Trebuchet MS'">Penilaian Product</p>
                <div class="card " style="border: black">
                    <div class="card-body " style="background-color: black ; border: black">
                        <div class="row">
                            <table class=" table  ">
                                <thead class="border-color: black">
                                    <tr class="border-color: black">
                                        <th class="text-white">Produk</th>
                                        <th class="text-white">Harga</th>
                                        <th class="text-white">Total Harga </th>
                                        <th class="text-white">Penilaian</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <td>
                                        <div class="blo3 flex-w flex-col-l-sm m-b-30">
                                            <div class="pic-blo3 size20 bo-rad-10  m-r-28">
                                                <img style="width: 130px; height: auto" src="images/katalog/akse2-1.jpg"
                                                    alt="">
                                            </div>

                                            <div class="text-blo3 size21 flex-col-l-m ">
                                                <p class="txt21 m-b-3 text-white">
                                                    Kacamata
                                                </p>

                                                <span class="txt23 text-white">
                                                    Deskripsi
                                                </span>


                                            </div>
                                        </div>
                                    </td>

                                    <td class="text-white ">Rp. 100.000.00</td>
                                    <td class="text-white ">Rp. 100.000.00</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModal">
                                            Rating
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content " style="background-color: transparant">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Rating Product</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="rating-css">
                                                            <div class="star-icon">
                                                                <input type="radio" value="1" name="product_rating"
                                                                    checked id="rating1">
                                                                <label for="rating1" class="fa fa-star"></label>
                                                                <input type="radio" value="2" name="product_rating"
                                                                    id="rating2">
                                                                <label for="rating2" class="fa fa-star"></label>
                                                                <input type="radio" value="3" name="product_rating"
                                                                    id="rating3">
                                                                <label for="rating3" class="fa fa-star"></label>
                                                                <input type="radio" value="4" name="product_rating"
                                                                    id="rating4">
                                                                <label for="rating4" class="fa fa-star"></label>
                                                                <input type="radio" value="5" name="product_rating"
                                                                    id="rating5">
                                                                <label for="rating5" class="fa fa-star"></label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-dismiss="modal">Save</button>
                                                        <button type="button" class="btn btn-dark"
                                                            data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                </tr>

                            </table>
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
