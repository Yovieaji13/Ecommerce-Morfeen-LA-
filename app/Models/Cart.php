<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $fillable =[
        'user_id',
        'barang_id',
        'ukuran',
        'qty',
        'total',
    ];

    public function barang(){
        return $this->belongsTo('App\Models\Barang', 'barang_id');
    }
}
