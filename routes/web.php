<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KosanController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth Routes
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // pastikan view ini ada
})->name('admin.dashboard');

// Dashboard Pemilik
Route::get('/pemilik/dashboard', function () {
    return view('pemilik.dashboard'); // pastikan view ini ada
})->name('pemilik.dashboard');

// // ✅ Route untuk CRUD Kosan (pemilik)
Route::prefix('pemilik')->group(function () {
    Route::get('kosan', [KosanController::class, 'index'])->name('kosan.index');   // tabel kosan
    Route::get('kosan/create', [KosanController::class, 'create'])->name('kosan.create'); // form tambah
    Route::post('kosan', [KosanController::class, 'store'])->name('kosan.store'); // simpan kosan
    Route::get('kosan/{id}/edit', [KosanController::class, 'edit'])->name('kosan.edit');  // edit kosan
    Route::put('kosan/{id}', [KosanController::class, 'update'])->name('kosan.update');  // update kosan
    Route::delete('kosan/{id}', [KosanController::class, 'destroy'])->name('kosan.destroy'); // hapus kosan

    // ✅ Tambahan: Verifikasi Kosan
    Route::get('kosan/verifikasi', [KosanController::class, 'verifikasiIndex'])->name('kosan.verifikasi'); 
    // menampilkan daftar kosan yang menunggu verifikasi

    Route::patch('kosan/{id}/verifikasi', [KosanController::class, 'verifikasi'])->name('kosan.verifikasi.update');
    // melakukan verifikasi kosan tertentu
});
