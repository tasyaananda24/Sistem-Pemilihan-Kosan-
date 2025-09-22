<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Dashboard Admin (tanpa middleware)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // pastikan view ini ada
})->name('admin.dashboard');

// Dashboard Pemilik (tanpa middleware)
Route::get('/pemilik/dashboard', function () {
    return view('pemilik.dashboard'); // pastikan view ini ada
})->name('pemilik.dashboard');
