{{-- resources/views/themeadmin/partials/sidebar.blade.php --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Data Master -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
            <i class="fas fa-fw fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-building mr-2"></i>Data Kosan</a>
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-list-alt mr-2"></i>Kriteria</a>
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-user-friends mr-2"></i>Alternatif</a>
            </div>
        </div>
    </li>

    <!-- Verifikasi -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVerif" aria-expanded="true" aria-controls="collapseVerif">
            <i class="fas fa-fw fa-check-circle"></i>
            <span>Verifikasi</span>
        </a>
        <div id="collapseVerif" class="collapse" aria-labelledby="headingVerif" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-building mr-2"></i>Verifikasi Kosan</a>
            </div>
        </div>
    </li>

    <!-- Proses SPK -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSPK" aria-expanded="true" aria-controls="collapseSPK">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Proses SPK</span>
        </a>
        <div id="collapseSPK" class="collapse" aria-labelledby="headingSPK" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-table mr-2"></i>Matriks Keputusan</a>
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-balance-scale mr-2"></i>Bobot</a>
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-calculator mr-2"></i>Perhitungan SPK</a>
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-trophy mr-2"></i>Hasil Ranking</a>
            </div>
        </div>
    </li>

    <!-- Laporan -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#"><i class="fas fa-fw fa-file-alt mr-2"></i>Laporan</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->
