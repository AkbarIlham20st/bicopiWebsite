<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu'; // nama tabel di database
    protected $primaryKey = 'id_menu'; // sesuai kolom primary key kamu
    public $incrementing = false; // karena id_menu kamu tipe UUID
    protected $keyType = 'string'; // UUID adalah string
    public $timestamps = true; // kamu pakai created_at dan updated

    protected $fillable = [
        'nama_menu',
        'foto_menu',
        'deskripsi_menu',
        'harga_menu',
        'kategori',
    ];
}
