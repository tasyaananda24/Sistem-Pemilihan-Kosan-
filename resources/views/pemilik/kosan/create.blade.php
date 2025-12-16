@extends('themepemilik.default')

@section('content')

<style>
    .input-big {
        height: 58px !important;
        font-size: 1.05rem !important;
        padding: 12px 16px !important;
        border-radius: 12px !important;
    }

    .dropdown-grey {
        background-color: #f4f4f4 !important;
        border-color: #d0d0d0 !important;
        color: #333 !important;
    }

    .dropdown-grey:focus {
        background-color: #e3e3e3 !important;
        border-color: #999 !important;
        box-shadow: none !important;
    }

    label {
        font-weight: 600;
        font-size: 1rem;
    }

    .card {
        border-radius: 16px !important;
    }

    .header-grey {
        background-color: #6c757d !important; /* Abu-abu elegan */
        color: white !important;
    }
</style>

<div class="container-fluid px-4">

    <div class="card shadow-lg border-0 mt-4 w-100">
        <div class="card-header header-grey py-3">
            <h4 class="mb-0">
                <i class="fas fa-plus-circle me-2"></i> Tambah Data Kosan
            </h4>
        </div>

        <div class="card-body px-4 py-4">

            <form action="{{ route('pemilik.kosan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- ROW 1 -->
                <div class="row mb-4">

                    <div class="col-md-6 mb-3">
                        <label>Nama Kosan</label>
                        <input type="text" 
                            name="nama_kosan" 
                            class="form-control input-big"
                            placeholder="Masukkan nama kosan"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Alamat Kosan</label>
                        <input type="text" 
                            name="alamat_kosan" 
                            class="form-control input-big"
                            placeholder="Masukkan alamat lengkap"
                            required>
                    </div>

                </div>

                <!-- NO HP -->
                <div class="mb-4">
                    <label>No HP Pemilik</label>
                    <input type="text" 
                        name="no_hp" 
                        class="form-control input-big"
                        placeholder="Contoh: 08123456789"
                        required>
                </div>

                <!-- HARGA -->
                <div class="mb-4">
                    <label>Harga Sewa (per bulan)</label>

                    <input type="text" 
                        id="harga_sewa_display"
                        class="form-control input-big"
                        placeholder="Contoh: 1.500.000"
                        required>

                    <input type="hidden" name="harga_sewa" id="harga_sewa">
                </div>

                <!-- JUMLAH KAMAR -->
                <div class="mb-4">
                    <label>Jumlah Kamar</label>
                    <input type="number" 
                        name="jumlah_kamar" 
                        class="form-control input-big"
                        placeholder="Contoh: 10"
                        required>
                </div>

                <!-- ROW DROPDOWN -->
                <div class="row mb-4">

                    <div class="col-md-4 mb-3">
                        <label>Jarak ke Kampus</label>
                        <select name="jarak_ke_kampus" class="form-select input-big dropdown-grey" required>
                            <option value="">-- Pilih Jarak --</option>
                            <option value="200">Sangat dekat (≤ 200 m)</option>
                            <option value="500">Dekat (200–500 m)</option>
                            <option value="1000">Menengah (500–1000 m)</option>
                            <option value="2000">Jauh (1–2 km)</option>
                            <option value="3000">Sangat jauh (> 2 km)</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Fasilitas</label>
                        <select name="fasilitas" class="form-select input-big dropdown-grey">
                            <option value="">-- Pilih Fasilitas --</option>
                            <option value="Lengkap">Fasilitas Lengkap</option>
                            <option value="Standar">Standar</option>
                            <option value="Minim">Minim</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Luas Tanah</label>
                        <select name="luas_tanah" class="form-select input-big dropdown-grey" required>
                            <option value="">-- Pilih Luas Tanah --</option>
                            <option value="10">Kecil (≤ 10 m²)</option>
                            <option value="20">Sedang (10–20 m²)</option>
                            <option value="30">Luas (20–30 m²)</option>
                            <option value="40">Sangat luas (> 30 m²)</option>
                        </select>
                    </div>

                </div>

                <!-- FOTO -->
                <div class="mb-4">
                    <label>Upload Foto Kosan</label>
                    <input type="file" 
                        name="foto_kosan" 
                        class="form-control input-big">
                </div>

                <!-- BUTTONS -->
                <div class="d-flex justify-content-between mt-4">

                    <!-- BUTTON KEMBALI -->
                    <a href="{{ route('pemilik.kosan.index') }}" 
                    class="btn btn-secondary btn-lg px-5 py-3">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>

                    <!-- BUTTON SIMPAN -->
                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-save me-2"></i> Simpan Data
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<script>
    const displayInput = document.getElementById("harga_sewa_display");
    const hiddenInput = document.getElementById("harga_sewa");

    displayInput.addEventListener("input", function () {
        let angka = this.value.replace(/\D/g, "");  
        let format = angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        this.value = format;
        hiddenInput.value = angka;
    });
</script>

@endsection
