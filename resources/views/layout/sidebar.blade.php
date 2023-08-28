<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link mt-3" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'petugas' )
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="/anggota">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Data Siswa
                    </a>
                    <a class="nav-link" href="/kategori">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Data Kategori
                    </a>
                    <a class="nav-link" href="/buku">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Data Buku
                    </a>
                    <div class="sb-sidenav-menu-heading">transaksi</div>
                    <a class="nav-link" href="/pinjam">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Peminjaman
                    </a>

                    @endif
                    <div class="sb-sidenav-menu-heading">Laporan</div>
                    <a class="nav-link" href="/laporan">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Laporan
                    </a>
                    <!-- @if (Auth::user()->level == 'admin')
                    <div class="sb-sidenav-menu-heading">Data User</div>
                    <a class="nav-link" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Data User
                    </a>
                    @endif -->
                </div>
            </div>

        </nav>
    </div>
</div>