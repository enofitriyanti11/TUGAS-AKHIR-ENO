@extends('layout.main')

@section('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="card px-5 mt-4  shadow">
                            <h1 class="text-primary pt-4 text-center mb-4">Tambah Data Kategori</h1>

                            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="nama_kategori">Nama:</label>
                                <input type="text" class="form-control mb-2" id="nama_kategori" name="nama_kategori" value="{{old('nama_kategori')}}" required>
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