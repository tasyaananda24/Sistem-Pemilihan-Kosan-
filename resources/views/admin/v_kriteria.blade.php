@extends('themeadmin.default')

@section('title', 'Daftar Kriteria')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Kriteria</h1>
    <a href="{{ route('admin.kriteria.create') }}" class="btn" style="background-color:#8B4513; color:white;">
        Tambah Kriteria
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered custom-table" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                        <th>Atribut</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kriteria as $k)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $k->kode }}</td>
                        <td>{{ $k->nama_kriteria }}</td>
                        <td class="text-center">{{ number_format($k->bobot * 100, 2) }}%</td>
                        <td class="text-center">{{ ucfirst($k->atribut) }}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.kriteria.edit',$k->id) }}" 
                               class="btn" style="background-color:#8B4513; color:white;">
                                Edit
                            </a>
                            <form action="{{ route('admin.kriteria.destroy',$k->id) }}" method="POST" style="display:inline" class="form-hapus">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background-color:#dc3545; color:white;">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data kriteria.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Tambahkan SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Handle semua form hapus
    document.querySelectorAll('.form-hapus').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // stop submit

            Swal.fire({
                title: 'Yakin hapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // submit kalau OK
                }
            });
        });
    });
</script>
@endpush
