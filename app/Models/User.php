<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Field yang bisa diisi saat register
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',          // 'pemilik' atau 'admin'
        'nama_kosan',    // bisa null
        'alamat_kosan',  // bisa null
    ];

    // Field yang disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Helper function untuk cek role
    public function isPemilik()
    {
        return $this->role === 'pemilik';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
