<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Artikel | Morfeen </title>
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

    {{-- Detail Artikel  --}}
    <section>
        <h1 class="text-bold text-uppercase text-center  p-t-120 " style="font-size: 20px ; font-family: 'Trebuchet MS'"></h1>
        <div class="bread-crumb bo5-b p-t-17 p-b-17">
			<div class="container">
				<span class="txt29 m-l-10 m-r-10"></span>
                <a href="/artikel" class="txt27">
					Artikel
				</a>
                <span class="txt29 m-l-10 m-r-10">/</span>
				<span class="txt29">
					Detail Artikel {{ $article['catarticle']['nama_cat'] }} {{ $article['judul_artikel'] }}
				</span>
			</div>
		</div>

		<div class="container">
			<div class="row ">
				<div class="col-md-8 col-lg-9">
					<div class="p-t-30 p-b-20 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
						<!-- Block4 -->
						<div class="blo4 p-b-63">
							<div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                                    <img src="{{ asset('images/artikel/'. $article['gambar_artikel']) }}">
							</div>
							<div class=" p-t-33">
								<h4 class="p-b-16 tit9">
                                    {{ $article['judul_artikel'] }}
								</h4>
								<div class="txt32 flex-w p-b-24">
									<span>
                                        Tanggal publikasi : {{ date('F d, Y ', strtotime($article['created_at']) )}} | {{ date('H:i', strtotime($article['created_at']) )}} WIB
									</span>
								</div>
								<p>
                                    {{ $article['deskripsi_artikel']}}
								</p>
							</div>
                            <div class="txt32 flex-w pt-4">
                                <span>
                                    <strong>Sumber Artikel :</strong> {{ $article['sumber_artikel']}}
                                </span>
                                <span>
                            </div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3">
					<div class="sidebar2 p-b-80 p-l-20 p-l-0-md p-t-0-md">
						<!-- Most Popular -->
						<div class="popular">
							<h4 class="txt33 p-b-35 p-t-58">
								Seputar Artikel
							</h4>
                            @foreach ($article2 as $item)
                                <ul>
                                    <li class="flex-w m-b-25">
                                        <div class="size16 bo-rad-10 wrap-pic-w of-hidden m-r-18">
                                            <a href="#">
                                                <img src="{{ asset('images/artikel/'. $item['gambar_artikel']) }}" alt="IMG-BLOG">
                                            </a>
                                        </div>
                                        <div class="size28">
                                            <a href="{{ url('artikel/detail-artikel/'.$item->id) }} " class="dis-block txt28 m-b-8">
                                                {{ $item['judul_artikel'] }}
                                            </a>
                                    </li>
                                </ul>
                            @endforeach
						</div>
                        {{ $article2->links() }}
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
