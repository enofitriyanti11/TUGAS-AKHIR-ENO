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

                            <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="nama_anggota">Nama:</label>
                                <input type="text" class="form-control mb-2" id="nama_anggota" name="nama_anggota" value="{{old('nama_anggota')}}" required>
                                <label for="kelas">Kelas:</label>
                                <input type="text" class="form-control mb-2" id="kelas" name="kelas" value="{{old('kelas')}}" required>
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" required>
                                <label for="male">Laki-laki</label>
                                <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" required>
                                <label for="female">Perempuan</label><br><br>
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" class="form-control mb-2" cols="30" rows="5" id="alamat" name="alamat" value="{{old('alamat')}}" required></textarea>
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