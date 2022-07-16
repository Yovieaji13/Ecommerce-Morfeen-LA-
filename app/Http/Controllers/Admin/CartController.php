<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function store(Request $request)
    {
        $total = $request->qty * $request->harga;
        $cart = Cart::create([
            'user_id' => Auth::user()->id,
            'barang_id' => $request->barang_id,
            'ukuran' => $request->ukuran,
            'qty'=>$request->qty,
            'total'=>$total,
        ]);
        return redirect('/cart');
    }

    public function cart(){
        $this->data['cart'] = Cart::where('user_id', Auth::user()->id)->paginate(10);
        $this->data['grand_total'] = Cart::where('user_id', Auth::user()->id)->sum('total');

        return view('frontend.halkeranjang.index', $this->data);
    }

    public function updateCartQty(Request $request){
        try {
            $data = Cart::with('barang')->findOrFail($request->id);
            $data->qty = $request->quantity;
            $data->total = $request->quantity * $data->barang->harga;
            $data->save();
            $harga = number_format($data->total,0,',','.');
            $grandTotal = number_format(Cart::where('user_id', Auth::user()->id)->sum('total'),0,',','.');
            return response()->json(['data' => $data, 'harga' => $harga, 'grandTotal' => $grandTotal], 201);
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function deleteCart($id){
        Cart::where('id',$id)->delete();
        return redirect('/cart');
    }
}
