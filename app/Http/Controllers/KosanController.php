<?php

namespace App\Http\Controllers;

use App\Models\Kosan;
use Illuminate\Http\Request;

class KosanController extends Controller
{
    /**
     * Tampilkan tabel daftar kosan
     */
    public function index()
    {
        $kosans = Kosan::latest()->get();
        return view('pemilik.kosan.index', compact('kosans'));
    }

    /**
     * Tampilkan form tambah kosan
     */
    public function create()
    {
        return view('pemilik.kosan.create');
    }

    /**
     * Simpan data kosan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kosan'   => 'required|string|max:255',
            'alamat'       => 'required|string',
            'harga'        => 'required|numeric',
            'fasilitas'    => 'nullable|string',
            'nama_pemilik' => 'required|string|max:255',
            'hubungi'      => 'required|string|max:20',
        ]);

        Kosan::create([
            'nama_kosan'   => $request->nama_kosan,
            'alamat'       => $request->alamat,
            'harga'        => $request->harga,
            'fasilitas'    => $request->fasilitas,
            'nama_pemilik' => $request->nama_pemilik,
            'hubungi'      => $request->hubungi,
        ]);

        return redirect()->route('kosan.index')->with('success', 'Kosan berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit kosan
     */
    public function edit($id)
    {
        $kosan = Kosan::findOrFail($id);
        return view('pemilik.kosan.edit', compact('kosan'));
    }

    /**
     * Update data kosan
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kosan'   => 'required|string|max:255',
            'alamat'       => 'required|string',
            'harga'        => 'required|numeric',
            'fasilitas'    => 'nullable|string',
            'nama_pemilik' => 'required|string|max:255',
            'hubungi'      => 'required|string|max:20',
        ]);

        $kosan = Kosan::findOrFail($id);

        $kosan->update([
            'nama_kosan'   => $request->nama_kosan,
            'alamat'       => $request->alamat,
            'harga'        => $request->harga,
            'fasilitas'    => $request->fasilitas,
            'nama_pemilik' => $request->nama_pemilik,
            'hubungi'      => $request->hubungi,
        ]);

        return redirect()->route('kosan.index')->with('success', 'Data kosan berhasil diperbarui.');
    }

    /**
     * Hapus kosan
     */
    public function destroy($id)
    {
        $kosan = Kosan::findOrFail($id);
        $kosan->delete();

        return redirect()->route('kosan.index')->with('success', 'Kosan berhasil dihapus.');
    }
}
