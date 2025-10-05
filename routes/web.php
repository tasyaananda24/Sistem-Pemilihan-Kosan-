<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\c_pendaftaran;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard Admin (sementara tanpa middleware)
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // pastikan view admin.dashboard ada
})->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Dashboard & Menu Pemilik (sementara tanpa middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('pemilik')->group(function () {
    // Dashboard utama
    Route::get('/dashboard', function () {
        return view('pemilik.dashboard'); // pastikan view pemilik.dashboard ada
    })->name('pemilik.dashboard');

    // Status Pendaftaran (tabel data)
    Route::get('/status-pendaftaran', [c_pendaftaran::class, 'status'])
        ->name('pemilik.statuspendaftaran');

    // Form Pendaftaran (tambah kosan)
    Route::get('/pendaftaran/create', [c_pendaftaran::class, 'create'])
        ->name('pendaftaran.create');
    Route::post('/pendaftaran', [c_pendaftaran::class, 'store'])
        ->name('pendaftaran.store');

    // (opsional) hapus data
    Route::delete('/pendaftaran/{id}', [c_pendaftaran::class, 'destroy'])
        ->name('pendaftaran.destroy');
});

Route::get('/admin/spk', [App\Http\Controllers\SawController::class, 'index'])->name('admin.spk.index');


// Route untuk pemilik kos
Route::get('/kos', [KosController::class, 'index'])->name('kos.index');
Route::get('/kos/create', [KosController::class, 'create'])->name('kos.create');
Route::post('/kos', [KosController::class, 'store'])->name('kos.store');

// Route untuk admin (verifikasi kos)
Route::get('/admin/kos/verifikasi', [KosController::class, 'verifikasi'])->name('admin.kos.verifikasi');
Route::post('/admin/kos/{id}/approve', [KosController::class, 'approve'])->name('admin.kos.approve');
Route::post('/admin/kos/{id}/reject', [KosController::class, 'reject'])->name('admin.kos.reject');


Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('kriteria', \App\Http\Controllers\Admin\KriteriaController::class);
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('penilaian/create', [\App\Http\Controllers\Admin\PenilaianController::class,'create'])->name('penilaian.create');
    Route::post('penilaian/store', [\App\Http\Controllers\Admin\PenilaianController::class,'store'])->name('penilaian.store');
});


