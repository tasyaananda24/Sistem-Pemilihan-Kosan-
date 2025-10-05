@extends('themeadmin.default')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Sistem Pendukung Keputusan - Metode SAW</h1>

    {{-- Matriks Keputusan --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Matriks Keputusan (Xij)</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriteria as $krit)
                            <th>{{ $krit->kode }} <br> ({{ $krit->nama_kriteria }})</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatif as $alt)
                        <tr>
                            <td><strong>{{ $alt->kode }}</strong> - {{ $alt->nama }}</td>
                            @foreach ($kriteria as $krit)
                                <td>{{ $matrix[$alt->id][$krit->id] ?? '-' }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Normalisasi --}}
    <div class="card mb-4">
        <div class="card-header bg-success text-white">Normalisasi (Rij)</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriteria as $krit)
                            <th>{{ $krit->kode }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alternatif as $alt)
                        <tr>
                            <td><strong>{{ $alt->kode }}</strong> - {{ $alt->nama }}</td>
                            @foreach ($kriteria as $krit)
                                <td>{{ number_format($normalisasi[$alt->id][$krit->id], 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Nilai Preferensi & Ranking --}}
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">Nilai Preferensi & Ranking</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered text-center">
                <thead class="thead-light">
                    <tr>
                        <th>Rank</th>
                        <th>Alternatif</th>
                        <th>Nama Kosan</th>
                        <th>Nilai Preferensi (Vi)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $rank = 1; @endphp
                    @foreach ($preferensi as $i => $pref)
                        <tr>
                            <td><span class="badge badge-primary">{{ $i+1 }}</span></td>
                            <td>{{ $pref['kode'] }}</td>
                            <td>{{ $pref['nama'] }}</td>
                            <td><strong>{{ number_format($pref['nilai'], 4) }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
