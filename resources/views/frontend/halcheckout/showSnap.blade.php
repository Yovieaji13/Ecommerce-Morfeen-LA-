<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment | Morfeen </title>
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
        <div class="d-flex justify-content-center ">
            <div class="row">
                <div class="col-md-12 my-3 p-t-100">
                    <p class="text-bold text-uppercase text-center text-white"
                        style="font-size: 20px ; font-family: 'Trebuchet MS'; "> Checkout </p>
                    <form id="quickForm" action="{{ url('payment') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label style="color: white" for="exampleInputEmail1">Total Transaksi</label>
                                <input style="background-color: black; color:white" type="text"
                                    class="form-control border border-white" id="exampleInputEmail1"
                                    placeholder="Total" value="<?= 'Rp ' . number_format($order->total, 0, ',', '.') ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label style="color: white" for="exampleInputPassword1">Total Ongkir {{$provinsi}}</label>
                                <input style="background-color: black; color:white" type="text" value="<?= 'Rp ' . number_format($ongkir, 0, ',', '.') ?>" disabled
                                    class="form-control border border-white" id="exampleInputPassword1"
                                    placeholder="Ongkir">
                            </div>
                            <div class="form-group">

                            </div>
                        </div>
                    </form>
                    <small style="color: white"><abbr style="color: red">*</abbr><strong> NB: <br> Langkah selanjutnya klik checkout untuk proses pembayaran</strong></small><br>
                    <button class="btn btn-primary" id="pay-button">
                        <a id="pay-button" style="color: white">Checkout</a>
                    </button>
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
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          // window.snap.pay("{{$token}}");
          // customer will be redirected after completing payment pop-up
          window.snap.pay("{{$token}}", {
            onSuccess: function(result){
              /* You may add your own implementation here */
              alert("Pembayaran Sukses!"); console.log(result);
              $.ajax({
                url: "/confirmPayment",
                type:"POST",
                data:{
                    result
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                    $('.success').text(response.success);
                    $("#ajaxform")[0].reset();
                    }
                },
                error: function(error) {
                console.log(error);
                    $('#nameError').text(response.responseJSON.errors.ukuran);
                    $('#emailError').text(response.responseJSON.errors.qty);
                    $('#mobileError').text(response.responseJSON.errors.payment_type);
                    $('#messageError').text(response.responseJSON.errors.transaction_status);
                }
                });

            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("Menunggu Pembayaran Anda!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("Pembayaran Gagal!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('Anda menutup popup tanpa menyelesaikan sebelum membayar!');
            }
          })
        });
      </script>

</body>

</html>
