<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atribut extends Model
{
    use HasFactory;
    protected $table = "atribut";
    protected $fillbale =[
        'id_barang',
        'ukuran',
        'stock',
        'sku',
        'status',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
