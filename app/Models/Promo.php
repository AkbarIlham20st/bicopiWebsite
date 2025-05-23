<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promosi'; // ← tambahkan ini

    protected $fillable = [
        'judul',
        'harga',
        'deskripsi_1',
        'kelebihan_1',
        'kelebihan_2',
        'kelebihan_3',
        'deskripsi_2',
        'image'
    ];
}
