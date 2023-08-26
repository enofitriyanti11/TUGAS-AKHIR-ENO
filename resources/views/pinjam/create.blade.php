@extends ('layout.main')

@section ('content')

<head>
    <!-- <script>
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
    </script> -->
</head>

<body>

    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid  px-4">
                <div class="row justify-content-md-center">
                    <div class="col-md-9">
                        <div class="card px-5 mt-4  shadow">
                            <h1 class="text-primary pt-4 text-center mb-4">Tambah Data Peminjaman</h1>

                            <form action="{{ route('pinjam.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- editeno -->
                                <label for="barcodeAnggota">Kode Barcode Anggota:</label>
                                <input type="text" class="form-control mb-2" id="barcodeAnggota" name="barcodeAnggota" autofocus>
                                <br>
                                <label for="barcodeBuku">Kode Barcode Buku:</label>
                                <input type="text" class="form-control mb-2" id="barcodeBuku" name="barcodeBuku">
                                <br>
                                <!-- editeno -->

                                <label for="judul">Judul Buku:</label>
                                <input type="text" class="form-control mb-2" name="judul" id="judul" value="">

                                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                                <input type="date" class="form-control mb-2" name="tgl_pinjam" id="tgl_pinjam" value="{{old('tgl_pinjam')}}}">

                                <label for="tgl_kembali">Tanggal Kembali:</label>
                                <input type="date" class="form-control mb-2" name="tgl_kembali" id="tgl_kembali" value="{{old('tgl_kembali')}}">

                                <div class="mb-3">
                                    <label for="status">Status:</label>
                                    <select class="form-select" name="id_kategori" aria-label="Default select example">
                                        <option value="dipinjam">Dipinjam</option>
                                        <option value="dikembalikan">Dikembalikan</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">submit</button>
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