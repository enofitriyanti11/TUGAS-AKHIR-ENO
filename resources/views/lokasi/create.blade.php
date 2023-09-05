@extends('layout.main')

@section('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="card px-5 mt-4  shadow">
                            <h1 class="text-primary pt-4 text-center mb-4">Tambah Data Lokasi Buku</h1>

                            <form action="{{ route('lokasi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Kategori</label>
                                    <select class="form-select" name="id_kategori" aria-label="Default select example">
                                        @foreach ($kategoris as $kategori)
                                        @if (old('id_kategori')==$kategori->id_kategori)
                                        <option value="{{$kategori->id_kategori}}" selected>{{$kategori->nama_kategori}}</option>
                                        @else
                                        <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <label for="rak">rak:</label>
                                <input type="text" class="form-control mb-2" id="rak" name="rak" value="{{old('rak')}}" required>
                                <button type="submit" class="btn btn-success">submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection