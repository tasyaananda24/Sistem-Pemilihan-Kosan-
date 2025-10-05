<?php

// app/Models/Kriteria.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria'; // ⬅️ kasih tau nama tabel asli
    protected $fillable = ['kode', 'nama_kriteria', 'bobot', 'atribut'];
}
