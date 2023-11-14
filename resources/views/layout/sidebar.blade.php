<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link mt-3" href="/dashboard" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    @if (Auth::user()->level == 'admin')
                    <a class="nav-link" href="/user" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Data User
                    </a>
                    @endif
                    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'petugas' )
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="/kelas" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Data Kelas
                    </a>
                    <a class="nav-link" href="/anggota" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                        Data Siswa
                    </a>
                    <a class="nav-link" href="/kategori" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Data Kategori
                    </a>
                    <a class="nav-link" href="/lokasi" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                        Data Lokasi Buku
                    </a>
                    <a class="nav-link" href="/buku" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Data Buku
                    </a>
                    <div class="sb-sidenav-menu-heading">transaksi</div>
                    <a class="nav-link" href="/pinjam" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-handshake"></i></div>
                        Peminjaman
                    </a>
                    @endif
                    <div class="sb-sidenav-menu-heading">Laporan</div>
                    <a class="nav-link" href="/laporan" style="color: white;">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Laporan
                    </a>

                </div>
            </div>

        </nav>
    </div>
</div>