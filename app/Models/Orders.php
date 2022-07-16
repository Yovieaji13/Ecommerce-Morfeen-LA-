<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable =[
        'user_id',
        'provinsi_id',
        'no_order',
        'kota',
        'alamat',
        'keterangan',
        'total',
        'token',
        'payment_type',
        'transaction_status',
        'settlement_time',
    ];

    public function orderDetail(){
        return $this->hasMany('App\Models\OrderDetail','order_id');
    }

    public function ongkir(){
        return $this->belongsTo(Ongkir::class, 'provinsi_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
