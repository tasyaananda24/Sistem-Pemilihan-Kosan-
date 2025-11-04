<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\KosanController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\Admin\KosanAdminController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingController::class, 'index'])->name('home');
<<<<<<< HEAD
=======

Route::get('/kos/{id}', [KosanController::class, 'show'])->name('kos.detail');

>>>>>>> d963be8544d52d9857398f83c3fa9353e4ca66c9

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

    // Dashboard admin
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Halaman SPK
    Route::get('spk', [SawController::class, 'index'])->name('spk.index');

    // Verifikasi Kosan Admin
    Route::controller(KosanAdminController::class)->group(function () {
        Route::get('kosan/verifikasi', 'index')->name('kosan.verifikasi'); // list kosan pending
        Route::post('kosan/verifikasi/{id}', 'verifikasi')->name('kosan.verifikasi.update'); // approve / reject

        // Tampilkan semua kosan yang sudah di-approve (Admin)
        Route::get('kosan/approved', 'approved')->name('kosan.approved'); // halaman admin kosan approved
    });

    // Kriteria & Penilaian (SPK)
    Route::resource('kriteria', \App\Http\Controllers\Admin\KriteriaController::class)
         ->parameters(['kriteria' => 'kriteria']);

    Route::get('penilaian/create', [\App\Http\Controllers\Admin\PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('penilaian/store', [\App\Http\Controllers\Admin\PenilaianController::class, 'store'])->name('penilaian.store');
});


/*
|--------------------------------------------------------------------------
| Dashboard & Menu Pemilik
|--------------------------------------------------------------------------
*/
Route::prefix('pemilik')->name('pemilik.')->group(function () {

    // Dashboard utama pemilik
    Route::get('dashboard', [PemilikController::class, 'dashboard'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | CRUD Kosan (Pemilik)
    |--------------------------------------------------------------------------
    */
    Route::controller(KosanController::class)->group(function () {
        Route::get('kosan', 'index')->name('kosan.index'); // hanya kosan approved milik pemilik
        Route::get('kosan/create', 'create')->name('kosan.create');
        Route::post('kosan', 'store')->name('kosan.store');
        Route::get('kosan/{id}/edit', 'edit')->name('kosan.edit');
        Route::put('kosan/{id}', 'update')->name('kosan.update');
        Route::delete('kosan/{id}', 'destroy')->name('kosan.destroy');

        // Menu status verifikasi pemilik (hanya melihat status, tidak approve/reject)
        Route::get('kosan/verifikasi', 'verifikasiIndex')->name('kosan.verifikasi'); 
    });
});
