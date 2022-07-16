<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "order_details";
    protected $fillable =[
        'order_id',
        'barang_id',
        'ukuran',
        'qty',
        'total',
    ];

    public function barang(){
        return $this->belongsTo('App\Models\Barang', 'barang_id');
    }

    public function orders(){
        return $this->belongsTo('App\Models\Orders', 'order_id');
    }
}
