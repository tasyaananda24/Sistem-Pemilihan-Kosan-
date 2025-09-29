@extends('themepemilik.default')

@section('title', 'Status Pendaftaran')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Status Pendaftaran Properti</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered custom-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Properti</th>
                        <th>Tipe</th>
                        <th>Penanggung Jawab</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $d)
                    <tr>
                        <td>{{ $d['id_pendaftaran'] }}</td>
                        <td>{{ $d['nama_properti'] }}</td>
                        <td>{{ $d['tipe_properti'] }}</td>
                        <td>{{ $d['penanggung_jawab'] }}</td>
                        <td>{{ $d['email'] }}</td>
                        <td>{{ $d['no_telepon'] }}</td>
                        <td>{{ $d['alamat'] }}</td>
                        <td>
                            <span class="badge status-badge {{ $d['status'] }}">
                                {{ ucfirst($d['status']) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada data pendaftaran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
