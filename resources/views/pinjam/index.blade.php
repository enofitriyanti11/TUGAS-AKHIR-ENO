@extends ('layout.main')

@section ('content')


<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-md-center">
                    <h1 class="mt-1"><b>Peminjaman</b></h1>
                    <hr>
                    @if (session('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session('pesan')}}
                    </div>
                    @endif
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
                                        <th scope="col">Kelas</th>
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
                                        <td class="text-center">{{ date('d-m-Y', strtotime($pinjam->tgl_pinjam )) }} s/d {{ date('d-m-Y', strtotime($pinjam->tgl_kembali )) }}
                                            <br>
                                            @if ($pinjam->status == 'dipinjam')
                                            <button class="btn btn-link text-primary font-weight-bold" style="font-size: 12px;font-weight: 600" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-edit"></i> perpanjang tanggal</button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Perpanjang Peminjaman</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table-borderless">
                                                                <tr>
                                                                    <td>Nama Siswa</td>
                                                                    <td>:</td>
                                                                    <td>{{ $pinjam->anggota->nama_anggota }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Judul buku</td>
                                                                    <td>:</td>
                                                                    <td>{{ $pinjam->buku->judul }} </small></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Peminjaman</td>
                                                                    <td>:</td>
                                                                    <td>{{ date('d-m-Y', strtotime($pinjam->tgl_pinjam )) }} s/d {{ date('d-m-Y', strtotime($pinjam->tgl_kembali )) }}</td>
                                                                </tr>
                                                            </table>
                                                            <br><br>
                                                            <form action="{{ route('pinjam.perpanjang', $pinjam->id_pinjam) }}" method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for=""><i class="fa fa-calendar"></i> Update tanggal Pengembalian</label>
                                                                    <input type="date" name="tgl_kembali" id="" class="form-control" value="{{ $pinjam->tgl_kembali }}">
                                                                </div>
                                                                <br>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update Pengembalian</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </td>
                                        <td>{{ $pinjam->status == 'dipinjam' ? '⛔belum dikembalikan' : date('d-m-Y', strtotime($pinjam->tgl_pengembalian )) }} </td>
                                        <td>{{ $pinjam->anggota->nama_anggota }}</td>
                                        <td>{{ $pinjam->anggota->kelas }}</td>
                                        <td>{{ $pinjam->buku->judul  }} <br><b><small>{{ $pinjam->buku->kategori->lokasi->rak }}</b></td>
                                        <td>{{ $pinjam->status == 'dipinjam' ? '⛔belum dikembalikan' : 'Rp '.number_format($pinjam->denda) }}</td>
                                        <td>
                                            @if ($pinjam->status == 'dipinjam')
                                            <span class="badge bg-danger">{{ $pinjam->status }}</span>
                                            @else
                                            <span class="badge bg-success">{{ $pinjam->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Yakin buku telah dikembalikan?')" href="{{ route('anggota.konfirmasi_pengembalian', $pinjam->id_pinjam) }}" class="btn btn-success btn-sm" title="Konfirmasi Pengembalian">
                                                <i class="fas fa-check btn-block"></i>
                                            </a>

                                            <!-- <a href="{{route ('pinjam.edit', $pinjam->id_pinjam) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a> -->

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