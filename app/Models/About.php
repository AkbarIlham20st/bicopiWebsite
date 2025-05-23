<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'about';
    protected $guarded = [];
    protected $fillable = [
        'image',
        'judul',
        'subjudul',
        'kelebihan_1',
        'kelebihan_2',
        'kelebihan_3',
    ];
}
