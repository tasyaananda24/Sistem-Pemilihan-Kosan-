<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatif'; // nama tabel asli
    protected $fillable = ['kode', 'nama'];
    
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'alternatif_id');
    }
}
