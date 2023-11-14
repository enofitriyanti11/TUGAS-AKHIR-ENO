@extends ('layout.main')
@section ('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <div class="card px-3 mt-2  shadow">
                            <h1 class="text-primary pt-3 text-center mb-4">Tambah Data Siswa</h1>

                            <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="nama_anggota">Nama:</label>
                                <input type="text" class="form-control mb-2" id="nama_anggota" name="nama_anggota" value="{{old('nama_anggota')}}" required>
                                <div class="mb-3">
                                    <label for="id_kelas" class="form-label">Kelas</label>
                                    <select class="form-select" name="id_kelas" aria-label="Default select example">
                                        @foreach ($kelas as $kelas)
                                        @if (old('id_kelas')==$kelas->id_kelas)
                                        <option value="{{$kelas->id_kelas}}" selected>{{$kelas->nama_kelas}}</option>
                                        @else
                                        <option value="{{$kelas->id_kelas}}">{{$kelas->nama_kelas}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" required>
                                <label for="male">Laki-laki</label>
                                <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" required>
                                <label for="female">Perempuan</label><br><br>
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" class="form-control mb-2" cols="20" rows="3" id="alamat" name="alamat" value="{{old('alamat')}}" required></textarea>
                                <label for="tahun">Tahun:</label>
                                <input type="text" class="form-control mb-2" id="tahun" name="tahun" value="{{old('tahun')}}" required>
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