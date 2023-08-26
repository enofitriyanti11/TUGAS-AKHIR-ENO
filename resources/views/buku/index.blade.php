@extends ('layout.main')

@section ('content')


<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-md-center">
                    <h1 class="mt-1"><b>Buku</b></h1>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            <a href="/buku/create" class="btn btn-primary">
                                Tambah
                            </a>
                            <a href="/buku/cetak" class="btn btn-success">
                                Cetak Barcode
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Pengarang</th>
                                        <th scope="col">Penerbit</th>
                                        <th scope="col">Tempat Terbit</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Barcode</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bukus as $buku)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $buku->judul }}</td>
                                        <td>{{ $buku->kategori->nama_kategori }}</td>
                                        <td>{{ $buku->pengarang }}</td>
                                        <td>{{ $buku->penerbit }}</td>
                                        <td>{{ $buku->tempat_terbit }}</td>
                                        <td>{{ $buku->stok }}</td>
                                        <td>{!! DNS1D::getBarcodeHTML("$buku->buku_code",'UPCA',1,25) !!}
                                            <p class="barcode">p - {{ $buku->buku_code }}
                                        </td>
                                        <td>
                                            <a href="{{route ('buku.edit', $buku->id_buku) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('buku.destroy', $buku->id_buku) }}" method="POST" style="display: inline-block;">
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