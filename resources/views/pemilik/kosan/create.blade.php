@extends('themepemilik.default')

@section('content')
<div class="container-fluid py-5">
    <div class="card shadow-lg rounded-4 p-5" style="width: 100%; margin: 0 15px;">
        <h2 class="mb-5 text-center fw-bold">Form Pendaftaran Kosan</h2>

        {{-- Error validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali inputan Anda:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kosan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                {{-- Kolom kiri --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-bold">Nama Kosan</label>
                        <input type="text" class="form-control form-control-lg" id="nama" name="nama" placeholder="Masukkan nama kosan" required>
                    </div>

                    <div class="mb-3">
                        <label for="pemilik" class="form-label fw-bold">Nama Pemilik</label>
                        <input type="text" class="form-control form-control-lg" id="pemilik" name="pemilik" placeholder="Masukkan nama pemilik" required>
                    </div>

                    <div class="mb-3">
                        <label for="hubungi" class="form-label fw-bold">Hubungi (No HP/WA)</label>
                        <input type="text" class="form-control form-control-lg" id="hubungi" name="hubungi" placeholder="0812xxxxxx" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-bold">Alamat</label>
                        <textarea class="form-control form-control-lg" id="alamat" name="alamat" rows="5" placeholder="Masukkan alamat kosan" required></textarea>
                    </div>
                </div>

                {{-- Kolom kanan --}}
                <div class="col-md-6">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="harga" class="form-label fw-bold">Harga Sewa / Bulan</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" class="form-control form-control-lg" id="harga" name="harga" placeholder="Contoh: 1.500.000" required oninput="formatRupiah(this)">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="jumlah_kamar" class="form-label fw-bold">Jumlah Kamar</label>
                            <input type="number" class="form-control form-control-lg" id="jumlah_kamar" name="jumlah_kamar" placeholder="Jumlah kamar" required>
                        </div>
                    </div>

                    {{-- Row Luas Tanah & Nomor Kamar sejajar --}}
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="luas_tanah" class="form-label fw-bold">Luas Tanah (m²)</label>
                            <input type="number" class="form-control form-control-lg" id="luas_tanah" name="luas_tanah" placeholder="Contoh: 120" required>
                        </div>

                        <div class="col-md-6">
                            <label for="nomor_kamar" class="form-label fw-bold">Nomor Kamar</label>
                            <input type="text" class="form-control form-control-lg" id="nomor_kamar" name="nomor_kamar" placeholder="Contoh: A1,A2,B1">
                            <small class="text-muted">Pisahkan dengan koma jika lebih dari 1</small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Fasilitas</label>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach (['AC','Kipas Angin','Lemari','Kasur','Parkiran Motor','Parkiran Mobil','Dapur','Wifi','Kamar Mandi Dalam','Lainnya'] as $f)
                                <div style="width: calc(33.333% - 10px);" class="mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fasilitas[]" value="{{ $f }}" id="fasilitas_{{ strtolower(str_replace(' ','',$f)) }}">
                                        <label class="form-check-label" for="fasilitas_{{ strtolower(str_replace(' ','',$f)) }}">{{ $f }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label fw-bold">Foto Kosan</label>
                        <input type="file" class="form-control form-control-lg" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                        <div class="mt-2">
                            <img id="preview" src="#" alt="Preview Foto" class="img-fluid rounded shadow-sm d-none" style="max-height: 250px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('kosan.index') }}" class="btn btn-outline-secondary btn-lg px-4">Kembali</a>
                <button type="submit" class="btn btn-success btn-lg px-5">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
function formatRupiah(input) {
    let value = input.value.replace(/\D/g,'');
    input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function previewImage(event) {
    const preview = document.getElementById('preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.classList.remove('d-none');
}
</script>
@endsection
