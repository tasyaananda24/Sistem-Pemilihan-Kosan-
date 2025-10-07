<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Detail Kost - {{ $kos->nama_kosan }}</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <style>
    body {
      background-color: #F5F5DC;
      font-family: 'SF Pro Display', sans-serif;
      color: #3F3F3F;
    }

    .navbar-custom {
      background-color: #7C3E1D;
      height: 85px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 5%;
    }

    .navbar-brand {
      font-family: 'Walibi0615', sans-serif;
      font-size: 28px;
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

    .detail-container {
      max-width: 1000px;
      margin: 80px auto;
      background-color: #FFFBF2;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      padding: 30px;
    }

    .detail-image {
      width: 100%;
      border-radius: 15px;
      height: 400px;
      object-fit: cover;
    }

    .info-title {
      font-size: 26px;
      font-weight: bold;
      color: #3F3F3F;
      margin-top: 20px;
    }

    .info-text {
      font-size: 16px;
      margin-bottom: 8px;
    }

    .price {
      font-size: 22px;
      font-weight: bold;
      color: #7C3E1D;
      margin-top: 10px;
    }

    .btn-back {
      background-color: #A3B18A;
      color: #fff;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      transition: 0.3s;
    }

    .btn-back:hover {
      background-color: #7c8c66;
      color: #fff;
    }

    .facilities {
      background-color: #f5f5dc;
      border-radius: 10px;
      padding: 15px;
      margin-top: 15px;
    }

    .facilities ul {
      margin: 0;
      padding-left: 20px;
    }

    .contact-box {
      background-color: #A3B18A;
      color: #fff;
      border-radius: 10px;
      padding: 20px;
      margin-top: 30px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar-custom">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('assets/material-symbols--home-work-rounded.svg') }}" alt="Logo Rumah">
      KosFinder
    </a>
  </nav>

  <!-- Detail Container -->
  <div class="container detail-container">
    <img src="{{ asset('storage/foto_kosan/' . $kos->foto_kosan) }}" class="detail-image" alt="{{ $kos->nama_kosan }}">
    <h2 class="info-title">{{ $kos->nama_kosan }}</h2>
    <p class="price">Rp {{ number_format($kos->harga_sewa, 0, ',', '.') }} / bulan</p>

    <div class="mt-3">
      <p class="info-text"><strong>Alamat:</strong> {{ $kos->alamat ?? '-' }}</p>
      <p class="info-text"><strong>Jarak ke Kampus:</strong> {{ $kos->jarak_ke_kampus }}</p>
      <p class="info-text"><strong>Luas Kamar:</strong> {{ $kos->luas_tanah }}</p>
      <p class="info-text"><strong>Tipe Kost:</strong> {{ $kos->tipe_kosan ?? 'Tidak diketahui' }}</p>
    </div>

    <div class="facilities">
      <h5>Fasilitas</h5>
      <ul>
        @foreach(explode(',', $kos->fasilitas) as $f)
          <li>{{ trim($f) }}</li>
        @endforeach
      </ul>
    </div>

    <div class="contact-box">
      <h5>Kontak Pemilik</h5>
      <p><strong>Nama:</strong> {{ $kos->nama_pemilik ?? 'Tidak tersedia' }}</p>
      <p><strong>No. Telepon:</strong> {{ $kos->no_hp ?? '-' }}</p>
    </div>

    <div class="mt-4">
      <a href="{{ url('/') }}" class="btn btn-back">← Kembali ke Beranda</a>
    </div>
  </div>

</body>
</html>
