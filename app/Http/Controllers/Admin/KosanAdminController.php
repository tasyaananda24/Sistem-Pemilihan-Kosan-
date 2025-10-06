<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarKos;
use App\Models\KosApproved; // pastikan model sudah dibuat

class KosanAdminController extends Controller
{
    // Menampilkan kosan pending (untuk verifikasi admin)
    public function index()
    {
        $kosans = DaftarKos::where('status_verifikasi', 'pending')
                            ->latest()
                            ->get();

        return view('admin.kosan.verifikasi', compact('kosans'));
    }

    // Update status verifikasi kosan
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:approved,rejected',
        ]);

        $kosan = DaftarKos::findOrFail($id);
        $kosan->status_verifikasi = $request->status_verifikasi;
        $kosan->save();

        // Jika approved, salin ke tabel kosans_approved
        if ($request->status_verifikasi === 'approved') {
            KosApproved::create([
                'user_id' => $kosan->user_id,
                'nama_kosan' => $kosan->nama_kosan,
                'harga_sewa' => $kosan->harga_sewa,
                'jumlah_kamar' => $kosan->jumlah_kamar,
                'no_hp' => $kosan->no_hp,
                'fasilitas' => $kosan->fasilitas,
                'luas_tanah' => $kosan->luas_tanah,
                'jarak_ke_kampus' => $kosan->jarak_ke_kampus,
                'alamat_kosan' => $kosan->alamat_kosan,
                'foto_kosan' => $kosan->foto_kosan,
            ]);
        }

        return redirect()->back()->with('success', 'Status kosan berhasil diperbarui.');
    }

    // Menampilkan semua kosan yang sudah di-approve (halaman admin/alternatif)
    public function approved()
    {
        $kosans = KosApproved::latest()->get();
        return view('admin.kosan.approved', compact('kosans'));
    }
}
