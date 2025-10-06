@extends('themeadmin.default')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Verifikasi Pendaftaran Kosan</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel Kosan Pending / Verifikasi --}}
    <div class="mb-5">
        <h4>Kosan Menunggu Verifikasi</h4>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
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
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $k->nama_kosan }}</td>
                            <td>{{ $k->alamat_kosan }}</td>
                            <td>Rp {{ number_format($k->harga_sewa,0,',','.') }}</td>
                            <td>{{ $k->jumlah_kamar }}</td>
                            <td>{{ $k->luas_tanah }}</td>
                            <td>{{ $k->jarak_ke_kampus }}</td>
                            <td>{{ $k->fasilitas }}</td>
                            <td>
                                @if($k->foto_kosan)
                                    <img src="{{ asset('storage/' . $k->foto_kosan) }}" alt="Foto Kosan" width="80">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.kosan.verifikasi.update', $k->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" name="status_verifikasi" value="approved" class="btn btn-success btn-sm mb-1">Approve</button>
                                    <button type="submit" name="status_verifikasi" value="rejected" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Belum ada kosan menunggu verifikasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Tabel Kosan Approved --}}
    <div>
        <h4>Kosan Sudah Di-Approve</h4>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
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
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $k->nama_kosan }}</td>
                            <td>{{ $k->alamat_kosan }}</td>
                            <td>Rp {{ number_format($k->harga_sewa,0,',','.') }}</td>
                            <td>{{ $k->jumlah_kamar }}</td>
                            <td>{{ $k->luas_tanah }}</td>
                            <td>{{ $k->jarak_ke_kampus }}</td>
                            <td>{{ $k->fasilitas }}</td>
                            <td>
                                @if($k->foto_kosan)
                                    <img src="{{ asset('storage/' . $k->foto_kosan) }}" alt="Foto Kosan" width="80">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-success">Approved</span>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Belum ada kosan yang di-approve</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
