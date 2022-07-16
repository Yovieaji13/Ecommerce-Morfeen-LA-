<!DOCTYPE html>
<html lang="en">

<head>
    <title>Keranjang | Morfeen </title>
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

    <style>
        form {
            width: 300px;
            margin: 0 auto;
            text-align: center;
            padding-top: 0px;
        }

        .value-button {
            display: inline-block;
            border: 1px solid #ddd;
            color: #000;
            margin: 0px;
            width: 40px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            padding: 7px 0;
            background: #eee;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .value-button:hover {
            cursor: pointer;
        }

        form #decrease {
            margin-right: -4px;
            border-radius: 8px 0 0 8px;
        }

        form #increase {
            margin-left: -4px;
            border-radius: 0 8px 8px 0;
        }

        form #input-wrap {
            margin: 0px;
            padding: 0px;
        }

        input.qty {
            text-align: center;
            border: none;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            margin: 0px;
            width: 40px;
            height: 40px;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body class="animsition" style="background: black">

    <!-- Header -->
    @include('frontend.halcust.header')

    <!-- Sidebar -->
    @include('frontend.halcust.sidebar')

    <section class="section-penilaian">
        <div class="container-fluid">
            <div class="col-12 p-t-150 my-auto " style="border: black">
                <p class="text-bold text-uppercase text-center text-white"
                    style="font-size: 20px ; font-family: 'Trebuchet MS'"></p>
                <div class="card " style="border: black">
                    <div class="card-body " style="background-color: black ; border: black">
                        <h2 style="font-weight: bold; color: white" class="p-b-20">Keranjang</h2>
                        <div class="row">
                            <table class="table">
                                <thead class="border-color: black">
                                    <tr class="border-color: black">
                                        <th class="text-white" style="text-align: center">Gambar </th>
                                        <th class="text-white" style="text-align: center">Nama </th>
                                        <th class="text-white" style="text-align: center">Harga</th>
                                        <th class="text-white" style="text-align: center">Ukuran</th>
                                        <th class="text-white" style="text-align: center">Qty</th>
                                        <th class="text-white" style="text-align: center">Total</th>
                                        <th class="text-white" colspan="1" style="text-align: center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                    <input type="hidden" class="barang_id" name="barang_id" value="{{ $item->barang_id }}">
                                    <input type="hidden" name="harga" value="{{ $item->barang->harga }}">
                                        <tr style="color: white; text-align:center">
                                            <td>
                                                <img src="{{ asset('images/disply/' . $item->barang->gambar_disply) }}"
                                                    height="150px">
                                            </td>
                                            <td>{{ $item->barang->nama_barang }}</td>
                                            <td> Rp. <?= number_format($item->barang->harga,0,',','.')?></td>
                                            <td>{{ $item->ukuran }}</td>
                                            <td>
                                                <form>
                                                    <div class="value-button" id="decrease" onclick="decreaseValue({{ $item->id }})" value="Decrease Value">-</div>
                                                    <input type="number" class="qty" id="qty-{{ $item->id }}" value="{{ $item->qty }}" readonly />
                                                    <div class="value-button" id="increase" onclick="increaseValue({{ $item->id }})" value="Increase Value">+</div>
                                                </form>
                                            </td>
                                            <td>
                                                Rp. <span id="total-{{ $item->id }}"><?= number_format($item->qty * $item->barang->harga,0,',','.')?></span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-danger mb-2 " href="{{ url('delete-cart/' . $item->id) }}">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fa-pull-right pt-2 p-r-150">
                <div class="pb-2">
                    <h6 style="color: white"><strong>Sub Total : Rp. <span id="grandTotal"><?=number_format($grand_total,0,',','.')?></span></strong></h6>
                </div>
                    @if($grand_total)
                    <button class="btn btn-success">
                        <a href="/checkout" style="color: white">Checkout</a>
                    </button>
                    <button class="btn btn-info">
                        <a href="/product" style="color: white">Kembali</a>
                    </button>
                    @endif
            </div>
            <br><br><br><br><br><br>
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

    <script type="text/javascript">
        function increaseValue(itemId) {
            let data = document.querySelector('#qty-'+itemId);
            let val = parseInt(data.value);
            val = isNaN(val) ? 0 : val; //Ternary condition
            val++;
            // document.querySelector('#qty-'+itemId).value = val;
            updateCartQty(val,itemId);
        }

        function decreaseValue(itemId) {
            let data = document.querySelector('#qty-'+itemId);
            let val = parseInt(data.value);
            val = isNaN(val) ? 0 : val;
            val < 1 ? val = 1 : '';
            val--;
            updateCartQty(val, itemId);
        }

        function deleteCart(itemId) {
            let data = document.querySelector(itemId);
            let val = parseInt(data.value);
        }

        function updateCartQty(qty, id){
            $.ajax({
                type: 'post',
                url: '/update-to-cart',
                data: {
                    _token:"{{ csrf_token() }}",
                    id: id,
                    quantity: qty
                },
                success: function(res){
                    document.querySelector('#qty-'+res.data.id).value = res.data.qty;
                    document.querySelector('#total-'+res.data.id).innerHTML = res.harga;
                    document.querySelector('#grandTotal').innerHTML = res.grandTotal;
                },
                error: function (err) {
                    console.log("Error:"+err.response)
                }
            });
        }

        $(document).on('click', 'btnCartDelete', function(){
            var cartid = $(this).data('id');
            alert(cartid); return false;
        });
    </script>
</body>

</html>
