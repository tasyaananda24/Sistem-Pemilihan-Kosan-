@extends('themeadmin.default')

@section('title', 'Dashboard Admin')

@section('content')

<!-- ================= PAGE HEADING ================= -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Dashboard Admin</h1>
</div>

<!-- ================= SUMMARY CARDS ================= -->
<div class="row">

    <!-- Total Pemilik -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pemilik Kos
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalPemilik }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Kosan -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Kosan Terdaftar
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $totalKosan }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Verifikasi -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-3">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Kosan Belum Diverifikasi
                        </div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">
                            {{ $pendingVerifikasi }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-exclamation-triangle fa-3x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ================= CHART SECTION ================= -->
<div class="row">

    <!-- AREA CHART -->
    <div class="col-xl-8 col-lg-7 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Grafik Aktivitas Sistem
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- PIE CHART -->
    <div class="col-xl-4 col-lg-5 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Status Verifikasi Kosan
                </h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Terverifikasi
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Belum Verifikasi
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<!-- Chart.js -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<script>
/* ================= AREA CHART ================= */
const ctxArea = document.getElementById('myAreaChart');
new Chart(ctxArea, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
            label: 'Aktivitas',
            data: [10, 15, 8, 20, 17, 25],
            borderColor: '#4e73df',
            backgroundColor: 'rgba(78, 115, 223, 0.1)',
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } }
    }
});

/* ================= PIE CHART ================= */
const ctxPie = document.getElementById('myPieChart');
new Chart(ctxPie, {
    type: 'doughnut',
    data: {
        labels: ['Terverifikasi', 'Belum Diverifikasi'],
        datasets: [{
            data: [
                {{ $totalKosan - $pendingVerifikasi }},
                {{ $pendingVerifikasi }}
            ],
            backgroundColor: ['#1cc88a', '#f6c23e'],
            hoverOffset: 4
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } }
    }
});
</script>
@endpush
