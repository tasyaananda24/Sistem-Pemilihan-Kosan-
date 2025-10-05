<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;
use App\Models\Kriteria;
use Illuminate\Support\Facades\Auth;

class KosController extends Controller
{
    // Form tambah kos (pemilik)
    public function create() {
        return view('kos.create');
    }

    // Simpan kos baru
    public function store(Request $request) {
        $request->validate([
            'nama_kos' => 'required|string|max:255',
            'alamat' => 'required|string',
            'harga' => 'required|numeric',
            'jarak' => 'required|numeric',
            'fasilitas' => 'required|integer|min:1|max:5',
            'luas' => 'required|numeric',
        ]);

        Kos::create([
            'user_id' => Auth::id(),
            'nama_kos' => $request->nama_kos,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
            'jarak' => $request->jarak,
            'fasilitas' => $request->fasilitas,
            'luas' => $request->luas,
            'status' => 'pending',
        ]);

        return redirect()->route('kos.index')->with('success', 'Pendaftaran kos berhasil, menunggu verifikasi admin.');
    }

    // Daftar kos milik user / Tampilkan SPK
public function index()
{
    $alternatif = Kos::where('status', 'approved')->get();
    $kriteria = Kriteria::all();

    if ($alternatif->isEmpty() || $kriteria->isEmpty()) {
        return view('admin.spk.index', [
            'message' => 'Belum ada kos yang disetujui atau kriteria belum tersedia.',
            'alternatif' => collect(),
            'kriteria' => collect(),
            'matrix' => [],
            'normalisasi' => [],
            'preferensi' => [],
        ]);
    }

    // Matriks keputusan
    $matrix = [];
    foreach ($alternatif as $alt) {
        foreach ($kriteria as $krit) {
            $matrix[$alt->id][$krit->id] = $alt[$krit->kode] ?? 0;
        }
    }

    // Normalisasi
    $normalisasi = [];
    foreach ($kriteria as $krit) {
        $kolom = [];
        foreach ($alternatif as $alt) {
            $kolom[] = $matrix[$alt->id][$krit->id] ?? 0;
        }
        $max = !empty($kolom) ? max($kolom) : 1;
        $min = !empty($kolom) ? min($kolom) : 1;

        foreach ($alternatif as $alt) {
            $nilai = $matrix[$alt->id][$krit->id] ?? 0;
            if ($krit->atribut == 'benefit') {
                $normalisasi[$alt->id][$krit->id] = $nilai / $max;
            } else {
                $normalisasi[$alt->id][$krit->id] = $nilai > 0 ? $min / $nilai : 0;
            }
        }
    }

    // Hitung preferensi
    $preferensi = [];
    foreach ($alternatif as $alt) {
        $vi = 0;
        foreach ($kriteria as $krit) {
            $vi += ($normalisasi[$alt->id][$krit->id] ?? 0) * $krit->bobot;
        }
        $preferensi[$alt->id] = $vi;
    }

    arsort($preferensi); // urutkan descending

    return view('admin.spk.index', compact('alternatif','kriteria','matrix','normalisasi','preferensi'))
           ->with('message', null);
}

    // Verifikasi admin
    public function verifikasi() {
        $kos = Kos::where('status', 'pending')->get();
        return view('admin.kos.verifikasi', compact('kos'));
    }

    public function approve($id) {
        $kos = Kos::findOrFail($id);
        $kos->update(['status' => 'approved']);
        return back()->with('success', 'Kosan berhasil disetujui.');
    }

    public function reject($id) {
        $kos = Kos::findOrFail($id);
        $kos->update(['status' => 'rejected']);
        return back()->with('success', 'Kosan ditolak.');
    }
}
