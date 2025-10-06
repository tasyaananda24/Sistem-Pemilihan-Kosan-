@extends('themepemilik.default')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Daftar Kosan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('pemilik.kosan.create') }}" class="btn btn-primary">+ Tambah Kosan</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Kosan</th>
                <th>Hubungi</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Jumlah Kamar</th>
                <th>Fasilitas</th>
                <th>Luas Tanah</th>
                <th>Jarak ke Kampus</th>
                <th>Foto</th>
               
            </tr>
        </thead>
        <tbody>
            @forelse ($kosans as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $k->nama_kosan }}</td>
                    <td>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $k->no_hp) }}" target="_blank" class="btn btn-sm btn-success">
                            {{ $k->no_hp }}
                        </a>
                    </td>
                    <td>{{ $k->alamat_kosan }}</td>
                    <td>Rp {{ number_format($k->harga_sewa, 0, ',', '.') }}</td>
                    <td>{{ $k->jumlah_kamar }}</td>
                    <td>{{ $k->fasilitas }}</td>
                    <td>{{ $k->luas_tanah }}</td>
                    <td>{{ $k->jarak_ke_kampus }}</td>
                    <td>
                        @if($k->foto_kosan)
                            <img src="{{ asset('storage/'.$k->foto_kosan) }}" width="100">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
        
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">Belum ada kosan terdaftar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
