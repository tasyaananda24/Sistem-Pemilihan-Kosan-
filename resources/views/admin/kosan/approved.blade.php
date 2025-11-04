@extends('themeadmin.default')

@section('title', 'Daftar Kosan Disetujui')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Kosan Disetujui</h1>

    <a href="{{ route('admin.kosan.verifikasi') }}" class="btn btn-custom-green">
        Kembali ke Verifikasi
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered custom-table" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Kosan</th>
                        <th>Alamat</th>
                        <th>Harga</th>
                        <th>Jumlah Kamar</th>
                        <th>Luas Kamar</th>
                        <th>Jarak ke Kampus</th>
                        <th>Fasilitas</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kosans as $index => $k)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $k->nama_kosan }}</td>
                            <td>{{ $k->alamat_kosan }}</td>
                            <td>Rp {{ number_format($k->harga_sewa, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $k->jumlah_kamar }}</td>
                            <td class="text-center">{{ $k->luas_tanah }}</td>
                            <td class="text-center">{{ $k->jarak_ke_kampus }}</td>
                            <td>{{ $k->fasilitas }}</td>
                            <td class="text-center">
                                @if($k->foto_kosan)
                                    <img src="{{ asset('storage/' . $k->foto_kosan) }}" 
                                         alt="Foto Kosan" width="80" class="rounded">
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum ada kosan yang disetujui.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Tombol Hijau (Kembali) */
    .btn-custom-green {
        background-color: #A3B18A;
        color: #FFFBF2;
        border-radius: 25px;
        padding: 8px 20px;
        font-weight: 500;
        border: 1px solid #A3B18A;
        transition: 0.3s;
    }
    .btn-custom-green:hover {
        background-color: #7c8c66;
        color: #FFFBF2;
        border: 1px solid #7c8c66;
    }

    /* Style tabel agar sama seperti halaman kriteria */
    .custom-table th {
        background-color: #F8F9FC;
        color: #4E4E4E;
        font-weight: 600;
    }

    .custom-table td, 
    .custom-table th {
        vertical-align: middle;
    }
</style>
@endpush
