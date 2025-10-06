@extends('themeadmin.default')

@section('title', isset($kriteria) ? 'Edit Kriteria' : 'Tambah Kriteria')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        {{ isset($kriteria) ? 'Edit Kriteria' : 'Tambah Kriteria' }}
    </h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ isset($kriteria) ? route('admin.kriteria.update', $kriteria->id) : route('admin.kriteria.store') }}" method="POST">
            @csrf
            @if(isset($kriteria))
                @method('PUT')
            @endif

            <!-- Input Kode -->
            <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" id="kode" name="kode" class="form-control"
                       value="{{ old('kode', $kriteria->kode ?? '') }}" required>
                @error('kode')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Input Nama Kriteria -->
            <div class="mb-3">
                <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                <input type="text" id="nama_kriteria" name="nama_kriteria" class="form-control" 
                       value="{{ old('nama_kriteria', $kriteria->nama_kriteria ?? '') }}" required>
                @error('nama_kriteria')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Input Bobot dalam persen -->
            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot (%)</label>
                <div class="input-group">
                    <input type="number" id="bobot" step="0.01" name="bobot" class="form-control" 
                        value="{{ old('bobot', isset($kriteria) ? $kriteria->bobot * 100 : '') }}" required>
                    <span class="input-group-text">%</span>
                </div>
                <small class="form-text text-muted">
                    Masukkan bobot dalam persen. Contoh: <strong>20</strong> berarti <strong>20%</strong>.
                </small>
                @error('bobot')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Pilihan Atribut -->
            <div class="mb-3">
                <label for="atribut" class="form-label">Atribut</label>
                <select id="atribut" name="atribut" class="form-control" required>
                    <option value="">-- Pilih Atribut --</option>
                    <option value="cost" {{ old('atribut', $kriteria->atribut ?? '') == 'cost' ? 'selected' : '' }}>Cost</option>
                    <option value="benefit" {{ old('atribut', $kriteria->atribut ?? '') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                </select>
                @error('atribut')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Tombol -->
            <div class="d-flex mt-4">
                <a href="{{ route('admin.kriteria.index') }}" class="btn btn-custom-green">Kembali</a>
                <button type="submit" class="btn btn-custom-brown ms-3">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Tombol Hijau untuk Kembali */
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

    /* Tombol Coklat untuk Simpan/Edit */
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
</style>
@endpush
