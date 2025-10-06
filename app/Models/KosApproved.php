<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KosApproved extends Model
{
    protected $table = 'kosans_approved';

    protected $fillable = [
        'user_id',
        'nama_kosan',
        'harga_sewa',
        'jumlah_kamar',
        'no_hp',
        'fasilitas',
        'luas_tanah',
        'jarak_ke_kampus',
        'alamat_kosan',
        'foto_kosan',
    ];
}
