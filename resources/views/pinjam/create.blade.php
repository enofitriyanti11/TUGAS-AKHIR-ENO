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

                                <label for="barcode_anggota">Barcode Anggota:</label>
                                <input type="text" name="barcode_anggota" id="barcode_anggota" value="{{ old('barcode_anggota', $anggota->anggota_code->nama_anggota) }}" required>

                                <label for="barcode_buku">Barcode Buku:</label>
                                <input type="text" name="barcode_buku" id="barcode_buku" value="{{ old('barcode_buku', $buku->buku_code->judul) }}" required>

                                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                                <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="{{ $pinjam->tgl_pinjam }}">

                                <label for="tgl_kembali">Tanggal Kembali:</label>
                                <input type="date" name="tgl_kembali" id="tgl_kembali" value="{{ $pinjam->tgl_kembali }}">

                                <button type="submit">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

@endsection