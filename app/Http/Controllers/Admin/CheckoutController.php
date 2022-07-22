<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Barang;
use App\Models\Ongkir;
use App\Models\Orders;
use App\Models\Atribut;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CheckoutController extends Controller
{
    public function showCo()
    {
        // dd(Cart::where('user_id','=',Auth::user()->id)->get());

        $cart = $this->data['cart'] = Cart::where('user_id', '=', Auth::user()->id)->get();
        $this->data['ongkir'] = Ongkir::get();
        $this->data['grand_total'] = Cart::where('user_id', '=', Auth::user()->id)->get()->sum('total');

        // dd($this->data['cart'] = Cart::where('user_id', '=', Auth::user()->id)->first());

        return view('frontend.halcheckout.index', $this->data);
    }

    public function checkout($request)
    {
        $order = Orders::create([
            'user_id' => Auth::user()->id,
            'provinsi_id' => $request['shipment']->provinsi,
            'no_order' => 'MORF-' . date('Ymd') . rand(1111, 9999),
            'transaction_status' => 'pending',
            'token' => rand(1111, 9999) . 'xxi' . rand(1111, 9999),
            'kota' => $request['shipment']->kota,
            'alamat' => $request['shipment']->alamat,
            'keterangan' => $request['shipment']->keterangan,
            'total' => $request['transaction']->sum('total'),
        ]);
        return $order;
    }

    public function saveCheckout(Request $request)
    {
        // var_dump($request);
        // $getData = Atribut::get();
        // var_dump($getData);
        if (Cart::where('user_id', '=', Auth::user()->id)->count() > 0) {
            $this->data['transaction'] = Cart::where('user_id', '=', Auth::user()->id)->get();
            $this->data['totalongkir'] = Cart::where('user_id', '=', Auth::user()->id)->sum('total_berat');
            $this->data['shipment'] = $request;
            $this->data['order'] = $this->checkout($this->data);
            $this->data['ongkir'] = Ongkir::find($request->provinsi)->harga * $this->data['totalongkir'];
            $this->data['provinsi'] = Ongkir::find($request->provinsi)->provinsi;
            $i = 0;

            // $pengurangan = DB::table('Cart')->where('user_id', Auth::user()->id)->first()->qty;
            // $tes = DB::table('Atribut')->where('barang_id', $request->barang_id)->first();
           
            foreach ($this->data['transaction'] as $value) {
                $i++;
                app('App\Http\Controllers\Admin\OrderDetailController')->store($value, $this->data['order']->id);
                Cart::where('id', $value->id)->delete();
            }
            $this->data['token'] = $this->reqPayment($this->data['order'], $this->data['ongkir']);
            return view('frontend.halcheckout.showSnap', $this->data);
        }
    }
    public function confirmPayment(Request $request)
    {
        // return $request->result['status_code'];
        $orderPending = Orders::where('no_order', $request->result['order_id'])->first();
        // $orderEncryption = hash("sha512",$orderPending->no_order.'200'.$orderPending->total.'.00'.'SB-Mid-server-dx5ECjkef78uZ5c8_pl2_pGU');
        if (
            $orderPending->transaction_status == 'pending' &&
            ($request->result['transaction_status'] == 'settlement' || $request->result['transaction_status'] == 'capture')
        ) {
            $orderPending->transaction_status = 'settlement';
            // $orderPending->settlement_time = $request->result['transaction_time'];
            $orderPending->payment_type = $request->result['payment_type'];
            $orderPending->save();
            //ambil query daftar product dari order
            $orders = OrderDetail::where('order_id', $orderPending->id)->get();
            foreach ($orders as $order) {
                $requestedAmount = $order->qty;
                while ($requestedAmount > 0) {
                    $storedAmount = 0;
                    // ambil data batch teratas dengan sisa stok > 0
                    $attribute = Atribut::where('id_barang', $order->barang_id)
                        ->where('stock', '>', 0)
                        ->where('id', '=', $order->atribut_id)
                        ->orderBy('id', 'asc')
                        ->first();
                    $remainingStockAmount = $order->atribut->stock;
                    //cek apabila jumlah produk yang diminta < stok yang dimiliki
                    if ($remainingStockAmount > $requestedAmount) {
                        $storedAmount = $requestedAmount;
                        $remainingStockAmount = $remainingStockAmount - $requestedAmount;
                        // $requestedAmount = 0;
                        // dd($remainingStockAmount);
                    }
                    //cek apabila jumlah produk yang diminta > stok yang dimiliki
                    else {
                        $storedAmount = $remainingStockAmount;
                        $requestedAmount = $requestedAmount - $remainingStockAmount;
                        // $remainingStockAmount = 0;
                    }
                    //simpan perubahan jumlah stok pada table Restock Batch
                    $attribute->stock = $remainingStockAmount;
                    $attribute->save();
                }
                // return $batch;
            }
        }
        return $orderPending;
    }

    public function reqPayment(Orders $order, $ongkir)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-ndDjR6SNFmFuUZGcmpk69EMb';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->no_order,
                'gross_amount' => $order->total + $ongkir,
            ),
            'customer_details' => array(
                'first_name' => 'morfeen',
                'last_name' => 'thirteen',
                'email' => 'morfeen13@gmail.com',
                'phone' => '088741164285',
            ),
        );

        return $this->data['token'] = \Midtrans\Snap::getSnapToken($params);
    }

    public function showTrans(Request $request)
    {
        Session::put('page', 'penjualan');
        $order = Orders::select('orders.*', 'ongkir.harga')
            ->join('ongkir', 'ongkir.id', '=', 'orders.provinsi_id')
            ->paginate(5);

        $this->data['resultQuery'] = Barang::select('category.*', DB::raw("SUM(atribut.stock) AS total"))
            ->join('category', 'category.id', '=', 'barang.id_kategori')
            ->join('atribut', 'atribut.id_barang', '=', 'barang.id')
            ->groupBy('category.id')
            ->get();
        $this->data['modal'] = 0;
        foreach ($this->data['resultQuery'] as $category) {
            $this->data['modal'] += $category->hpp * $category->total;
        }
        $this->data['penjualan'] = Orders::where('transaction_status', '=', 'settlement')
            ->sum('total');

        return view('admin.penjualan.index', $this->data)->with(compact('order'));
    }

    public function showLaba($id)
    {
        $this->data['orders'] = Orders::findOrFail($id);
        $this->data['orderDetail'] = OrderDetail::where('order_id', '=', $id)->get();
        $this->data['subtotal'] = 0;
        foreach ($this->data['orderDetail'] as $value) {
            $this->data['subtotal'] += $value->total;
        }
        $this->data['ongkir'] = OrderDetail::where('order_id', '=', $id)->sum('qty') * Orders::find($id)->ongkir->harga;
        return view('admin.penjualan.laba', $this->data);
    }

    // public function showLaporan(){
    //     Session::put('page', 'laporan');
    //     // $order = Orders::paginate(5);
    //     $this->data['resultQuery'] = Barang::select('category.*', DB::raw("SUM(atribut.stock) AS total"))
    //                             ->join('category','category.id','=','barang.id_kategori')
    //                             ->join('atribut','atribut.id_barang','=','barang.id')
    //                             ->groupBy('category.id')
    //                             ->get();
    //     $this->data['modal']=0;
    //     foreach ($this->data['resultQuery'] as $category) {
    //         $this->data['modal']+= $category->hpp*$category->total;
    //     }
    //     $this->data['penjualan'] = Orders::where('transaction_status','=','settlement')
    //                             ->sum('total');
    //     return $this->data;
    //     // return view('admin.penjualan.laporan');
    // }
}
