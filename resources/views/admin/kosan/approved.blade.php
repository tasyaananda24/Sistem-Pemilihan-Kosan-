@extends('themeadmin.default')

@section('title', 'Verifikasi Kosan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Verifikasi Pendaftaran Kosan</h1>
    <a href="{{ route('admin.kosan.approved') }}" class="btn btn-custom-green">
        <i class="bi bi-house-door-fill me-1"></i> Lihat Kosan Disetujui
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered custom-table align-middle text-center" width="100%" cellspacing="0">
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
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $k->nama_kosan }}</td>
                            <td>{{ $k->alamat_kosan }}</td>
                            <td>Rp {{ number_format($k->harga_sewa, 0, ',', '.') }}</td>
                            <td>{{ $k->jumlah_kamar }}</td>
                            <td>{{ $k->luas_tanah }}</td>
                            <td>{{ $k->jarak_ke_kampus }}</td>
                            <td>{{ $k->fasilitas }}</td>
                            <td>
                                @php
                                    $fotoPath = public_path('assets/img/' . $k->foto_kosan);
                                @endphp
                                @if($k->foto_kosan && file_exists($fotoPath))
                                    <img src="{{ asset('assets/img/' . $k->foto_kosan) }}" width="80" class="rounded shadow-sm" alt="{{ $k->nama_kosan }}">
                                @else
                                    <img src="{{ asset('assets/img/default-kosan.jpg') }}" width="80" class="rounded shadow-sm" alt="Default Kosan">
                                @endif
                            </td>
                           
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Belum ada kosan menunggu verifikasi.</td>
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
    /* Tombol Hijau (Approve / Lihat) */
    .btn-custom-green {
        background-color: #4CAF50;
        color: #fff;
        border-radius: 25px;
        padding: 6px 16px;
        font-weight: 500;
        border: 1px solid #4CAF50;
        transition: 0.3s;
    }
    .btn-custom-green:hover {
        background-color: #3e8e41;
        border: 1px solid #3e8e41;
        color: #fff;
    }

    /* Tabel */
    .custom-table th {
        background-color: #f8f9fc;
        color: #4E4E4E;
        font-weight: 600;
    }
    .custom-table td, .custom-table th {
        vertical-align: middle;
    }

    /* Hover effect untuk row */
    .custom-table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Button aksi kecil */
    .btn-sm {
        font-size: 0.8rem;
        padding: 4px 10px;
    }

    /* Hover untuk tombol approve/reject */
    .btn-success:hover {
        background-color: #3a9d42;
        border-color: #3a9d42;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>
@endpush
