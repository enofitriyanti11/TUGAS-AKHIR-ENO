@extends ('layout.main')
@section ('content')

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="card px-5 mt-4  shadow">
                            <h1 class="text-primary pt-4 text-center mb-4">Tambah Data User</h1>

                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" class="p-5">
                                @csrf
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control mb-2" id="nama" name="nama" value="{{old('nama')}}" required>
                                <label for="email">Email:</label>
                                <input type="email" class="form-control mb-2" id="email" name="email" value="{{old('email')}}" required>
                                <label for="password">Password:</label>
                                <input type="password" class="form-control mb-2" id="password" name="password" value="{{old('password')}}" required>
                                <label for="level">Level:</label>
                                <select name="level" id="" class="form-control" required>
                                    <option value="">-select level</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    <option value="kepala sekolah">Kepala sekolah</option>
                                </select>
                                <br><br>
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
