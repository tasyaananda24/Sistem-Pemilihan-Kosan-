<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarKos;
use Illuminate\Support\Facades\Storage;

class KosanController extends Controller
{
    // Menampilkan semua kosan milik user yang login
    public function index()
    {
        $kosans = DaftarKos::where('user_id', auth()->id())->latest()->get();
        return view('pemilik.kosan.index', compact('kosans'));
    }

    // Form tambah kosan baru
    public function create()
    {
        return view('pemilik.kosan.create');
    }

    // Simpan data kosan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kosan' => 'required|string|max:255',
            'harga_sewa' => 'required|numeric',
            'jumlah_kamar' => 'required|integer',
            'no_hp' => 'required|string|max:20',
            'fasilitas' => 'nullable|string',
            'luas_tanah' => 'nullable|string',
            'jarak_ke_kampus' => 'nullable|string',
            'alamat_kosan' => 'required|string|max:255',
            'foto_kosan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto jika ada
       $fotoPath = null;
if ($request->hasFile('foto_kosan')) {
    $fotoPath = $request->file('foto_kosan')->store('foto_kosan', 'public');
    // simpan $fotoPath langsung, contoh: foto_kosan/file.jpg
}


        DaftarKos::create([
            'user_id' => auth()->id(),
            'nama_kosan' => $request->nama_kosan,
            'harga_sewa' => $request->harga_sewa,
            'jumlah_kamar' => $request->jumlah_kamar,
            'no_hp' => $request->no_hp,
            'fasilitas' => $request->fasilitas,
            'luas_tanah' => $request->luas_tanah,
            'jarak_ke_kampus' => $request->jarak_ke_kampus,
            'alamat_kosan' => $request->alamat_kosan,
            'foto_kosan' => $fotoPath,
            'status_verifikasi' => 'pending', // default status
        ]);

        return redirect()->route('pemilik.kosan.index')
                         ->with('success', 'Data kos berhasil ditambahkan.');
    }

    // Hapus kosan
    public function destroy($id)
    {
        $kosan = DaftarKos::where('user_id', auth()->id())->findOrFail($id);

        if ($kosan->foto_kosan && Storage::exists('public/foto_kosan/' . $kosan->foto_kosan)) {
            Storage::delete('public/foto_kosan/' . $kosan->foto_kosan);
        }

        $kosan->delete();

        return redirect()->route('pemilik.kosan.index')->with('success', 'Data kosan berhasil dihapus!');
    }

    // Tampilkan kosan untuk verifikasi (status pending)
    public function verifikasiIndex()
    {
        $kosans = DaftarKos::where('user_id', auth()->id())
                            ->where('status_verifikasi', 'pending')
                            ->latest()
                            ->get();

        return view('pemilik.kosan.verifikasi', compact('kosans'));
    }

    // Update status verifikasi
    public function verifikasi(Request $request, $id)
    {
        $kosan = DaftarKos::where('user_id', auth()->id())->findOrFail($id);
        $kosan->status_verifikasi = $request->input('status'); // approved / rejected
        $kosan->save();

        return redirect()->route('pemilik.kosan.verifikasi')
                         ->with('success', 'Status kosan berhasil diperbarui.');
    }
}
