@extends('themepemilik.default')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary">Dashboard Pemilik</h2>

    {{-- Statistik --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Kos</h5>
                    <p class="card-text fs-4">{{ $totalKosan }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Kamar</h5>
                    <p class="card-text fs-4">{{ $totalKamar }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Terverifikasi</h5>
                    <p class="card-text fs-4">{{ $kosanTerverifikasi }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Belum Terverifikasi</h5>
                    <p class="card-text fs-4">{{ $kosanBelumTerverifikasi }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar Kos --}}
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Daftar Kos Saya</h5>
        </div>
        <div class="card-body">
            @if($kosan->count() > 0)
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Kos</th>
                            <th>Alamat</th>
                            <th>Jumlah Kamar</th>
                            <th>Status Verifikasi</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kosan as $index => $k)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $k->nama_kosan }}</td>
                            <td>{{ $k->alamat_kosan }}</td>
                            <td>{{ $k->jumlah_kamar ?? '-' }}</td>
                            <td>
                                @if($k->status_verifikasi)
                                    <span class="badge bg-success">Terverifikasi</span>
                                @else
                                    <span class="badge bg-warning text-dark">Belum</span>
                                @endif
                            </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center mb-0">Belum ada kos yang didaftarkan.</p>
            @endif
        </div>
    </div>
</div>
@endsection
