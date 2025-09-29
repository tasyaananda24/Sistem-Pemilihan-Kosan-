<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;900&display=swap" rel="stylesheet">

    <!-- SB Admin -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom Theme -->
    <style>
        body { background-color: #f9f9f9; font-family: 'Nunito', sans-serif; }

        /* === SIDEBAR === */
        .bg-gradient-primary {
            background: #A3B18A !important;   /* hijau sage */
            background-image: none !important; /* hapus gradasi */
        }
        .sidebar .nav-item .nav-link {
            color: #fff !important;
            font-weight: 600;
        }
        .sidebar .nav-item .nav-link.active {
            background-color: #8B5E3C !important; /* coklat aksen */
            border-radius: 8px;
            color: #fff !important;
        }
        .sidebar .sidebar-heading {
            color: #f1f1f1 !important;
        }

        /* === TOPBAR === */
        .navbar-nav .nav-link, 
        .navbar-brand { color: #1f1f1f !important; }

        /* === CARD === */
        .card { 
            border-radius: 16px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            opacity: 0; 
            transform: translateY(20px); 
            transition: all 0.5s ease-in-out;
        }
        .card-header { 
            background-color: #fff; 
            border-bottom: 1px solid #eee; 
            font-weight: 600; 
            color: #8B5E3C; 
        }
        .card.appear { opacity: 1; transform: translateY(0); }

        /* === PROGRESS === */
        .progress-bar.bg-info { background-color: #A3B18A !important; }
        .progress-bar.bg-success { background-color: #8B5E3C !important; }

        /* === BUTTON === */
        .btn-primary {
            background-color: #A3B18A;
            border-color: #A3B18A;
            border-radius: 30px;
        }
        .btn-primary:hover {
            background-color: #8B5E3C;
            border-color: #8B5E3C;
        }

        .btn-success {
            background-color: #8B5E3C;
            border-color: #8B5E3C;
            border-radius: 30px;
        }
        .btn-success:hover {
            background-color: #6d412a; /* lebih gelap sedikit */
            border-color: #6d412a;
        }

        /* === TABLE === */
        .custom-table thead {
            background-color: #A3B18A; /* hijau sage */
            color: #fff;
        }
        .custom-table th, 
        .custom-table td {
            vertical-align: middle;
        }
        .custom-table tbody tr:hover {
            background-color: #f0f4ef; /* hijau sage sangat muda */
        }

        /* === BADGE STATUS === */
        .status-badge {
            padding: 6px 12px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
        }
        .status-badge.approved {
            background-color: #A3B18A; /* hijau sage */
            color: #fff;
        }
        .status-badge.pending {
            background-color: #DDB892; /* coklat muda */
            color: #1f1f1f;            /* biar kebaca */
        }
        .status-badge.rejected {
            background-color: #8B5E3C; /* coklat tua */
            color: #fff;
        }

        /* === FOOTER === */
        footer.sticky-footer {
            background-color: #D8D9D7;
            color: #1f1f1f;
        }
    </style>

    @stack('styles')
</head>
<body id="page-top">
    <div id="wrapper">
        {{-- Sidebar --}}
        @include('themepemilik.partials.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                {{-- Topbar --}}
                @include('themepemilik.partials.topbar')

                {{-- Content --}}
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            {{-- Footer --}}
            @include('themepemilik.partials.footer')
        </div>
    </div>

    {{-- Scroll Top --}}
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>

    {{-- Logout Modal --}}
    @include('themepemilik.partials.logout')

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    {{-- Animasi muncul --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".card").forEach((el, i) => {
                setTimeout(() => { el.classList.add("appear"); }, i * 150);
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
