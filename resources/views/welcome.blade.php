<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rekomendasi Kost</title>

  <!-- Bootstrap & JQuery -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /* ================= GLOBAL ================= */
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    /* ================= NAVBAR ================= */
    .navbar-custom {
      background-color: #1f2a40;
      padding: 15px 30px;
    }

    .navbar-brand {
      color: #fff;
      font-weight: 600;
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      width: 28px;
      margin-right: 8px;
    }

    .nav-btn {
      color: #fff;
      margin: 5px 10px;
      padding: 8px 18px;
      border-radius: 20px;
      text-decoration: none;
      transition: 0.3s;
    }

    .nav-btn:hover,
    .nav-btn.active {
      background-color: #ffc107;
      color: #000;
    }

    /* ================= HERO ================= */
    .hero-section {
      position: relative;
    }

    .hero-image {
      width: 100%;
      height: 420px;
      object-fit: cover;
    }

    /* ================= SEARCH BOX ================= */
    .rekomendasi-box {
      position: absolute;
      bottom: -40px;
      left: 50%;
      transform: translateX(-50%);
      background: #fff;
      width: 90%;
      max-width: 900px;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .box-title {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 15px;
      text-align: center;
    }

    .filter-btn {
      border: 1px solid #dee2e6;
      background: #f8f9fa;
      padding: 8px 18px;
      border-radius: 20px;
      margin: 5px;
      cursor: pointer;
      transition: 0.3s;
      font-weight: 500;
    }

    .filter-btn:hover,
    .filter-btn.active {
      background: #ffc107;
      border-color: #ffc107;
      color: #000;
    }

    .search-box {
      display: flex;
      align-items: center;
      background: #f8f9fa;
      padding: 8px 12px;
      border-radius: 30px;
      margin-top: 10px;
    }

    .search-box input {
      border: none;
      outline: none;
      background: transparent;
      flex: 1;
      padding: 8px 12px;
    }

    .search-btn {
      background: #1f2a40;
      color: #fff;
      border: none;
      padding: 8px 22px;
      border-radius: 25px;
      transition: 0.3s;
    }

    .search-btn:hover {
      background: #ffc107;
      color: #000;
    }

    /* ================= TITLE ================= */
    .section-title {
      text-align: center;
      margin-top: 90px;
    }

    .section-title h2 {
      font-weight: 700;
    }

    .section-title p {
      color: #6c757d;
    }

    /* ================= CARD ================= */
    .kos-card {
      border-radius: 15px;
      overflow: hidden;
      transition: 0.3s;
    }

    .kos-card:hover {
      transform: translateY(-5px);
    }

    .kos-card img {
      height: 200px;
      object-fit: cover;
    }

    .card-title {
      font-weight: 600;
    }

    .card-text {
      font-size: 14px;
      color: #555;
    }

    .btn-detail {
      background: #1f2a40;
      color: #fff;
      border-radius: 20px;
    }

    .btn-detail:hover {
      background: #ffc107;
      color: #000;
    }

    /* ================= MODAL ================= */
    .modal-content {
      border-radius: 15px;
    }

    .modal-header {
      background: #1f2a40;
      color: #fff;
    }

    .modal-header .close {
      color: #fff;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
      .hero-image {
        height: 300px;
      }

      .rekomendasi-box {
        position: static;
        transform: none;
        margin-top: 20px;
      }

      .section-title {
        margin-top: 40px;
      }
    }
  </style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-custom">
  <a class="navbar-brand" href="{{ url('/') }}">
    <img src="{{ asset('assets/material-symbols--home-work-rounded.svg') }}">
    KosFinder
  </a>

  <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon" style="filter: invert(100%);"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <a href="{{ url('/') }}" class="nav-btn active">Beranda</a>
    <a href="{{ route('login') }}" class="nav-btn">Login</a>
  </div>
</nav>

<!-- ================= HERO ================= -->
<section class="hero-section">
  <img src="{{ asset('assets/img/kosan.jpeg') }}" class="hero-image">

  <div class="rekomendasi-box">
    <div class="box-title">Rekomendasi Kost</div>

    <form action="{{ route('kos.search') }}" method="GET">
      <div class="text-center mb-2">
        <button type="submit" name="filter" value="harga" class="filter-btn {{ request('filter')=='harga'?'active':'' }}">Biaya</button>
        <button type="submit" name="filter" value="jarak" class="filter-btn {{ request('filter')=='jarak'?'active':'' }}">Jarak</button>
        <button type="submit" name="filter" value="fasilitas" class="filter-btn {{ request('filter')=='fasilitas'?'active':'' }}">Fasilitas</button>
        <button type="submit" name="filter" value="luas" class="filter-btn {{ request('filter')=='luas'?'active':'' }}">Luas</button>
      </div>

      <div class="search-box">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Cari nama kost, fasilitas, atau alamat">
        <button type="submit" class="search-btn">Cari Kost</button>
      </div>
    </form>
  </div>
</section>

<!-- ================= TITLE ================= -->
<div class="section-title">
  <h2>Rekomendasi Kost</h2>
  <p>Temukan kost terbaik sesuai kebutuhan dan budget.</p>
</div>

<!-- ================= LIST ================= -->
<div class="container mt-4">
  <div class="row">
    @forelse($koss as $kos)
    <div class="col-md-4 mb-4 d-flex">
      <div class="card kos-card w-100 shadow-sm">
        <img src="{{ $kos->foto_kosan ? asset('assets/img/'.$kos->foto_kosan) : asset('assets/img/default-kosan.jpg') }}">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">{{ $kos->nama_kosan }}</h5>
          <p class="card-text flex-grow-1">
            Harga: Rp {{ number_format($kos->harga_sewa,0,',','.') }}<br>
            Jarak: {{ $kos->jarak_ke_kampus }}<br>
            Luas: {{ $kos->luas_tanah }}<br>
            Fasilitas: {{ $kos->fasilitas }}
          </p>
          <button class="btn btn-detail mt-auto" data-toggle="modal" data-target="#detail{{ $kos->id }}">Detail</button>
        </div>
      </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="detail{{ $kos->id }}">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5>{{ $kos->nama_kosan }}</h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body row">
            <div class="col-md-6">
              <img src="{{ asset('assets/img/'.$kos->foto_kosan) }}" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
              <p><b>Harga:</b> Rp {{ number_format($kos->harga_sewa,0,',','.') }}</p>
              <p><b>Luas:</b> {{ $kos->luas_tanah }}</p>
              <p><b>Jarak:</b> {{ $kos->jarak_ke_kampus }}</p>
              <p><b>Fasilitas:</b> {{ $kos->fasilitas }}</p>
              <p><b>Alamat:</b> {{ $kos->alamat_kosan }}</p>
              <p><b>No HP:</b> {{ $kos->no_hp }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty
      <div class="col-12 text-center">
        <strong>Data kost tidak ditemukan.</strong>
      </div>
    @endforelse
  </div>
</div>

</body>
</html>
