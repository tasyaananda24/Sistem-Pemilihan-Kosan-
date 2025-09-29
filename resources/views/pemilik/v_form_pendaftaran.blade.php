@extends('themepemilik.default')

@section('title', 'Formulir Pendaftaran Properti')

@section('content')
<div class="row">
    <!-- Sidebar Step -->
    <div class="col-md-3">
        <ul class="list-group" id="form-steps">
            <li class="list-group-item active" data-step="1">1. Informasi Umum</li>
            <li class="list-group-item disabled text-muted" data-step="2">2. Detail Kontak</li>
            <li class="list-group-item disabled text-muted" data-step="3">3. Informasi Properti</li>
            <li class="list-group-item disabled text-muted" data-step="4">4. Fasilitas</li>
            <li class="list-group-item disabled text-muted" data-step="5">5. Detail Kamar</li>
            <li class="list-group-item disabled text-muted" data-step="6">6. Foto Properti</li>
            <li class="list-group-item disabled text-muted" data-step="7">7. Kebijakan Umum</li>
            <li class="list-group-item disabled text-muted" data-step="8">8. Detail Pembayaran</li>
            <li class="list-group-item disabled text-muted" data-step="9">9. Verifikasi Identitas</li>
            <li class="list-group-item disabled text-muted" data-step="10">10. Syarat & Ketentuan</li>
        </ul>
    </div>

    <!-- Form Content -->
    <div class="col-md-9">
        <form id="pendaftaranForm">
            <!-- Step 1 -->
            <div class="step-content" data-step="1">
                <h4 class="step-title">1. Informasi Umum</h4>
                <div class="form-group mb-3">
                    <label>Nama Properti</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Tipe Properti</label>
                    <select class="form-control" required>
                        <option value="">Pilih</option>
                        <option>Kost</option>
                        <option>Kontrakan</option>
                        <option>Guest House</option>
                    </select>
                </div>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 2 -->
            <div class="step-content d-none" data-step="2">
                <h4 class="step-title">2. Detail Kontak</h4>
                <div class="form-group mb-3">
                    <label>Penanggung Jawab</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" required>
                </div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 3 -->
            <div class="step-content d-none" data-step="3">
                <h4 class="step-title">3. Informasi Properti</h4>
                <div class="form-group mb-3"><label>Provinsi</label><input type="text" class="form-control" required></div>
                <div class="form-group mb-3"><label>Kabupaten/Kota</label><input type="text" class="form-control" required></div>
                <div class="form-group mb-3"><label>Kecamatan</label><input type="text" class="form-control" required></div>
                <div class="form-group mb-3"><label>Kelurahan/Desa</label><input type="text" class="form-control" required></div>
                <div class="form-group mb-3"><label>Kode Pos</label><input type="text" class="form-control" required></div>
                <div class="form-group mb-3"><label>Alamat Lengkap</label><textarea class="form-control" required></textarea></div>
                <div class="form-group mb-3"><label>Deskripsi</label><textarea class="form-control" rows="3" required></textarea></div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 4 (Fasilitas pakai icon) -->
            <div class="step-content d-none" data-step="4">
                <h4 class="step-title">4. Fasilitas</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-wifi"></i> WiFi</div>
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-tv"></i> TV</div>
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-shield-lock"></i> Security</div>
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-camera-video"></i> CCTV</div>
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-water"></i> Dispenser</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-cup-hot"></i> Ruang Makan</div>
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-house"></i> Gazebo</div>
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-tree"></i> Taman</div>
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-door-open"></i> Ruang Tamu</div>
                        <div class="form-check"><input type="checkbox"> <i class="bi bi-moon-stars"></i> Mushola</div>
                    </div>
                </div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 5 -->
            <div class="step-content d-none" data-step="5">
                <h4 class="step-title">5. Detail Kamar</h4>
                <div class="form-group mb-3"><label>Jumlah Kamar</label><input type="number" class="form-control" required></div>
                <div class="form-group mb-3"><label>Luas Kamar</label><input type="text" class="form-control" required></div>
                <div class="form-group mb-3"><label>Fasilitas Kamar</label><textarea class="form-control" rows="2"></textarea></div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 6 -->
            <div class="step-content d-none" data-step="6">
                <h4 class="step-title">6. Foto Properti</h4>
                <div class="form-group mb-3"><label>Upload Foto</label><input type="file" class="form-control" multiple></div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 7 -->
            <div class="step-content d-none" data-step="7">
                <h4 class="step-title">7. Kebijakan Umum</h4>
                <div class="form-group mb-3"><label>Kebijakan Penghuni</label><textarea class="form-control" rows="3"></textarea></div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 8 -->
            <div class="step-content d-none" data-step="8">
                <h4 class="step-title">8. Detail Pembayaran</h4>
                <div class="form-group mb-3"><label>Harga Sewa per Bulan</label><input type="number" class="form-control" required></div>
                <div class="form-group mb-3"><label>Metode Pembayaran</label>
                    <select class="form-control" required>
                        <option>Transfer Bank</option>
                        <option>Cash</option>
                        <option>E-Wallet</option>
                    </select>
                </div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 9 -->
            <div class="step-content d-none" data-step="9">
                <h4 class="step-title">9. Verifikasi Identitas</h4>
                <div class="form-group mb-3"><label>Upload KTP</label><input type="file" class="form-control" required></div>
                <div class="form-group mb-3"><label>Upload NPWP (opsional)</label><input type="file" class="form-control"></div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="button" class="btn btn-sage next-step">Lanjut</button>
            </div>

            <!-- Step 10 -->
            <div class="step-content d-none" data-step="10">
                <h4 class="step-title">10. Syarat & Ketentuan</h4>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="agree" required>
                    <label class="form-check-label" for="agree">Saya telah membaca dan menyetujui Syarat & Ketentuan</label>
                </div>
                <button type="button" class="btn btn-brown prev-step">Kembali</button>
                <button type="submit" class="btn btn-brown">Selesai</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
    #form-steps .list-group-item.active {
        background-color: #A3B18A !important;
        border-color: #A3B18A !important;
        color: #fff !important;
        font-weight: bold;
        border-radius: 8px;
    }
    #form-steps .list-group-item.disabled {
        pointer-events: none;
        background-color: #f1f1f1;
        color: #bbb;
    }
    #form-steps .list-group-item.text-primary {
        color: #8B5E3C !important;
        font-weight: 600;
    }
    .step-title {
        color: #8B5E3C;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .btn-sage {
        background-color: #A3B18A;
        border-color: #A3B18A;
        color: #fff;
        border-radius: 30px;
    }
    .btn-sage:hover {
        background-color: #8B5E3C;
        border-color: #8B5E3C;
    }
    .btn-brown {
        background-color: #8B5E3C;
        border-color: #8B5E3C;
        color: #fff;
        border-radius: 30px;
    }
    .btn-brown:hover {
        background-color: #6d412a;
        border-color: #6d412a;
    }
    .step-content {
        opacity: 0;
        transform: translateX(20px);
        transition: all 0.4s ease;
        display: none;
    }
    .step-content.active-step {
        display: block !important;
        opacity: 1;
        transform: translateX(0);
    }
</style>
@endpush

@push('scripts')
<script>
    let currentStep = 1;
    function showStep(step) {
        document.querySelectorAll('.step-content').forEach(el => {
            el.classList.remove('active-step');
            el.style.display = 'none';
        });
        const target = document.querySelector(`.step-content[data-step="${step}"]`);
        target.style.display = 'block';
        setTimeout(() => target.classList.add('active-step'), 10);
        document.querySelectorAll('#form-steps .list-group-item').forEach(el => {
            el.classList.remove('active');
        });
        document.querySelector(`#form-steps .list-group-item[data-step="${step}"]`).classList.add('active');
    }
    function unlockStep(step) {
        const item = document.querySelector(`#form-steps .list-group-item[data-step="${step}"]`);
        item.classList.remove('disabled', 'text-muted');
        item.classList.add('text-primary');
    }
    document.querySelectorAll('.next-step').forEach(btn => {
        btn.addEventListener('click', () => {
            const form = btn.closest('.step-content');
            const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
            let valid = true;
            inputs.forEach(input => {
                if (!input.value) {
                    valid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            if (valid) {
                currentStep++;
                unlockStep(currentStep);
                showStep(currentStep);
            }
        });
    });
    document.querySelectorAll('.prev-step').forEach(btn => {
        btn.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });
    document.querySelectorAll('#form-steps .list-group-item').forEach(item => {
        item.addEventListener('click', () => {
            if (!item.classList.contains('disabled')) {
                currentStep = parseInt(item.dataset.step);
                showStep(currentStep);
            }
        });
    });
    showStep(currentStep);
</script>
@endpush
