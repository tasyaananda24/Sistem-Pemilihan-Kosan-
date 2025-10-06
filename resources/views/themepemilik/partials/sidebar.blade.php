{{-- resources/views/themeadmin/sidebar.blade.php --}}
<ul class="navbar-nav sidebar sidebar-dark accordion bg-gradient-primary" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/pemilik/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pemilik Kos</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->is('pemilik/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/pemilik/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Menu Utama -->
    <div class="sidebar-heading">
        Manajemen Kos
    </div>

    <!-- Dropdown Manajemen Kos -->
    <li class="nav-item {{ request()->is('pemilik/kosan*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseManajemenKos"
            aria-expanded="true" aria-controls="collapseManajemenKos">
            <i class="fas fa-fw fa-building"></i>
            <span>Manajemen Kos</span>
        </a>
        <div id="collapseManajemenKos" class="collapse {{ request()->is('pemilik/kosan*') ? 'show' : '' }}"
            aria-labelledby="headingManajemenKos" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- Tabel daftar kosan (index) -->
                <a class="collapse-item {{ request()->is('pemilik/kosan') ? 'active' : '' }}" href="{{ route('pemilik.kosan.index') }}">
                    <i class="fas fa-fw fa-list"></i> Kosan Terdaftar
                </a>
                <!-- Form tambah kosan (create) -->
                <a class="collapse-item {{ request()->is('pemilik/kosan/create') ? 'active' : '' }}" href="{{ route('pemilik.kosan.create') }}">
                    <i class="fas fa-fw fa-plus-circle"></i> Daftarkan Kosan
                </a>
                <!-- Verifikasi Kosan -->
                <a class="collapse-item {{ request()->is('pemilik/kosan/verifikasi*') ? 'active' : '' }}" href="{{ route('pemilik.kosan.verifikasi') }}">
                    <i class="fas fa-fw fa-check-circle"></i> Verifikasi Kosan
                </a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Tambahan Menarik -->
    <div class="sidebar-heading">
        Insight
    </div>

    <li class="nav-item {{ request()->is('pemilik/statistik*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/pemilik/statistik') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Statistik Kosan</span>
        </a>
    </li>

    <li class="nav-item {{ request()->is('pemilik/pesan*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/pemilik/pesan') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Pesan Masuk</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

</ul>
