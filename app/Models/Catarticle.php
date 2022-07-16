<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catarticle extends Model
{
    use HasFactory;
    protected $table = "catarticle";
    protected $fillable = [
        'nama',
        'slug'
    ];
}
