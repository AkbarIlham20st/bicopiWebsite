<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;

    protected $table = 'specials'; // Menyatakan nama tabel yang digunakan

    protected $fillable = [
        'judul',
        'deskripsi',
        'image'
    ];
}
