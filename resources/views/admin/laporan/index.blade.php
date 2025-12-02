@extends('themeadmin.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Laporan Kosan Terbaik – Hasil SPK (SAW)</h4>
    </div>

    <div class="card-body">

        <h5>Kosan Terbaik</h5>
        <div class="alert alert-success">
            <strong>{{ $terbaik['nama'] }}</strong><br>
            Nilai Akhir: <b>{{ $terbaik['nilai'] }}</b><br>
            Alamat: {{ $terbaik['alamat'] }}
        </div>

        <hr>

        <h5>Ranking Semua Kos</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Nama Kos</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($preferensi as $i => $p)
                <tr @if($i == 0) class="table-success" @endif>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $p['nama'] }}</td>
                    <td>{{ $p['nilai'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
