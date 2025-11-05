<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Navbar Right -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifikasi Verifikasi Kosan -->
        @php
            use App\Models\DaftarKos;
          $pendingCount = DaftarKos::where('status_verifikasi', 'pending')->count();
$pendingList = DaftarKos::where('status_verifikasi', 'pending')->latest()->take(5)->get();

        @endphp

        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                @if($pendingCount > 0)
                    <span class="badge badge-danger badge-counter">{{ $pendingCount }}</span>
                @endif
            </a>

            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Notifikasi Verifikasi Kosan
                </h6>

                @if($pendingCount > 0)
                    @foreach($pendingList as $kos)
                        <a class="dropdown-item d-flex align-items-center"
                           href="{{ route('admin.kosan.verifikasi') }}">
                            <div class="mr-3">
                                <div class="icon-circle bg-warning">
                                    <i class="fas fa-exclamation-circle text-white"></i>
                                </div>
                            </div>
                            <div>
                                <div class="small text-gray-500">
                                    {{ $kos->created_at->format('d M Y, H:i') }}
                                </div>
                                <span class="font-weight-bold">
                                    Kosan <b>{{ $kos->nama_kosan ?? 'Tanpa Nama' }}</b> menunggu verifikasi.
                                </span>
                            </div>
                        </a>
                    @endforeach
                @else
                    <a class="dropdown-item text-center small text-gray-500" href="#">
                        Tidak ada kosan yang perlu diverifikasi
                    </a>
                @endif

                <a class="dropdown-item text-center small text-primary" href="{{ route('admin.kosan.verifikasi') }}">
                    Lihat Semua
                </a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <!-- Nama Pengguna -->
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ Auth::user()->name ?? 'Pengguna' }}
                </span>

                <!-- Foto Profil -->
                <img class="img-profile rounded-circle"
                     src="{{ Auth::user()->foto 
                            ? asset('assets/img/' . Auth::user()->foto) 
                            : asset('img/undraw_profile.svg') }}"
                     alt="Foto Profil"
                     style="width: 35px; height: 35px; object-fit: cover;">
            </a>

            <!-- Dropdown Menu -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">

                <!-- Profil -->
                <a class="dropdown-item" href="{{ url('profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil {{ Auth::user()->role == 'pemilik' ? 'Pemilik' : (Auth::user()->role == 'admin' ? 'Admin' : 'User') }}
                </a>

                
            </div>
        </li>

    </ul>
</nav>
<!-- End of Topbar -->
