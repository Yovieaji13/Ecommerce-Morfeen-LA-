<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Morfeen</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="{{ asset('images/icons/logoa.png') }}" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href= "{{ asset('assetlog/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assetlog/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assetlog/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assetlog/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assetlog/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assetlog/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assetlog/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetlog/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="{{ route('login') }}" method="POST">
                    @csrf

                    <span class="login100-form-title p-b-43" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        LOGIN
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <label for="email" > Email  <abbr style="color: red">*</abbr></label>
                        <input class="input100" type="email" name="email" placeholder="Email" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $customMessage }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">

                        <label for="password">Password <abbr style="color: red">*</abbr></label>
                        <input class="input100" type="password" name="password" placeholder="Password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $customMessage }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">

                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="container-login100-form-btn">
                        <a href="{{ url ('/')}}" class="login100-form-btn" style="background: transparent; border:transparent; color:black">Kembali Ke Halaman Utama</a>
                    </div>
                    <small class="d-block text-center mt-3">Belum Registrasi?
                        <a href="/register">Registrasi Sekarang!</a>
                    </small>
                </form>
                <div class="login100-more" style="background-image: url('images/bg2.jpg');">
                </div>
            </div>
        </div>
	</div>

<!--===============================================================================================-->
	<script src="{{ asset('assetlog/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetlog/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetlog/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assetlog/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetlog/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetlog/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('assetlog/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetlog/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('assetlog/js/main.js') }}"></script>

</body>
</html>
