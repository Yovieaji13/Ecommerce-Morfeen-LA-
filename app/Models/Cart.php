<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected $fillable = [
        'user_id',
        'barang_id',
        'atribut_id',
        'total_berat',
        'qty',
        'total',
    ];

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang', 'barang_id');
    }

    public function atribut()
    {
        // $comment = Atribut::where('id_barang', 'barang_id')->where('ukuran', )->first();
        return $this->belongsTo('App\Models\Atribut', 'atribut_id');
    }
}
