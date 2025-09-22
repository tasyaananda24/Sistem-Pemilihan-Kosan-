<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'lala@admin.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'nama_kosan' => null,
            'alamat_kosan' => null,
        ]);
    }
}
