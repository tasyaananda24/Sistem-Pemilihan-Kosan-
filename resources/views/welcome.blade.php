<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rekomendasi Kost</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    /* Navbar */
    .navbar-custom {
      background-color: #7C3E1D;
      height: 85px; /* lebih tipis biar mirip gambar kuning */
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 5%;
    }

    /* Brand */
    .navbar-brand {
      font-family: 'Walibi0615', sans-serif;
      font-size: 28px; /* agak kecil biar proporsional */
      font-weight: bold;
      color: #FFFBF2 !important;
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      width: 35px;
      height: 35px;
      margin-right: 10px;
    }

    /* Glassmorphism Button */
    .nav-btn {
        width: 140px;
        height: 45px;
        font-family: 'SF Pro Display', sans-serif;
        font-size: 15px;
        border-radius: 25px;
        margin-left: 10px;
        font-weight: 500;
        color: #FFFBF2;
        border: 1px solid rgba(255, 255, 255, 0.4); /* garis tipis */
        background: rgba(255, 255, 255, 0.2);       /* transparan putih */
        backdrop-filter: blur(10px);                /* efek kaca */
        -webkit-backdrop-filter: blur(10px);        /* support Safari */
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 0.3s ease;
        text-align: center;
    }

    /* Hover Effect */
    .nav-btn:hover {
        background: #A3B18A; /* solid hijau */
        color: #FFFBF2;
        border: 1px solid #A3B18A;
    }

    /* Active */
    .nav-btn.active {
        background: #A3B18A; /* solid hijau */
        color: #FFFBF2 !important;
    }

    body {
      background-color: #F5F5DC; /* cream */
      font-family: 'SF Pro Display', sans-serif;
      color: #3F3F3F;
    }

    /* Hero Image */
    .hero-section {
      position: relative;
      text-align: center;
    }

    .hero-image {
      display: block;
      width: 100%;
      max-height: 400px;
      object-fit: cover;
    }

    /* Box rekomendasi (melayang di tengah bawah hero image) */
    .rekomendasi-box {
      position: absolute;
      left: 50%;
      bottom: -60px; /* atur tinggi sesuai kebutuhan */
      transform: translateX(-50%);
      background: #FFFBF2;
      border-radius: 15px;
      padding: 20px 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      max-width: 950px;
      width: 95%;
    }

    .box-title {
      font-weight: 600;
      font-size: 14px;
      margin-bottom: 10px;
      color: #3F3F3F;
    }

    /* Filter button */
    .filter-btn {
      background: #F5F5DC;
      border: none;
      border-radius: 20px;
      padding: 6px 18px;
      margin-right: 6px;
      font-size: 14px;
      font-weight: 500;
      color: #3F3F3F;
      transition: 0.3s;
    }

    .filter-btn.active {
      background-color: #A3B18A;
      color: #fff;
    }

    .filter-btn:hover {
      background-color: #cfd4b3;
    }

    /* Search box */
    .search-box {
      display: flex;
      align-items: center;
      background: #F5F5DC;
      border-radius: 10px;
      padding: 6px 10px;
      margin-top: 12px;
    }

    .search-box input {
      border: none;
      background: transparent;
      flex: 1;
      padding: 8px;
      font-size: 15px;
      outline: none;
      color: #3F3F3F;
    }

    .search-btn {
      background-color: #A3B18A;
      border: none;
      padding: 8px 18px;
      border-radius: 8px;
      color: #fff;
      font-weight: 500;
      transition: 0.3s;
    }

    .search-btn:hover {
      background-color: #7c8c66;
    }

    /* Section title di bawah */
    .section-title {
      text-align: center;
      margin-top: 100px; /* biar tidak nabrak box */
    }

    .section-title h2 {
      font-weight: bold;
      color: #3F3F3F;
    }

    .section-title p {
      color: #3F3F3F;
    }
  </style>
</head>
<body>

    <!-- Navbar -->
  <nav class="navbar-custom">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('assets/material-symbols--home-work-rounded.svg') }}" alt="Logo Rumah"> 
      KosFinder
    </a>

    <div class="d-flex flex-wrap justify-content-center">
      <a href="#" class="nav-btn active">Beranda</a>
      <a href="#" class="nav-btn">Kos Terbaru</a>
      <a href="#" class="nav-btn">Tentang</a>
      <a href="#" class="nav-btn">Login</a>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <img src="{{ asset('assets/img/kosan.jpeg') }}" alt="Gambar Kosan" class="hero-image">

    <!-- Box rekomendasi melayang -->
    <div class="rekomendasi-box">
      <div class="box-title">Rekomendasi Kost</div>
      <div class="d-flex flex-wrap mb-2">
        <button class="filter-btn active">Biaya</button>
        <button class="filter-btn">Jarak</button>
        <button class="filter-btn">Fasilitas</button>
        <button class="filter-btn">Luas</button>
      </div>

      <div class="search-box">
        <img src="{{ asset('assets/material-symbols--home-work-rounded1.svg') }}" alt="Icon Rumah" width="24" style="margin-right:8px;">
        <input type="text" placeholder="Pilih kost tujuan atau cari kriteria">
        <button class="search-btn">Cari Kost</button>
      </div>
    </div>
  </section>

  <!-- Section Title -->
  <div class="section-title">
    <h2>Rekomendasi Kost</h2>
    <p>Temukan kost terbaik sesuai kebutuhan, budget, dan preferensi.</p>
  </div>

</body>
</html>
