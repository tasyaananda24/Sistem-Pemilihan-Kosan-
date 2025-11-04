@extends('themeadmin.default')

@section('title', 'SPK Kosan - Hasil SAW')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Hasil SAW - Pemilihan Kosan</h1>

    {{-- 1️⃣ Matriks Nilai Alternatif --}}
    <h3>1. Matriks Nilai Alternatif (Skala 1–5)</h3>
    <p>Ini adalah nilai masing-masing kosan untuk setiap kriteria sebelum normalisasi.</p>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Kosan</th>
                @foreach($kriteria as $key => $krit)
                    <th>{{ $krit['nama'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($matrix as $altId => $nilai)
            <tr>
                <td>{{ $namaKos[$altId] }}</td>
                @foreach($kriteria as $key => $krit)
                    <td>{{ $nilai[$key] }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 2️⃣ Normalisasi --}}
    <h3 class="mt-5">2. Normalisasi</h3>
    <p>
        Normalisasi membuat semua nilai sebanding (0–1) agar bobot kriteria dapat diterapkan.<br>
        <em>Benefit:</em> nilai / maksimum <br>
        <em>Cost:</em> minimum / nilai
    </p>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Kosan</th>
                @foreach($kriteria as $key => $krit)
                    <th>{{ $krit['nama'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($normalisasi as $altId => $nilai)
            <tr>
                <td>{{ $namaKos[$altId] }}</td>
                @foreach($kriteria as $key => $krit)
                    <td>{{ round($nilai[$key], 2) }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- 3️⃣ Nilai Preferensi & Ranking --}}
    <h3 class="mt-5">3. Nilai Preferensi & Ranking</h3>
    <p>Nilai preferensi didapat dari penjumlahan hasil normalisasi dikali bobot kriteria. Semakin tinggi nilainya, semakin baik ranking kosan.</p>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Ranking</th>
                <th>Kosan</th>
                <th>Nilai Preferensi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($preferensi as $p)
            <tr>
                <td>{{ $p['rank'] }}</td>
                <td>{{ $p['nama'] }}</td>
                <td>{{ $p['nilai'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
