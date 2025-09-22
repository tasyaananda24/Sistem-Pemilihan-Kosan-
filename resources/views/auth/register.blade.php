@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" 
     style="background: url('{{ asset('assets/img/bglogin.jpg') }}') center center/cover no-repeat;">

    <div class="card p-5 shadow-lg rounded-4" style="width: 500px; max-width: 90%; background: rgba(255,255,255,0.25); backdrop-filter: blur(20px);">
        <h3 class="text-center mb-4 fw-bold text-dark" style="font-size: 2rem;">Register Pemilik</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama Lengkap -->
            <div class="mb-3 position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary">
                    <i class="bi bi-person"></i>
                </span>
                <input type="text" name="name" class="form-control ps-5" placeholder="Nama Lengkap" required>
                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <!-- Email -->
            <div class="mb-3 position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary">
                    <i class="bi bi-envelope"></i>
                </span>
                <input type="email" name="email" class="form-control ps-5" placeholder="Email" required>
                @error('email')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <!-- Password -->
            <div class="mb-3 position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary">
                    <i class="bi bi-lock"></i>
                </span>
                <input type="password" name="password" class="form-control ps-5" placeholder="Password" required>
                @error('password')<small class="text-danger">{{ $message }}</small>@enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3 position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary">
                    <i class="bi bi-lock-fill"></i>
                </span>
                <input type="password" name="password_confirmation" class="form-control ps-5" placeholder="Konfirmasi Password" required>
            </div>

            <!-- Nama Kosan -->
            <div class="mb-3 position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary">
                    <i class="bi bi-house"></i>
                </span>
                <input type="text" name="nama_kosan" class="form-control ps-5" placeholder="Nama Kosan" required>
            </div>

            <!-- Alamat Kosan -->
            <div class="mb-4 position-relative">
                <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary">
                    <i class="bi bi-geo-alt"></i>
                </span>
                <input type="text" name="alamat_kosan" class="form-control ps-5" placeholder="Alamat Kosan" required>
            </div>

            <!-- Button Register -->
            <button class="btn btn-primary w-100 mb-3 py-2" type="submit">Register</button>

            <!-- Link Login -->
            <p class="text-center text-info">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-decoration-none text-info fw-bold">Login</a>
            </p>
        </form>
    </div>
</div>

<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f0f0;
    }
    .form-control {
        border-radius: 50px;
        padding: 1rem 1.25rem;
        border: 1px solid rgba(0,0,0,0.2);
        background: rgba(255,255,255,0.8);
        font-size: 1rem;
    }
    .form-control:focus {
        border-color: #6e8efb;
        box-shadow: 0 0 10px rgba(110,142,251,0.5);
        background: rgba(255,255,255,0.95);
    }
    .btn-primary {
        background-color: #6e8efb;
        border: none;
        border-radius: 50px;
        transition: all 0.3s ease;
        font-weight: 600;
    }
    .btn-primary:hover {
        background-color: #5a6ddb;
        transform: translateY(-2px);
    }
</style>
@endsection
