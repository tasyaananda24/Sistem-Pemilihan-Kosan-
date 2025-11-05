@extends('themepemilik.default')

@section('content')
<div class="container-fluid py-5" style="background-color: #e9ecef; min-height: 100vh;">
    <div class="card shadow-lg border-0 mx-auto" style="border-radius: 1rem; max-width: 1000px;">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-5">
                <h2 class="text-dark fw-bolder mb-2">🏠 Form Pendaftaran Kos</h2>
                <p class="text-secondary">Lengkapi informasi di bawah ini untuk mendaftarkan kos Anda. Pastikan semua data akurat!</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4" role="alert">
                    <h5 class="alert-heading fs-6 fw-bold">Perhatian!</h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('pemilik.kosan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-12">
                        <h5 class="fw-bold text-primary border-bottom pb-2 mb-3">Informasi Utama Kos</h5>
                    </div>

                    <div class="col-md-6">
                        <label for="nama_kosan" class="form-label fw-semibold">Nama Kos</label>
                        <input type="text" id="nama_kosan" name="nama_kosan" class="form-control form-control-lg @error('nama_kosan') is-invalid @enderror" placeholder="Masukkan nama kos" value="{{ old('nama_kosan') }}" required>
                        @error('nama_kosan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="harga_sewa" class="form-label fw-semibold">Harga Sewa / Bulan</label>
                        <div class="input-group input-group-lg @error('harga_sewa') is-invalid @enderror">
                            <span class="input-group-text bg-light border-end-0 text-dark fw-bold">Rp</span>
                            <input type="text" id="harga_sewa" name="harga_sewa" class="form-control border-start-0 @error('harga_sewa') is-invalid @enderror" placeholder="Contoh: 1.200.000" value="{{ old('harga_sewa') }}" required oninput="formatRupiah(this)">
                        </div>
                        @error('harga_sewa') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="no_hp" class="form-label fw-semibold">No. HP / WhatsApp</label>
                        <input type="text" id="no_hp" name="no_hp" class="form-control form-control-lg @error('no_hp') is-invalid @enderror" placeholder="0812xxxxxxx" value="{{ old('no_hp') }}" required>
                        @error('no_hp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12 mt-4">
                        <h5 class="fw-bold text-primary border-bottom pb-2 mb-3">Detail Properti</h5>
                    </div>

                    <div class="col-md-4">
                        <label for="jumlah_kamar" class="form-label fw-semibold">Jumlah Kamar Total</label>
                        <input type="number" id="jumlah_kamar" name="jumlah_kamar" class="form-control @error('jumlah_kamar') is-invalid @enderror" placeholder="Jumlah kamar" min="1" value="{{ old('jumlah_kamar') }}" required>
                        @error('jumlah_kamar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="luas_tanah" class="form-label fw-semibold">Luas Kamar (Rata-rata)</label>
                        <select id="luas_tanah" name="luas_tanah" class="form-select @error('luas_tanah') is-invalid @enderror" required>
                            <option value="">-- Pilih Luas Kamar --</option>
                            <option value="3x3 m²" {{ old('luas_tanah') == '3x3 m²' ? 'selected' : '' }}>3x3 m²</option>
                            <option value="3x5 m²" {{ old('luas_tanah') == '3x5 m²' ? 'selected' : '' }}>3x5 m²</option>
                            <option value="4x6 m²" {{ old('luas_tanah') == '4x6 m²' ? 'selected' : '' }}>4x6 m²</option>
                            <option value="4x7 m²" {{ old('luas_tanah') == '4x7 m²' ? 'selected' : '' }}>4x7 m²</option>
                            <option value="5x8 m²" {{ old('luas_tanah') == '5x8 m²' ? 'selected' : '' }}>5x8 m²</option>
                        </select>
                        @error('luas_tanah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="jarak_ke_kampus" class="form-label fw-semibold">Jarak ke Kampus</label>
                        <select id="jarak_ke_kampus" name="jarak_ke_kampus" class="form-select @error('jarak_ke_kampus') is-invalid @enderror" required>
                            <option value="">-- Pilih Jarak Kos ke Kampus --</option>
                            <option value="<= 1000 m" {{ old('jarak_ke_kampus') == '<= 1000 m' ? 'selected' : '' }}><= 1000 m (Sangat Dekat)</option>
                            <option value="> 1000 m <=1500 m" {{ old('jarak_ke_kampus') == '> 1000 m <=1500 m' ? 'selected' : '' }}> > 1000 m s/d 1500 m</option>
                            <option value="> 1500 m <=2000 m" {{ old('jarak_ke_kampus') == '> 1500 m <=2000 m' ? 'selected' : '' }}> > 1500 m s/d 2000 m</option>
                            <option value="> 2000 m <= 2500 m" {{ old('jarak_ke_kampus') == '> 2000 m <= 2500 m' ? 'selected' : '' }}> > 2000 m s/d 2500 m</option>
                            <option value=">= 2500 m" {{ old('jarak_ke_kampus') == '>= 2500 m' ? 'selected' : '' }}>>= 2500 m (Jauh)</option>
                        </select>
                        @error('jarak_ke_kampus') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-8">
                        <label for="fasilitas" class="form-label fw-semibold">Fasilitas Kos</label>
                        <select id="fasilitas" name="fasilitas" class="form-select @error('fasilitas') is-invalid @enderror" required>
                            <option value="">-- Pilih Fasilitas --</option>
                            <option value="Kamar Mandi Dalam, 1 Kamar" {{ old('fasilitas') == 'Kamar Mandi Dalam, 1 Kamar' ? 'selected' : '' }}>Kamar Mandi Dalam, 1 Kamar Kosong</option>
                            <option value="Kamar Mandi Dalam, 1 Kamar, Kasur" {{ old('fasilitas') == 'Kamar Mandi Dalam, 1 Kamar, Kasur' ? 'selected' : '' }}>Kamar Mandi Dalam, 1 Kamar + Kasur</option>
                            <option value="Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 1 Kamar, 1 Ruangan" {{ old('fasilitas') == 'Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 1 Kamar, 1 Ruangan' ? 'selected' : '' }}>Semi-Studio</option>
                            <option value="Wifi, Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 1 Kamar, 1 Ruangan" {{ old('fasilitas') == 'Wifi, Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 1 Kamar, 1 Ruangan' ? 'selected' : '' }}>Full Studio</option>
                            <option value="Wifi, Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 2 Kamar, 1 Ruangan, Lemari, AC" {{ old('fasilitas') == 'Wifi, Kamar Mandi Dalam, Kasur, Dapur, Tempat Parkir Motor, 2 Kamar, 1 Ruangan, Lemari, AC' ? 'selected' : '' }}>2 Kamar Lengkap</option>
                        </select>
                        @error('fasilitas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="foto_kosan" class="form-label fw-semibold">Foto Kos (Maks. 2MB)</label>
                        <input type="file" id="foto_kosan" name="foto_kosan" class="form-control @error('foto_kosan') is-invalid @enderror" accept="image/*">
                        @error('foto_kosan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label for="alamat_kosan" class="form-label fw-semibold">Alamat Kos Lengkap</label>
                        <textarea id="alamat_kosan" name="alamat_kosan" class="form-control @error('alamat_kosan') is-invalid @enderror" rows="3" placeholder="Jl. Sudirman No. 12, Kel. Sukamaju" required>{{ old('alamat_kosan') }}</textarea>
                        @error('alamat_kosan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <a href="{{ route('pemilik.kosan.index') }}" class="btn btn-outline-secondary px-4 py-2"><i class="bi bi-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn text-white fw-bold px-5 py-2 shadow-sm" style="background-color: #8c6239; border: none;"><i class="bi bi-house-door-fill me-2"></i> Simpan Kos Baru</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function formatRupiah(input) {
    let value = input.value.replace(/\D/g, '');
    if (value) {
        input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    } else {
        input.value = '';
    }
}
</script>
@endsection
