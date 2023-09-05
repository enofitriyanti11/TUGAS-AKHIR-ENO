@extends('layout.main')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="row justify-content-md-center">
                <div class="col-md-9">
                    <div class="card px-5 mt-4 shadow pb-5">
                        <h1 class="text-primary pt-4 text-center mb-4">Edit Data Peminjaman</h1>

                        <form action="{{ route('pinjam.update', $pinjam->id_pinjam) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Menambahkan method PUT untuk update -->

                            <!-- Menampilkan data anggota -->
                            <div class="mb-2">
                                <label for="anggota">Nama Anggota:</label>
                                <input type="text" class="form-control" value="{{ $pinjam->anggota->nama_anggota }}" readonly>
                            </div>

                            <!-- Menampilkan data buku -->
                            <div class="mb-2">
                                <label for="buku">Judul Buku:</label>
                                <input type="text" class="form-control" value="{{ $pinjam->buku->judul }}" readonly>
                            </div>

                            <!-- Menampilkan tanggal pinjam -->
                            <div class="mb-2">
                                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                                <input type="date" class="form-control" value="{{ $pinjam->tgl_pinjam }}" readonly>
                            </div>

                            <!-- Menampilkan tanggal kembali -->
                            <div class="mb-2">
                                <label for="tgl_kembali">Tanggal Kembali:</label>
                                <input type="date" class="form-control" value="{{ $pinjam->tgl_kembali }}" readonly>
                            </div>

                            <!-- Form input lama peminjaman -->
                            <div class="mb-3">
                                <label for="lama_pinjam">Lama Peminjaman:</label>
                                <select class="form-select" name="lama_pinjam" required>
                                    <option value="">-select lama peminjaman</option>
                                    <option value="3" {{ $pinjam->lama_pinjam == 3 ? 'selected' : '' }}>+3 Hari</option>
                                    <option value="5" {{ $pinjam->lama_pinjam == 5 ? 'selected' : '' }}>+5 Hari</option>
                                    <option value="7" {{ $pinjam->lama_pinjam == 7 ? 'selected' : '' }}>+7 Hari</option>
                                </select>
                            </div>

                            <!-- Tombol untuk update data -->
                            <button type="submit" class="btn btn-primary">Update Peminjaman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection