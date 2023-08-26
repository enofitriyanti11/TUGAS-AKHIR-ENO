@extends ('layout.main')

@section ('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="card px-5 mt-4  shadow">
                            <h1 class="text-primary pt-4 text-center mb-4">Tambah Data Siswa</h1>

                            <form action="/anggota/{{$anggota->id_anggota}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_anggota" class="form-label">Nama Anggota</label>
                                    <input type="text" class="form-control @error('nama_anggota') is-invalid @enderror" id="nama_anggota" name="nama_anggota" value="{{ $anggota->nama_anggota }}" required>
                                    @error('nama_anggota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ $anggota->kelas }}" required>
                                    @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                                    <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" required>
                                    <label for="male">Laki-laki</label>
                                    <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" required>
                                    <label for="female">Perempuan</label><br><br>

                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $anggota->alamat }}" required>
                                    @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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