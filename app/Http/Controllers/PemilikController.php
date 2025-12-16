<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil data kos milik user
        $kosan = DB::table('daftar_kos')
            ->where('user_id', $user->id)
            ->select('id', 'nama_kosan', 'alamat_kosan', 'jumlah_kamar', 'status_verifikasi')
            ->get();

        // Mapping TEXT → NUMBER
        $kosan->transform(function ($item) {

            // normalisasi status_verifikasi
            $status = strtolower(trim($item->status_verifikasi));

            if ($status === 'approved' || $status === 'verifikasi' || $status === 'diterima' || $status === 'sudah') {
                $item->status_verifikasi = 1;
            } else {
                $item->status_verifikasi = 0; // pending / rejected / null
            }

            return $item;
        });

        // Statistik
        $totalKosan = $kosan->count();
        $totalKamar = $kosan->sum('jumlah_kamar');
        $kosanTerverifikasi = $kosan->where('status_verifikasi', 1)->count();
        $kosanBelumTerverifikasi = $kosan->where('status_verifikasi', 0)->count();

        return view('pemilik.dashboard', compact(
            'kosan',
            'totalKosan',
            'totalKamar',
            'kosanTerverifikasi',
            'kosanBelumTerverifikasi'
        ));
    }
}
