<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kosan',
        'alamat',
        'harga',
        'fasilitas',
        'nama_pemilik',
        'hubungi',
    ];
}
