@extends ('layout.main')

@section ('content')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <div class="row justify-content-md-center">
                    <h2 class="mt-1"><b>Lokasi Buku</b></h2>
                    <hr>
                    @if (session('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session('pesan')}}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <a href="/lokasi/create" class="btn btn-primary">
                                Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Rak Buku</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokasis as $lokasi)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $lokasi->kategori->nama_kategori }}</td>
                                        <td>{{ $lokasi->rak }}</td>

                                        <td>
                                            <a href="{{route ('lokasi.edit', $lokasi->id_lokasi) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('lokasi.destroy', $lokasi->id_lokasi) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?')">
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