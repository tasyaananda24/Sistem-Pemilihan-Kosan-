@extends('themepemilik.default')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Status Verifikasi Kosan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kosan</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kosans as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $k->nama_kosan }}</td>
                    <td>{{ $k->alamat_kosan }}</td>
                    <td>Rp {{ number_format($k->harga_sewa,0,',','.') }}</td>
                    <td>
                        @if($k->status_verifikasi == 'pending')
                            <span class="badge bg-warning text-dark">Belum Diverifikasi</span>
                        @elseif($k->status_verifikasi == 'approved')
                            <span class="badge bg-success">Diterima</span>
                        @elseif($k->status_verifikasi == 'rejected')
                            <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada kosan terdaftar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
