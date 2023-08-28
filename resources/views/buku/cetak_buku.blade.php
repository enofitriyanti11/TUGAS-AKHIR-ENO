<!DOCTYPE html>
<html>

<head>
    <title>Cetak Barcode Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h3 {
            text-align: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
        }

        .column {
            width: 25%;
            /* Empat kolom, setiap kolom mengambil 25% lebar */
            padding: 10px;
            box-sizing: border-box;
        }

        /* Gaya tambahan untuk tampilan yang bagus */
        .column p {
            background-color: #f2f2f2;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .barcode {
            margin-top: 10px;
            /* Tambahkan margin atas */
        }
    </style>
</head>

<body>
    <h3>Cetak Barcode Buku</h3>
    <hr />
    <div class="container">
        @foreach ($bukus as $buku)
        <div class="column">
            <div>{{ $buku->judul }}</div>

            <div class="barcode">
                {!! DNS1D::getBarcodeHTML(htmlspecialchars($buku->buku_code), 'EAN13') !!}
                <div>{{ $buku->buku_code }}</div>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>