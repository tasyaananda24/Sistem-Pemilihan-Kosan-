<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\KosanController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\PemilikController;

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
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Halaman SPK
    Route::get('spk', [SawController::class, 'index'])->name('spk.index');

    // Verifikasi Kos (Admin)
    Route::controller(KosController::class)->group(function () {
        Route::get('kos/verifikasi', 'verifikasi')->name('kos.verifikasi');
        Route::post('kos/{id}/approve', 'approve')->name('kos.approve');
        Route::post('kos/{id}/reject', 'reject')->name('kos.reject');
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
        Route::get('kosan', 'index')->name('kosan.index');
        Route::get('kosan/create', 'create')->name('kosan.create');
        Route::post('kosan', 'store')->name('kosan.store');
        Route::get('kosan/{id}/edit', 'edit')->name('kosan.edit');
        Route::put('kosan/{id}', 'update')->name('kosan.update');
        Route::delete('kosan/{id}', 'destroy')->name('kosan.destroy');
        Route::get('kosan/verifikasi', 'verifikasiIndex')->name('kosan.verifikasi');
        Route::patch('kosan/{id}/verifikasi', 'verifikasi')->name('kosan.verifikasi.update');
    });
});
