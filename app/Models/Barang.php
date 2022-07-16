<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

//Model digunakan untuk mengolah database kita
class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $fillable = [
        'id_kategori',
        'kode_barang',
        'nama_barang',
        'slug',
        'harga',
        'deskripsi',
        'status',
        'trending',
        'gambar_disply',
    ];

    public function category()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function atribut(){
        return $this->hasMany(Atribut::class, 'id_barang', 'id');
    }

    public function image(){
        return $this->hasMany(Gambar::class, 'id_barang', 'id');
    }



}
