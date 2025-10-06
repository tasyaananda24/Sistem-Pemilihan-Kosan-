<?php

namespace App\Http\Controllers;

use App\Models\DaftarKos;
use Illuminate\Http\Request;
use App\Models\Kosan;

class PemilikController extends Controller
{
    // Dashboard pemilik
    public function dashboard()
    {
        $user = auth()->user();

        // Ambil semua kos milik pemilik
        $kosan = DaftarKos::where('user_id', $user->id)->get();

        // Statistik sederhana
        $totalKosan = $kosan->count();
        $totalKamar = $kosan->sum('jumlah_kamar'); // asumsikan ada field 'jumlah_kamar' di tabel kosan
        $kosanTerverifikasi = $kosan->where('status_verifikasi', 1)->count();
        $kosanBelumTerverifikasi = $totalKosan - $kosanTerverifikasi;

        return view('pemilik.dashboard', compact(
            'kosan', 
            'totalKosan', 
            'totalKamar', 
            'kosanTerverifikasi', 
            'kosanBelumTerverifikasi'
        ));
    }
}
