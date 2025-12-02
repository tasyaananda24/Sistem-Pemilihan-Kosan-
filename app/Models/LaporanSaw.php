<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanSaw extends Model
{
    protected $table = 'laporan_saw';

    protected $fillable = [
        'kos_id',
        'nama_kosan',
        'alamat',
        'nilai_preferensi',
        'ranking'
    ];
}
