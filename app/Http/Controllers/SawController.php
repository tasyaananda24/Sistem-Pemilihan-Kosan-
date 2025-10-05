<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class SawController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $penilaian = Penilaian::with(['alternatif','kriteria'])->get();

        // Matriks
        $matrix = [];
        foreach ($alternatif as $alt) {
            foreach ($kriteria as $krit) {
                $nilai = Penilaian::where('alternatif_id',$alt->id)
                                  ->where('kriteria_id',$krit->id)
                                  ->value('nilai');
                $matrix[$alt->id][$krit->id] = $nilai;
            }
        }

        // Normalisasi
        $normalisasi = [];
        foreach ($kriteria as $krit) {
            // Ambil semua nilai dari kolom kriteria ini
            $kolom = [];
            foreach ($alternatif as $alt) {
                $kolom[] = $matrix[$alt->id][$krit->id];
            }

            $max = max($kolom);
            $min = min($kolom);

            foreach ($alternatif as $alt) {
                $nilai = $matrix[$alt->id][$krit->id];
                if ($krit->atribut == 'benefit') {
                    $normalisasi[$alt->id][$krit->id] = $nilai / $max;
                } else { // cost
                    $normalisasi[$alt->id][$krit->id] = $min / $nilai;
                }
            }
        }

        // Hitung nilai preferensi
        $preferensi = [];
        foreach ($alternatif as $alt) {
            $total = 0;
            foreach ($kriteria as $krit) {
                $total += $normalisasi[$alt->id][$krit->id] * $krit->bobot;
            }
            $preferensi[] = [
                'kode' => $alt->kode,
                'nama' => $alt->nama_alternatif, // ✅ tampilkan nama kosan
                'nilai' => round($total, 4),
            ];
        }

        // Urutkan ranking
        usort($preferensi, fn($a, $b) => $b['nilai'] <=> $a['nilai']);

        return view('admin.spk.index', compact('kriteria','alternatif','matrix','normalisasi','preferensi'));
    }
}
