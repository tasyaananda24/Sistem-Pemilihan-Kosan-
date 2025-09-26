<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Sistem Keputusan Pemilihan Kosan" />
  <meta name="author" content="KosFinder" />
  <title>KosFinder - Sistem Pemilihan Kos</title>
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <style>
    body { background-color: #f9f9f9; }

    .navbar { 
      background-color: transparent !important; 
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    .navbar-brand, 
    .navbar-nav .nav-link { 
      color: #fff !important; 
      transition: color 0.3s ease;
    }
    .navbar-nav .nav-item .nav-link {
      background-color: rgba(255,255,255,0.8);
      color: #1f1f1f !important;
      margin: 0 0.3rem;
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      transition: all 0.3s ease;
    }
    .navbar-nav .nav-item .nav-link:hover,
    .navbar-nav .nav-item .nav-link.active {
      background-color: #8B5E3C;
      color: #fff !important;
      transform: translateY(-2px);
    }
    /* Efek saat discroll */
    .navbar-scrolled {
      background-color: rgba(255, 255, 255, 0.95) !important;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .navbar-scrolled .navbar-brand,
    .navbar-scrolled .nav-link {
      color: #1f1f1f !important;
    }

    .header-hero {
      background: linear-gradient(to bottom, rgba(0,0,0,0.55), rgba(0,0,0,0.3)), 
                  url("assets/img/bg1.jpg") center center/cover no-repeat;
      min-height: 700px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
      position: relative;
      padding: 20px;
    }
    .header-hero h1 {
      font-size: 3rem;
      font-weight: bold;
      text-shadow: 2px 2px 10px rgba(0,0,0,0.6);
    }
    .header-hero p {
      font-size: 1.2rem;
      margin-top: 1rem;
      text-shadow: 1px 1px 6px rgba(0,0,0,0.5);
    }

    /* Card pencarian ngambang */
    .search-floating {
      position: absolute;
      bottom: -90px;
      left: 50%;
      transform: translateX(-50%);
      background: #fff;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.15);
      width: 90%;
      max-width: 1000px;
      z-index: 10;
      color: #1f1f1f;
    }
    .search-floating h5 {
      color: #8B5E3C;
    }
    .form-label { 
      font-weight: 600; 
      color: #333; 
    }
    .form-select {
      border: 1px solid #D8D9D7;
      border-radius: 8px;
    }
    .btn-main {
      background-color: #A3B18A;
      color: #fff;
      border-radius: 30px;
      transition: 0.3s;
    }
    .btn-main:hover {
      background-color: #8B5E3C;
      color: #fff;
    }

    section.pt-5 {
      margin-top: 100px; /* supaya gak nabrak card filter */
    }
    .bg-lightgray { background-color: #D8D9D7 !important; }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container px-lg-5">
      <a class="navbar-brand fw-bold" href="#">KosFinder</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Kos Terbaru</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
              Login (Hanya Pemilik)
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header full image -->
  <header class="header-hero">
    <h1>Selamat Datang di KosFinder</h1>
    <p>Temukan kos terbaik sesuai kebutuhanmu dengan sistem pendukung keputusan berbasis SAW.</p>

    <!-- Search & Filter ngambang -->
    <div class="search-floating">
      <h5 class="fw-bold mb-3">Cari Kost Sesuai Kriteria</h5>
      <form class="row g-3 align-items-center">
        <!-- Harga -->
        <div class="col-md-3">
          <label class="form-label">Harga</label>
          <select class="form-select">
            <option value="">Semua</option>
            <option value="1">< 500k</option>
            <option value="2">500k - 800k</option>
            <option value="3">> 800k</option>
          </select>
        </div>
        <!-- Jarak -->
        <div class="col-md-3">
          <label class="form-label">Jarak ke Kampus</label>
          <select class="form-select">
            <option value="">Semua</option>
            <option value="1">< 500m</option>
            <option value="2">500m - 1km</option>
            <option value="3">> 1km</option>
          </select>
        </div>
        <!-- Fasilitas -->
        <div class="col-md-3">
          <label class="form-label">Fasilitas</label>
          <select class="form-select">
            <option value="">Semua</option>
            <option value="AC">AC</option>
            <option value="WiFi">WiFi</option>
            <option value="Laundry">Laundry</option>
            <option value="Dapur">Dapur</option>
          </select>
        </div>
        <!-- Luas -->
        <div class="col-md-3">
          <label class="form-label">Luas Kamar</label>
          <select class="form-select">
            <option value="">Semua</option>
            <option value="1">< 3x3 m</option>
            <option value="2">3x3 – 4x4 m</option>
            <option value="3">> 4x4 m</option>
          </select>
        </div>
        <!-- Tombol cari -->
        <div class="col-12 text-center mt-3">
          <button class="btn btn-main px-5" type="submit">
            <i class="bi bi-search"></i> Cari
          </button>
        </div>
      </form>
    </div>
  </header>

  <!-- Daftar Kos -->
  <section class="pt-5">
    <div class="container px-lg-5">
      <h2 class="fw-bold mb-3 text-center" style="color:#8B5E3C;">Rekomendasi Kos</h2>
      <div class="row gx-lg-5">
        <!-- Kos sample -->
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card h-100 border-0 shadow-sm">
            <img src="assets/img/kos1.jpg" class="card-img-top" alt="Kos Putri Harmoni">
            <div class="card-body text-center p-4">
              <h5 class="card-title fw-bold">Kos Putri Harmoni</h5>
              <p class="card-text text-muted">Lokasi strategis dekat kampus, fasilitas lengkap, harga Rp 800.000/bulan.</p>
              <a href="#" class="btn btn-outline-dark">Detail</a>
            </div>
          </div>
        </div>
        <!-- Kos sample 2 -->
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card h-100 border-0 shadow-sm">
            <img src="assets/img/kos2.jpg" class="card-img-top" alt="Kos Putra Melati">
            <div class="card-body text-center p-4">
              <h5 class="card-title fw-bold">Kos Putra Melati</h5>
              <p class="card-text text-muted">Harga terjangkau, kamar nyaman, dekat akses transportasi Rp 650.000/bulan.</p>
              <a href="#" class="btn btn-outline-dark">Detail</a>
            </div>
          </div>
        </div>
        <!-- Kos sample 3 -->
        <div class="col-lg-6 col-xxl-4 mb-5">
          <div class="card h-100 border-0 shadow-sm">
            <img src="assets/img/kos3.jpg" class="card-img-top" alt="Kos Putri Sakura">
            <div class="card-body text-center p-4">
              <h5 class="card-title fw-bold">Kos Putri Sakura</h5>
              <p class="card-text text-muted">Fasilitas lengkap dengan kamar mandi dalam, Rp 900.000/bulan.</p>
              <a href="#" class="btn btn-outline-dark">Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-4 bg-lightgray">
    <div class="container">
      <p class="m-0 text-center text-dark">© 2025 KosFinder - Sistem Pemilihan Kosan</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Script Scroll Navbar -->
  <script>
    const navbar = document.querySelector(".navbar");
    window.addEventListener("scroll", function () {
      if (window.scrollY > 50) {
        navbar.classList.add("navbar-scrolled");
      } else {
        navbar.classList.remove("navbar-scrolled");
      }
    });
  </script>
</body>
</html>
