@extends ('layout.main')

@section ('content')
<div id="layoutSidenav">

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Dashboard</h2>
                <hr>
                <!-- <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->
                <div class="alert alert-primary" role="alert">
                    <h6>Selamat datang di sistem Perpustakaan, {{ Auth::user()->name }}</h6>
                    <small>Anda login sebagai : <span class="badge bg-danger"><i class="fa fa-user"></i> {{ Auth::user()->level }}</span></small>
                </div>
                @if (Auth::user()->level != 'kepala sekolah')
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body"><b>{{ \App\Models\anggota::count() }}</b> Siswa</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="/anggota">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><b>{{ \App\Models\Buku::count() }}</b> Buku</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="/buku">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><b>{{ \App\Models\Pinjam::where('status', 'dipinjam')->count() }}</b> Peminjaman</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="/pinjam">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Laporan</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="/laporan">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i> Grafik peminjaman tahun {{ date('Y') }}
                            </div>
                            <div class="card-body">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    options = {
        chart: {
            type: 'bar',
            width: '100%',
            height: 500,
        },
        plotOptions: {
            bar: {
                horizontal: false
            }
        },
        series: [{
                name: 'Dipinjam',
                data: <?= json_encode($pinjam) ?>
            },
            {
                name: 'Dikembalikan',
                data: <?= json_encode($kembali) ?>
            }
        ]
    }


    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>
@endpush