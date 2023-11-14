@extends('layout.main')

@section('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <div class="card px-3 mt-2  shadow">
                            <h1 class="text-primary pt-3 text-center mb-4">Tambah Data Kelas</h1>

                            <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="nama_kelas">Nama Kelas:</label>
                                <input type="text" class="form-control mb-2 @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" required>
                                @error('nama_kelas')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn btn-success col-md-2">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection