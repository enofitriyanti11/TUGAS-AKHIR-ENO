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
                                        <th scope="col">Rentang Peminjaman </th>
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pinjam->tgl_pinjam )) }} s/d {{ date('d-m-Y', strtotime($pinjam->tgl_kembali )) }} </td>
                                        <td>{{ $pinjam->status == 'dipinjam' ? '⛔belum dikembalikan' : date('d-m-Y', strtotime($pinjam->tgl_pengembalian )) }} </td>
                                        <td>{{ $pinjam->anggota->nama_anggota }}</td>
                                        <td>{{ $pinjam->buku->judul }}</td>
                                        <td>{{ $pinjam->status == 'dipinjam' ? '⛔belum dikembalikan' : 'Rp '.number_format($pinjam->denda) }}</td>
                                        <td>
                                            @if ($pinjam->status == 'dipinjam')
                                            <span class="badge bg-danger">{{ $pinjam->status }}</span>
                                            @else
                                            <span class="badge bg-success">{{ $pinjam->status }}</span>
                                            @endif
                                        </td>
                                        <!-- <td>
                                            @if ($pinjam->status == 'dipinjam')
                                            <a onclick="return confirm('Yakin buku telah di kembalikan?')" href="{{route ('anggota.konfirmasi_pengembalian', $pinjam->id_pinjam) }}" class="btn btn-success btn-sm" title="konfirmasi pengembalian">
                                                <i class="fas fa-check btn-block"></i>
                                            </a>
                                            <form action="{{ route('pinjam.destroy', $pinjam->id_pinjam) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    <i class=" fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @else
                                            -
                                            @endif
                                        </td> -->
                                        <td>
                                            <a onclick="return confirm('Yakin buku telah dikembalikan?')" href="{{ route('anggota.konfirmasi_pengembalian', $pinjam->id_pinjam) }}" class="btn btn-success btn-sm" title="Konfirmasi Pengembalian">
                                                <i class="fas fa-check btn-block"></i>
                                            </a>

                                            <form action="{{ route('pinjam.destroy', $pinjam->id_pinjam) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                    <i class="fas fa-trash"></i>
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