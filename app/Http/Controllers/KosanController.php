<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarKos;
use App\Models\KosApproved;
use Illuminate\Support\Facades\Storage;

class KosanController extends Controller
{
    // ================================
    // Tampil kosan pemilik (yang sudah approved)
    // ================================
    public function index()
    {
        $kosans = KosApproved::where('user_id', auth()->id())
                                ->latest()
                                ->get();

        return view('pemilik.kosan.index', compact('kosans'));
    }

    // ================================
    // Form tambah kosan baru
    // ================================
    public function create()
    {
        return view('pemilik.kosan.create');
    }

    // ================================
    // Simpan kosan baru (status pending)
    // ================================
   public function store(Request $request)
{
    $request->validate([
        'nama_kosan' => 'required|string|max:255',
        'harga_sewa' => 'required',
        'jumlah_kamar' => 'required|integer',
        'no_hp' => 'required|string|max:20',
        'fasilitas' => 'nullable|string',
        'luas_tanah' => 'nullable|string',
        'jarak_ke_kampus' => 'nullable|string',
        'alamat_kosan' => 'required|string|max:255',
        'foto_kosan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // 🔹 Hapus titik dari input harga_sewa sebelum disimpan
    $hargaSewa = str_replace('.', '', $request->harga_sewa);

    $fotoPath = null;
    if ($request->hasFile('foto_kosan')) {
        $fotoPath = $request->file('foto_kosan')->store('foto_kosan', 'public');
    }

    DaftarKos::create([
        'user_id' => auth()->id(),
        'nama_kosan' => $request->nama_kosan,
        'harga_sewa' => $hargaSewa, // ← gunakan nilai bersih tanpa titik
        'jumlah_kamar' => $request->jumlah_kamar,
        'no_hp' => $request->no_hp,
        'fasilitas' => $request->fasilitas,
        'luas_tanah' => $request->luas_tanah,
        'jarak_ke_kampus' => $request->jarak_ke_kampus,
        'alamat_kosan' => $request->alamat_kosan,
        'foto_kosan' => $fotoPath,
        'status_verifikasi' => 'pending',
    ]);

    return redirect()->route('pemilik.kosan.verifikasi')
                     ->with('success', 'Data kos berhasil ditambahkan. Menunggu verifikasi admin.');
}


    // ================================
    // Hapus kosan
    // ================================
    public function destroy($id)
    {
        // Hapus hanya kosan milik pemilik
        $kosan = DaftarKos::where('user_id', auth()->id())->findOrFail($id);

        if ($kosan->foto_kosan && Storage::disk('public')->exists($kosan->foto_kosan)) {
            Storage::disk('public')->delete($kosan->foto_kosan);
        }

        $kosan->delete();

        return redirect()->back()->with('success', 'Data kosan berhasil dihapus!');
    }

    // ================================
    // Verifikasi pemilik (lihat status)
    // ================================
    public function verifikasiIndex()
    {
        $kosans = DaftarKos::where('user_id', auth()->id())->latest()->get();
        return view('pemilik.kosan.verifikasi', compact('kosans'));
    }

    // ================================
    // Update status verifikasi (Admin)
    // ================================
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:approved,rejected',
        ]);

        $kosan = DaftarKos::findOrFail($id);
        $kosan->status_verifikasi = $request->input('status_verifikasi');
        $kosan->save();

        // Jika disetujui, copy ke tabel KosApproved
        if ($kosan->status_verifikasi === 'approved') {
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
}
