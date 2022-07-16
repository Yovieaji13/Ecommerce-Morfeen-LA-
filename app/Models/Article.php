<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = "article";
    protected $fillable = [
        'id_catarticle',
        'judul_artikel',
        'slug',
        'deskripsi_artikel',
        'gambar_artikel',
        'sumber_artikel',
        'status'
    ];

    public function catarticle()
    {
        return $this->belongsTo(Catarticle::class, 'id_catarticle', 'id');
    }

}
