@extends('themeadmin.default')

@section('title', 'Dashboard')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Pemilik -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Pemilik Kos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPemilik }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Kosan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Kosan Terdaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalKosan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <!-- Pending Verifikasi -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Kosan Belum Diverifikasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingVerifikasi }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik atau Statistik Tambahan -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Transaksi Bulanan</h6>
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Distribusi Kosan</h6>
                </div>
                <div class="card-body">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Chart.js -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <script>
        // Contoh data dummy (bisa diganti dengan data dari controller)
        const ctxArea = document.getElementById('myAreaChart');
        new Chart(ctxArea, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Transaksi',
                    data: [1000000, 1200000, 800000, 1500000, 1300000, 1700000],
                    borderColor: '#4e73df',
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                }]
            },
            options: { responsive: true }
        });

        const ctxPie = document.getElementById('myPieChart');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Terverifikasi', 'Belum Verifikasi'],
                datasets: [{
                    data: [{{ $totalKosan - $pendingVerifikasi }}, {{ $pendingVerifikasi }}],
                    backgroundColor: ['#1cc88a', '#f6c23e'],
                    hoverOffset: 4
                }]
            }
        });
    </script>
@endpush
