@extends ('layout.main')

@section ('content')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-md-center">
                    <h1 class="mt-1"><b>Siswa</b></h1>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            <a href="/anggota/create" class="btn btn-primary">
                                Tambah
                            </a>
                            <a href="/anggota/cetak" class="btn btn-success">
                                Cetak Kartu
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Barcode</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($anggotas as $anggota)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $anggota->nama_anggota }}</td>
                                        <td>{{ $anggota->kelas }}</td>
                                        <td>{{ $anggota->jenis_kelamin }}</td>
                                        <td>{{ $anggota->alamat }}</td>
                                        <td>{!! DNS1D::getBarcodeHTML(htmlspecialchars($anggota->anggota_code), 'EAN13') !!}
                                            <p class="barcode">p - {{ $anggota->anggota_code }}
                                        </td>

                                        <td>
                                            <a href="{{route ('anggota.edit', $anggota->id_anggota) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('anggota.destroy', $anggota->id_anggota) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
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