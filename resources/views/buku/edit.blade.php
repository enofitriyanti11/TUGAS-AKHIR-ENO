@extends ('layout.main')

@section ('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-2">
                <div class="row justify-content-md-center">
                    <div class="col-md-8">
                        <div class="card px-4 mt-4  shadow">
                            <h1 class="text-primary pt-4 text-center mb-4">Tambah Data Buku</h1>

                            <form action="/buku/{{$buku->id_buku}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $buku->judul }}" required>
                                    @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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
                                <div class="mb-3">
                                    <label for="pengarang" class="form-label">Pengarang</label>
                                    <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ $buku->pengarang }}" required>
                                    @error('pengarang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="penerbit" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}" required>
                                    @error('penerbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_terbit" class="form-label">tempat_terbit</label>
                                    <input type="text" class="form-control @error('tempat_terbit') is-invalid @enderror" id="tempat_terbit" name="tempat_terbit" value="{{ $buku->tempat_terbit }}" required>
                                    @error('tempat_terbit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="stok" class="form-label">stok</label>
                                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ $buku->stok }}" required>
                                    @error('stok')
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