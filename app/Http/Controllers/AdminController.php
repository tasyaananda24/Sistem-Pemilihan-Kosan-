<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DaftarKos;

class AdminController extends Controller
{
    public function index()
    {
        // Hitung total pemilik
        $totalPemilik = User::where('role', 'pemilik')->count();

        // Hitung total kos yang terdaftar
        $totalKosan = DaftarKos::count();

        // Hitung kos yang masih pending verifikasi
        $pendingVerifikasi = DaftarKos::where('status_verifikasi', 'pending')->count();

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'totalPemilik',
            'totalKosan',
            'pendingVerifikasi'
        ));
    }
}
