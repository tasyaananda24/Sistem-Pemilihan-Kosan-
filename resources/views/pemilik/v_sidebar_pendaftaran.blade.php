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
                <h4 class="text-success">1. Informasi Umum</h4>
                <div class="form-group">
                    <label>Nama Properti</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tipe Properti</label>
                    <select class="form-control" required>
                        <option value="">Pilih</option>
                        <option>Kost</option>
                        <option>Kontrakan</option>
                        <option>Guest House</option>
                    </select>
                </div>
                <button type="button" class="btn btn-success next-step">Lanjut</button>
            </div>

            <!-- Step 2 -->
            <div class="step-content d-none" data-step="2">
                <h4 class="text-success">2. Detail Kontak</h4>
                <div class="form-group">
                    <label>Penanggung Jawab</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control" required>
                </div>
                <button type="button" class="btn btn-secondary prev-step">Kembali</button>
                <button type="button" class="btn btn-success next-step">Lanjut</button>
            </div>

            <!-- Step 10 -->
            <div class="step-content d-none" data-step="10">
                <h4 class="text-success">10. Syarat & Ketentuan</h4>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="agree" required>
                    <label class="form-check-label" for="agree">
                        Saya telah membaca dan menyetujui Syarat & Ketentuan
                    </label>
                </div>
                <button type="button" class="btn btn-secondary prev-step">Kembali</button>
                <button type="submit" class="btn btn-success">Selesai</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* === SIDEBAR FORM STEPS === */
    #form-steps .list-group-item {
        border: none;
        border-left: 4px solid transparent;
        padding: 10px 15px;
        font-weight: 500;
        color: #5a5a5a;
        background-color: transparent;
        transition: all 0.3s ease;
    }
    #form-steps .list-group-item.active {
        background-color: #A3B18A !important;  /* hijau sage */
        border-left: 6px solid #8B5E3C !important; /* aksen coklat */
        color: #fff !important;
        font-weight: 600;
        border-radius: 8px;
    }
    #form-steps .list-group-item.disabled {
        pointer-events: none;
        background-color: #f0f0f0;
        color: #bbb;
    }
    #form-steps .list-group-item.text-primary {
        color: #8B5E3C;
        font-weight: 500;
    }
    #form-steps .list-group-item:hover:not(.disabled):not(.active) {
        background-color: #f0f4ef;
        color: #3a3a3a;
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
            const inputs = form.querySelectorAll('input[required], select[required]');
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
