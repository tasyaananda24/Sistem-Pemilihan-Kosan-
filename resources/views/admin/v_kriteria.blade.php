@extends('themeadmin.default')

@section('title', 'Daftar Kriteria')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Kriteria</h1>

    @if($totalBobot < 1)
        <a href="{{ route('admin.kriteria.create') }}" class="btn btn-custom-green">
            Tambah Kriteria
        </a>
    @else
        <button class="btn btn-secondary" disabled>
            Total bobot sudah 100%
        </button>
    @endif
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <p><strong>Total Bobot:</strong> {{ number_format($totalBobot * 100, 2) }}%</p>

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
                            <a href="{{ route('admin.kriteria.edit',$k->id) }}" class="btn btn-custom-brown">
                                Edit
                            </a>
                            <form action="{{ route('admin.kriteria.destroy',$k->id) }}" method="POST" style="display:inline" class="form-hapus">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-custom-red">
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

@push('styles')
<style>
    /* Tombol Hijau untuk Tambah */
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

    /* Tombol Coklat untuk Edit */
    .btn-custom-brown {
        background-color: #8B4513;
        color: #FFFBF2;
        border-radius: 25px;
        padding: 8px 20px;
        font-weight: 500;
        border: 1px solid #8B4513;
        transition: 0.3s;
    }
    .btn-custom-brown:hover {
        background-color: #7C3E1D;
        color: #FFFBF2;
        border: 1px solid #7C3E1D;
    }

    /* Tombol Merah untuk Hapus */
    .btn-custom-red {
        background-color: #dc3545;
        color: #FFFBF2;
        border-radius: 25px;
        padding: 8px 20px;
        font-weight: 500;
        border: 1px solid #dc3545;
        transition: 0.3s;
    }
    .btn-custom-red:hover {
        background-color: #c82333;
        color: #FFFBF2;
        border: 1px solid #c82333;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.querySelectorAll('.form-hapus').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

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
                    form.submit();
                }
            });
        });
    });
</script>
@endpush
