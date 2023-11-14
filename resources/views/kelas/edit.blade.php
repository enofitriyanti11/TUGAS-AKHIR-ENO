@extends('layout.main')

@section('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="card px-5 mt-4  shadow">
                            <h1 class="text-primary pt-4 text-center mb-4">Edit Data Kelas</h1>

                            <form action="/kelas/{{$kelas->id_kelas}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <label for="nama_kelas">Nama:</label>
                                <input type="text" class="form-control mb-2 @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" value="{{$kelas->nama_kelas}}" required>
                                @error('nama_kelas')
                                <div class="invalid-feedback">{{$message}}</div>
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