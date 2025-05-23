<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    protected $fillable = [
        'alamat',
        'email',
        'telepon',
        'jam_buka',
        'maps_embed',
        'twitter',
        'facebook',
        'instagram',
        'lynkin',
    ];
}
