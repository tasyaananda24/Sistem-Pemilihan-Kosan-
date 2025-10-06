@extends('layouts.app')

@section('title', 'KosFinder - Beranda')

@section('content')

  <!-- Header dengan gambar + search -->
  <section class="header-hero">
    <div class="search-box">
      <div class="row g-3">
        <div class="col-md-3">
          <select class="form-select">
            <option>Harga</option>
            <option>< 500k</option>
            <option>500k - 800k</option>
            <option>> 800k</option>
          </select>
        </div>
        <div class="col-md-3">
          <select class="form-select">
            <option>Jarak</option>
            <option>< 500m</option>
            <option>500m - 1km</option>
            <option>> 1km</option>
          </select>
        </div>
        <div class="col-md-3">
          <select class="form-select">
            <option>Fasilitas</option>
            <option>AC</option>
            <option>WiFi</option>
            <option>Laundry</option>
          </select>
        </div>
        <div class="col-md-3">
          <button class="btn btn-success w-100"><i class="bi bi-search"></i> Cari Kost</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Rekomendasi Kos -->
  <section class="py-5">
    <div class="container">
      <h2 class="fw-bold text-center mb-4" style="color:#8B5E3C;">Rekomendasi Kost</h2>
      <div class="row">
        @for ($i=1; $i<=3; $i++)
        <div class="col-md-4 mb-4">
          <div class="card card-kos shadow-sm">
            <img src="{{ asset('assets/img/kos'.$i.'.jpg') }}" class="card-img-top" alt="Kos {{ $i }}">
            <div class="card-body text-center">
              <h5 class="fw-bold">Kos Putri Mawar</h5>
              <p class="text-muted">Rp {{ number_format(750000) }}/bulan</p>
              <a href="#" class="btn btn-outline-dark">Detail</a>
            </div>
          </div>
        </div>
        @endfor
      </div>
    </div>
  </section>

@endsection
