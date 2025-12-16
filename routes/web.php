<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\KosanController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\KosanAdminController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Halaman Utama (Landing Page)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('home');

/* ================= TAMBAHAN SEARCH & FILTER ================= */
Route::get('/search', [LandingController::class, 'search'])->name('kos.search');

/* ================= DETAIL KOS ================= */
Route::get('/kos/{id}', [KosanController::class, 'show'])->name('kos.detail');

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'showLogin')->name('login');
    Route::post('login', 'login')->name('login.post');

    Route::get('register', 'showRegister')->name('register');
    Route::post('register', 'register')->name('register.post');

    Route::post('logout', 'logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Dashboard Admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('spk', [SawController::class, 'index'])->name('spk.index');
    Route::get('laporan', [SawController::class, 'laporan'])->name('laporan.index');

    Route::controller(KosanAdminController::class)->group(function () {
        Route::get('kosan/verifikasi', 'index')->name('kosan.verifikasi');
        Route::post('kosan/verifikasi/{id}', 'verifikasi')->name('kosan.verifikasi.update');
        Route::get('kosan/approved', 'approved')->name('kosan.approved');
    });

    Route::resource('kriteria', \App\Http\Controllers\Admin\KriteriaController::class)
         ->parameters(['kriteria' => 'kriteria']);

    Route::get('penilaian/create', [\App\Http\Controllers\Admin\PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('penilaian/store', [\App\Http\Controllers\Admin\PenilaianController::class, 'store'])->name('penilaian.store');
});

/*
|--------------------------------------------------------------------------
| Dashboard Pemilik
|--------------------------------------------------------------------------
*/
Route::prefix('pemilik')->name('pemilik.')->group(function () {

    Route::get('dashboard', [PemilikController::class, 'dashboard'])->name('dashboard');

    Route::controller(KosanController::class)->group(function () {
        Route::get('kosan', 'index')->name('kosan.index');
        Route::get('kosan/create', 'create')->name('kosan.create');
        Route::post('kosan', 'store')->name('kosan.store');
        Route::get('kosan/{id}/edit', 'edit')->name('kosan.edit');
        Route::put('kosan/{id}', 'update')->name('kosan.update');
        Route::delete('kosan/{id}', 'destroy')->name('kosan.destroy');
        Route::get('kosan/verifikasi', 'verifikasiIndex')->name('kosan.verifikasi'); 
    });
});
