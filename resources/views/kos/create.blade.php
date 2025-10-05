@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Form Pendaftaran Kos</h3>
    <form action="{{ route('kos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kos</label>
            <input type="text" name="nama_kos" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jarak (km)</label>
            <input type="number" step="0.1" name="jarak" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Fasilitas (1-5)</label>
            <input type="number" name="fasilitas" min="1" max="5" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Luas (m²)</label>
            <input type="number" step="0.1" name="luas" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
@endsection
