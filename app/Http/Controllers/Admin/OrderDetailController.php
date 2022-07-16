<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    public function store($request,$id)
    {
        $orderDet = OrderDetail::create([
            'order_id'=> $id,
            'barang_id'=>$request->barang_id,
            'ukuran'=>$request->ukuran,
            'qty' => $request->qty,
            'total' => $request->total,
        ]);
    }

}
