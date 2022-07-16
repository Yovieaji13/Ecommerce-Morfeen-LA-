<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi | Morfeen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/logoa.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetlog/vendor/bootstrap/css/bootstrap.min.css') }}">
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
            <div class="wrap-login100 ">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">

                    @csrf
                    <span class="login100-form-title p-b-43" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        REGISTRASI AKUN
                    </span>
                    {{-- NAMA --}}
                    <div class="wrap-input100 validate-input">
                        <label for="exampleInputBorder">Nama Lengkap<abbr style="color: red">*</abbr></label>
                        <input id="nama" placeholder="Nama Lengkap" type="text"
                            class="input100   @error('nama') is-invalid @enderror" name="nama"
                            value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- ALAMAT --}}
                    <div class="wrap-input100 validate-input">
                        <label > Alamat<abbr style="color: red">*</abbr></label>
                        <input id="alamat" placeholder="Alamat" type="text"
                            class="input100 @error('alamat') is-invalid @enderror" name="alamat"
                            value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- NOHP --}}
                    <div class="wrap-input100 validate-input">
                        <label > No Hp <abbr style="color: red">*</abbr></label>
                        <input id="no_hp" placeholder="No Hp" type="number"
                            class="input100 @error('no_hp') is-invalid @enderror" name="no_hp"
                            value="{{ old('no_hp') }}" required autocomplete="no_hp" autofocus>

                        @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- email --}}
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <label > Email <abbr style="color: red">*</abbr></label>
                        <input id="email" placeholder="Email" type="email"
                            class="input100 @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- password --}}
                    <div class="wrap-input100 validate-input"  data-validate="Password is required">
                        <label > Password <abbr style="color: red">*</abbr></label>
                        <input id="password" placeholder="Password" type="password" class="input100 @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="password-confirm">
                        <label >Konfirmasi Password <abbr style="color: red">*</abbr></label>
                        <input id="password-confirm"  placeholder="Konfirmasi Password" type="password" name="password_confirmation" class="input100 @error('password') is-invalid @enderror"
                        required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <div class="container-login100-form-btn mt-3">
                        <button class="login100-form-btn" type="submit">
                            Regristasi
                        </button>
                    </div>

                    <div class="container-login100-form-btn">
                        <a href="{{ url('/login') }}" class="login100-form-btn"
                            style="background: transparent; border:transparent; color:black">Kembali ke Login</a>
                    </div>
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
