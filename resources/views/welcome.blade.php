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
        .navbar { background-color: transparent !important; }
        .navbar-brand, .navbar-nav .nav-link { color: #fff !important; }
        .navbar-nav .nav-item .nav-link {
            background-color: #f0f0f0;
            color: #1f1f1f !important;
            margin: 0 0.3rem;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .navbar-nav .nav-item .nav-link:hover,
        .navbar-nav .nav-item .nav-link.active {
            background-color: rgba(0,0,0,0.5);
            color: #fff !important;
            transform: translateY(-2px);
        }
        .header-hero {
            background: linear-gradient(to bottom, rgba(0,0,0,0.55), rgba(0,0,0,0.3)), 
                        url("assets/img/bg1.jpg") center center/cover no-repeat;
            min-height: 800px;
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
        .bg-lightgray { background-color: #e0e0e0 !important; }
        .search-kos { max-width: 500px; margin: 20px auto 40px auto; }
    </style>
</head>
<body>
    <!-- Navbar transparan -->
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
        <p>Temukan kos terbaik sesuai kebutuhanmu dengan sistem pendukung keputusan berbasis kriteria harga, fasilitas, lokasi, dan kenyamanan.</p>
    </header>

    <!-- Daftar Kos -->
    <section class="pt-5">
        <div class="container px-lg-5">
            <h2 class="fw-bold mb-3 text-center">Rekomendasi Kos</h2>

            <!-- Search form -->
            <div class="search-kos">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari kos..." aria-label="Search">
                    <button class="btn btn-dark" type="submit">Cari</button>
                </form>
            </div>

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

                <!-- Tambahkan kos lain sesuai kebutuhan -->
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
</body>
</html>
