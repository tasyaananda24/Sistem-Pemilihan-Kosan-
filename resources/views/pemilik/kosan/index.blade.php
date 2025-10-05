@extends('themepemilik.default')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Kosan</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('kosan.create') }}" class="btn btn-primary">+ Tambah Kosan</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Kosan</th>
                <th>Pemilik</th>
                <th>Hubungi</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Jumlah Kamar</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kosans as $index => $k)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->pemilik }}</td>
                    <td>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $k->hubungi) }}" target="_blank" class="btn btn-sm btn-success">
                            {{ $k->hubungi }}
                        </a>
                    </td>
                    <td>{{ $k->alamat }}</td>
                    <td>Rp {{ number_format($k->harga, 0, ',', '.') }}</td>
                    <td>{{ $k->jumlah_kamar }}</td>
                    <td>
                        @if($k->foto)
                            <img src="{{ asset('storage/'.$k->foto) }}" width="100">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada kosan terdaftar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
