@extends ('layout.main')

@section ('content')

<head>
    <script>
        // Fungsi untuk mendeteksi perubahan pada input barcode
        function handleBarcodeInput(event) {
            if (event.inputType === 'insertText') {
                // Jika ada penambahan teks, cek jika panjang teks mencukupi untuk barcode
                if (event.target.value.length >= 1000) {
                    // Submit form jika barcode mencapai panjang yang diharapkan
                    document.getElementById('pinjam-form').submit();
                }
            }
        }
    </script>
</head>

<body>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="card px-5 mt-4  shadow">
                            <h1 class="text-primary pt-4 text-center mb-4">Tambah Data Siswa</h1>

                            <form action="{{ route('pinjam.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="id_anggota">Pilih Anggota:</label>
                                <select name="id_anggota" id="id_anggota">
                                    @foreach ($anggotas as $anggota)
                                    <option value="{{ $anggota->id_anggota }}" {{ $anggota->id_anggota == $pinjam->id_anggota ? 'selected' : '' }}>
                                        {{ $anggota->nama_anggota }}
                                    </option>
                                    @endforeach
                                </select>

                                <label for="id_buku">Pilih Buku:</label>
                                <select name="id_buku" id="id_buku">
                                    @foreach ($bukus as $buku)
                                    <option value="{{ $buku->id_buku }}" {{ $buku->id_buku == $pinjam->id_buku ? 'selected' : '' }}>
                                        {{ $buku->judul }}
                                    </option>
                                    @endforeach
                                </select>

                                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                                <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="{{ $pinjam->tgl_pinjam }}">

                                <label for="tgl_kembali">Tanggal Kembali:</label>
                                <input type="date" name="tgl_kembali" id="tgl_kembali" value="{{ $pinjam->tgl_kembali }}">

                                <label for="status">Status:</label>
                                <select name="status" id="status">
                                    <option value="Pinjam" {{ $pinjam->status == 'Pinjam' ? 'selected' : '' }}>Pinjam</option>
                                    <option value="Kembali" {{ $pinjam->status == 'Kembali' ? 'selected' : '' }}>Kembali</option>
                                </select>

                                <!-- Tambahkan elemen input lain sesuai kebutuhan -->

                                <button type="submit">Update</button>
                            </form>

                            <!-- <form action="{{ route('pinjam.store') }}" method="POST">
                                @csrf
                                <input type="text" class="form-control" id="barcode" name="barcode" required>
                                <button type="button" id="scanButton">Pindai Barcode</button>
                                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                                <input type="date" name="tgl_pinjam" id="tgl_pinjam" readonly>
                                <label for="id_anggota">Nama Anggota:</label>
                                <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="{{ old('id_anggota', $id_anggota) }}" selected>{{$kategori->nama_kategori}} required>
                                <label for="id_buku">Nama Anggota:</label>
                                <input type="text" name="id_buku" id="id_buku" required>

                                <label for="judul_buku">Judul Buku:</label>
                                <input type="text" name="judul_buku" id="judul_buku" required>

                                <button type="submit">Submit</button>
                            </form> -->
                            <!-- <script>
                                document.getElementById('scanButton').addEventListener('click', function() {
                                    // Kode untuk memicu pemindai barcode dan mengisi input "barcode"
                                });
                            </script> -->
                            <!-- <script>
                                // Ini adalah contoh sederhana, Anda perlu menyesuaikan dengan cara kerja barcode scanner Anda
                                document.addEventListener('keypress', function(event) {
                                    if (event.key === 'Enter') {
                                        if (document.activeElement === document.getElementById('nama_anggota')) {
                                            // Mengisi input nama anggota dengan data dari barcode scanner
                                            document.getElementById('nama_anggota').value = scannedDataFromBarcode;
                                        } else if (document.activeElement === document.getElementById('judul_buku')) {
                                            // Mengisi input judul buku dengan data dari barcode scanner
                                            document.getElementById('judul_buku').value = scannedDataFromBarcode;
                                        }
                                    }
                                });
                            </script> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

@endsection