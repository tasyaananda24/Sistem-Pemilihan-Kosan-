<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KosApproved;
use App\Models\Kriteria;

class SawController extends Controller
{
    private function nilaiHarga($harga)
    {
        if ($harga >= 1000000) return 1;
        if ($harga >= 850000) return 2;
        if ($harga >= 650000) return 3;
        if ($harga >= 500000) return 4;
        return 5;
    }

    private function nilaiJarak($jarak)
    {
        if ($jarak <= 1000) return 5;
        if ($jarak <= 1500) return 4;
        if ($jarak <= 2000) return 3;
        if ($jarak <= 2500) return 2;
        return 1;
    }

    private function nilaiFasilitas($fasilitas)
    {
        $f = strtolower($fasilitas);
        if (str_contains($f, 'wifi') && str_contains($f, 'ac') && str_contains($f, 'lemari')) return 5;
        if (str_contains($f, 'wifi')) return 4;
        if (str_contains($f, 'kasur') && str_contains($f, 'dapur') && str_contains($f, 'parkir')) return 3;
        if (str_contains($f, 'kasur') && str_contains($f, '1 kamar')) return 2;
        return 1;
    }

    private function nilaiLuas($luas)
    {
        switch ($luas) {
            case '5x8': return 5;
            case '4x7': return 4;
            case '4x6': return 3;
            case '3x5': return 2;
            case '3x3': return 1;
            default: return 1;
        }
    }

    public function index()
    {
        // ⬅️ 1. Ambil data kriteria dari database
        $dbKriteria = Kriteria::orderBy('kode')->get();

        // Ubah format agar sama dengan struktur lama
        $kriteria = [];
        foreach ($dbKriteria as $kr) {
            $kriteria[strtolower($kr->kode)] = [
                'nama'    => $kr->nama_kriteria,
                'bobot'   => $kr->bobot,
                'atribut' => $kr->atribut
            ];
        }

        $alternatif = KosApproved::all();

        // 2️⃣ Mapping nilai alternatif
        $matrix = [];
        $namaKos = [];

        foreach ($alternatif as $alt) {
            $matrix[$alt->id]['c1'] = $this->nilaiHarga($alt->harga_sewa);
            $matrix[$alt->id]['c2'] = $this->nilaiJarak($alt->jarak_ke_kampus);
            $matrix[$alt->id]['c3'] = $this->nilaiFasilitas($alt->fasilitas);
            $matrix[$alt->id]['c4'] = $this->nilaiLuas($alt->luas_tanah);

            $namaKos[$alt->id] = $alt->nama_kosan;
        }

        // 3️⃣ Normalisasi
        $normalisasi = [];
        foreach ($kriteria as $key => $krit) {

            $kolom = array_column($matrix, $key);
            $max = max($kolom);
            $min = min($kolom);

            foreach ($matrix as $altId => $nilai) {
                if ($krit['atribut'] == 'benefit') {
                    $normalisasi[$altId][$key] = $nilai[$key] / $max;
                } else {
                    $normalisasi[$altId][$key] = $min / $nilai[$key];
                }
            }
        }

        // 4️⃣ Hitung preferensi
        $preferensi = [];
        foreach ($alternatif as $alt) {
            $total = 0;
            foreach ($kriteria as $key => $krit) {
                $total += $normalisasi[$alt->id][$key] * $krit['bobot'];
            }

            $preferensi[] = [
                'nama' => $alt->nama_kosan,
                'nilai' => round($total, 4),
            ];
        }

        usort($preferensi, fn($a, $b) => $b['nilai'] <=> $a['nilai']);

        foreach ($preferensi as $i => &$p) {
            $p['rank'] = $i + 1;
        }

        return view('admin.spk.index', compact('kriteria','matrix','normalisasi','preferensi','namaKos'));
    }
    public function laporan()
{
    // Ambil data kriteria
    $dbKriteria = Kriteria::orderBy('kode')->get();

    $kriteria = [];
    foreach ($dbKriteria as $kr) {
        $kriteria[strtolower($kr->kode)] = [
            'nama'    => $kr->nama_kriteria,
            'bobot'   => $kr->bobot,
            'atribut' => $kr->atribut
        ];
    }

    $alternatif = KosApproved::all();

    // Mapping nilai alternatif
    $matrix = [];
    foreach ($alternatif as $alt) {
        $matrix[$alt->id]['c1'] = $this->nilaiHarga($alt->harga_sewa);
        $matrix[$alt->id]['c2'] = $this->nilaiJarak($alt->jarak_ke_kampus);
        $matrix[$alt->id]['c3'] = $this->nilaiFasilitas($alt->fasilitas);
        $matrix[$alt->id]['c4'] = $this->nilaiLuas($alt->luas_tanah);
    }

    // Normalisasi
    $normalisasi = [];
    foreach ($kriteria as $key => $krit) {
        $kolom = array_column($matrix, $key);
        $max = max($kolom);
        $min = min($kolom);

        foreach ($matrix as $altId => $nilai) {
            if ($krit['atribut'] == 'benefit') {
                $normalisasi[$altId][$key] = $nilai[$key] / $max;
            } else {
                $normalisasi[$altId][$key] = $min / $nilai[$key];
            }
        }
    }

    // Hitung preferensi
    $preferensi = [];
    foreach ($alternatif as $alt) {
        $total = 0;
        foreach ($kriteria as $key => $krit) {
            $total += $normalisasi[$alt->id][$key] * $krit['bobot'];
        }

        $preferensi[] = [
            'id' => $alt->id,
            'nama' => $alt->nama_kosan,
            'alamat' => $alt->alamat,
            'nilai' => round($total, 4),
        ];
    }

    // Urutkan descending
    usort($preferensi, fn($a, $b) => $b['nilai'] <=> $a['nilai']);

    // Ambil terbaik
    $terbaik = $preferensi[0];

    // Kirim ke view
    return view('admin.laporan.index', compact('preferensi', 'terbaik'));
}

}
