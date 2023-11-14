@extends ('layout.main')

@section ('content')


<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-md-center">
                    <h2 class="mt-1"><b>Laporan</b></h2>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('laporan.cetak_siswa') }}" class="btn btn-primary">
                                Cetak Data Siswa
                            </a>
                            <a href="{{ route('laporan.cetak_buku') }}" class="btn btn-primary">
                                Cetak Data Buku
                            </a>
                            <a href="{{ route('laporan.cetak_peminjamansiswa') }}" class="btn btn-primary">
                                Cetak Data Peminjaman Siswa
                            </a>
                            <a href="{{ route('laporan.cetak_peminjaman') }}" class="btn btn-primary">
                                Cetak Data Peminjaman
                            </a>
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