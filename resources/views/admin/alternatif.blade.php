@extends('themeadmin.default')

@section('title', 'Verifikasi Kosan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Verifikasi Pendaftaran Kosan</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Kosan Pending --}}
<div class="card shadow mb-4">
    <div class="card-body">
        <h5 class="mb-3">Kosan Menunggu Verifikasi</h5>
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
                        <th>Status / Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kosans as $index => $k)
                        @if($k->status_verifikasi == 'pending')
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $k->nama_kosan }}</td>
                                <td>{{ $k->alamat_kosan }}</td>
                                <td>Rp {{ number_format($k->harga_sewa,0,',','.') }}</td>
                                <td class="text-center">{{ $k->jumlah_kamar }}</td>
                                <td class="text-center">{{ $k->luas_tanah }}</td>
                                <td class="text-center">{{ $k->jarak_ke_kampus }}</td>
                                <td>{{ $k->fasilitas }}</td>
                                <td class="text-center">
                                    @if($k->foto_kosan)
                                        <img src="{{ asset('storage/' . $k->foto_kosan) }}" alt="Foto Kosan" width="80">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.kosan.verifikasi.update', $k->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" name="status_verifikasi" value="approved" class="btn btn-custom-green btn-sm mb-1">Approve</button>
                                        <button type="submit" name="status_verifikasi" value="rejected" class="btn btn-custom-red btn-sm">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
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

{{-- Kosan Approved --}}
<div class="card shadow mb-4">
    <div class="card-body">
        <h5 class="mb-3">Kosan Sudah Di-Approve</h5>
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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kosans as $index => $k)
                        @if($k->status_verifikasi == 'approved')
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $k->nama_kosan }}</td>
                                <td>{{ $k->alamat_kosan }}</td>
                                <td>Rp {{ number_format($k->harga_sewa,0,',','.') }}</td>
                                <td class="text-center">{{ $k->jumlah_kamar }}</td>
                                <td class="text-center">{{ $k->luas_tanah }}</td>
                                <td class="text-center">{{ $k->jarak_ke_kampus }}</td>
                                <td>{{ $k->fasilitas }}</td>
                                <td class="text-center">
                                    @if($k->foto_kosan)
                                        <img src="{{ asset('storage/' . $k->foto_kosan) }}" alt="Foto Kosan" width="80">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success">Approved</span>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Belum ada kosan yang di-approve.</td>
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
    /* Tombol Hijau untuk Approve */
    .btn-custom-green {
        background-color: #A3B18A;
        color: #FFFBF2;
        border-radius: 25px;
        padding: 6px 16px;
        font-weight: 500;
        border: 1px solid #A3B18A;
        transition: 0.3s;
    }
    .btn-custom-green:hover {
        background-color: #7c8c66;
        color: #FFFBF2;
        border: 1px solid #7c8c66;
    }

    /* Tombol Merah untuk Reject */
    .btn-custom-red {
        background-color: #dc3545;
        color: #FFFBF2;
        border-radius: 25px;
        padding: 6px 16px;
        font-weight: 500;
        border: 1px solid #dc3545;
        transition: 0.3s;
    }
    .btn-custom-red:hover {
        background-color: #c82333;
        border: 1px solid #c82333;
    }

    /* Tabel Rapi */
    .custom-table th {
        background-color: #f8f9fc;
        font-weight: 600;
        color: #333;
    }
</style>
@endpush
