@extends ('layout.main')

@section ('content')


<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-md-center">
                    <h1 class="mt-1"><b>Peminjaman</b></h1>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            <a href="/pinjam/create" class="btn btn-primary">
                                Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Pengembalian</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Denda</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pinjams as $pinjam)
                                    <tr>
                                        <th>{{ $pinjam->id_pinjam }}</th>
                                        <td>{{ $pinjam->tgl_pinjam }}</td>
                                        <td>{{ $pinjam->tgl_kembali }}</td>
                                        <td>{{ $pinjam->anggota->nama_anggota }}</td>
                                        <td>{{ $pinjam->buku->judul }}</td>
                                        <td>{{ $pinjam->status }}</td>
                                        <td>
                                            <a href="{{route ('pinjam.edit', $pinjam->id_pinjam) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('pinjam.destroy', $pinjam->id_pinjam) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    <i class=" fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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