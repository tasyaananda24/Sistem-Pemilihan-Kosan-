<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    protected $table = 'kos';

    protected $fillable = [
        'user_id',
        'nama_kos',
        'alamat',
        'harga',
        'jarak',
        'fasilitas',
        'luas',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
