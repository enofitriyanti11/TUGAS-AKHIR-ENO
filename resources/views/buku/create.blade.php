@extends ('layout.main')

@section ('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-2">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <div class="card px-3 mt-2  shadow">
                            <h1 class="text-primary pt-3 text-center mb-4">Tambah Data Buku</h1>

                            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="judul">Judul:</label>
                                <input type="text" class="form-control mb-2" id="judul" name="judul" value="{{old('judul')}}" required>
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
                                <label for="pengarang">Pengarang:</label>
                                <input type="text" class="form-control mb-2" id="pengarang" name="pengarang" value="{{old('pengarang')}}" required>
                                <label for="penerbit">Penerbit:</label>
                                <input type="text" class="form-control mb-2" id="penerbit" name="penerbit" value="{{old('penerbit')}}" required>
                                <label for="tempat_terbit">Tempat Terbit:</label>
                                <input type="text" class="form-control mb-2" id="tempat_terbit" name="tempat_terbit" value="{{old('tempat_terbit')}}" required>
                                <label for="stok">Stok:</label>
                                <input type="number" class="form-control mb-2" id="stok" name="stok" value="{{old('stok')}}" required style="width: 200px;">
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