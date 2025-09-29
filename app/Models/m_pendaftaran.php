<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';

    protected $fillable = [
        'nama_properti',
        'tipe_properti',
        'penanggung_jawab',
        'jabatan',
        'email',
        'no_telepon',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'alamat',
        'peta',
        'deskripsi',
        'fasilitas',      // simpan array dalam bentuk JSON
        'detail_kamar',
        'harga_harian',
        'harga_mingguan',
        'harga_bulanan',
        'harga_tahunan',
        'foto_properti',
        'kebijakan',
        'pembayaran',
        'identitas',
        'status'
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'kebijakan' => 'array',
        'foto_properti' => 'array',
        'pembayaran' => 'array',
        'identitas' => 'array',
    ];
}
