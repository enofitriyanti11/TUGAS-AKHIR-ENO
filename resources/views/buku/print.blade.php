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
            width: 30%;
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

<body onload="window.print()">
    <h3>Cetak Barcode Buku <br> {{ $buku->judul }}</h3>
    <hr />
    <div class="container">
        @for ($i = 0; $i < $buku->stok; $i++)
        <div class="column">
            <div>{{ $buku->judul }}</div>
            <div class="barcode">
                {!! DNS1D::getBarcodeHTML(htmlspecialchars($buku->buku_code), 'EAN13') !!}
                <div>{{ $buku->buku_code }}</div>
            </div>
        </div>
        @endfor
    </div>
</body>

</html>
