<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKos extends Model
{
    use HasFactory;

    protected $table = 'daftar_kos';

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
    'status_verifikasi',
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
