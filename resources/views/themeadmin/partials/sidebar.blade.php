{{-- resources/views/themeadmin/partials/sidebar.blade.php --}}
<ul class="navbar-nav sidebar sidebar-dark accordion bg-gradient-primary" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Data Master -->
    <li class="nav-item {{ request()->is('admin/kosan*') || request()->is('admin/kriteria*') || request()->is('admin/kosan/approved*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster"
           aria-expanded="true" aria-controls="collapseMaster">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseMaster" class="collapse {{ request()->is('admin/kosan*') || request()->is('admin/kriteria*') || request()->is('admin/alternatif*') ? 'show' : '' }}"
             aria-labelledby="headingMaster" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/kosan*') ? 'active' : '' }}" href="{{ url('/admin/kosan') }}">
                    <i class="fas fa-fw fa-building mr-2"></i> Data Kosan
                </a>
                <a class="collapse-item {{ request()->is('admin/kriteria*') ? 'active' : '' }}" href="{{ url('/admin/kriteria') }}">
                    <i class="fas fa-fw fa-list-alt mr-2"></i> Kriteria
                </a>
                <a class="collapse-item {{ request()->is('admin/alternatif*') ? 'active' : '' }}" href="{{ url('/admin/kosan/approved') }}">
                    <i class="fas fa-fw fa-user-friends mr-2"></i> Alternatif
                </a>
            </div>
        </div>
    </li>

    <!-- Verifikasi -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVerif"
           aria-expanded="true" aria-controls="collapseVerif">
            <i class="fas fa-fw fa-check-circle"></i>
            <span>Verifikasi</span>
        </a>
        <div id="collapseVerif" class="collapse {{ request()->is('admin/verifikasi*') ? 'show' : '' }}"
             aria-labelledby="headingVerif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/verifikasi*') ? 'active' : '' }}" href="{{ url('/admin/kosan/verifikasi') }}">
                    <i class="fas fa-fw fa-building mr-2"></i> Verifikasi Kosan
                </a>
            </div>
        </div>
    </li>

    <!-- Proses SPK -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSPK"
           aria-expanded="true" aria-controls="collapseSPK">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Proses SPK</span>
        </a>
        <div id="collapseSPK" class="collapse {{ request()->is('admin/matriks*') || request()->is('admin/bobot*') || request()->is('admin/perhitungan*') || request()->is('admin/ranking*') ? 'show' : '' }}"
             aria-labelledby="headingSPK" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/matriks*') ? 'active' : '' }}" href="{{ url('/admin/matriks') }}">
                    <i class="fas fa-fw fa-table mr-2"></i> Matriks Keputusan
                </a>
                <a class="collapse-item {{ request()->is('admin/bobot*') ? 'active' : '' }}" href="{{ url('/admin/bobot') }}">
                    <i class="fas fa-fw fa-balance-scale mr-2"></i> Bobot
                </a>
                <a class="collapse-item {{ request()->is('admin/perhitungan*') ? 'active' : '' }}" href="{{ url('/admin/perhitungan') }}">
                    <i class="fas fa-fw fa-calculator mr-2"></i> Perhitungan SPK
                </a>
                <a class="collapse-item {{ request()->is('admin/ranking*') ? 'active' : '' }}" href="{{ url('/admin/ranking') }}">
                    <i class="fas fa-fw fa-trophy mr-2"></i> Hasil Ranking
                </a>
            </div>
        </div>
    </li>

    <!-- Laporan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
           aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse {{ request()->is('admin/laporan*') ? 'show' : '' }}"
             aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/laporan*') ? 'active' : '' }}" href="{{ url('/admin/laporan') }}">
                    <i class="fas fa-fw fa-file-alt mr-2"></i> Laporan
                </a>
            </div>
        </div>
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

{{-- Style custom --}}
<style>
    /* Hanya highlight submenu aktif jadi coklat */
    .sidebar .collapse-item.active {
        background-color: #8B4513 !important; /* coklat */
        color: #fff !important;
        border-radius: .35rem;
    }

    /* Ikon dalam submenu aktif jadi putih */
    .sidebar .collapse-item.active i {
        color: #fff !important;
    }
</style>
