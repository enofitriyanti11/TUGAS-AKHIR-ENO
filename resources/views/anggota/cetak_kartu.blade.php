<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Pustaka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .ktp-cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 15px;
            margin-top: 15px;
        }

        .ktp-card {
            width: 48%;
            /* Mengatur lebar kartu untuk 2 kartu per baris */
            height: 225px;
            border: 1px solid #ccc;
            margin: 10px;
            margin-bottom: auto;
        }

        .ktp-card h4 {
            text-align: center;
            margin: 5px 0;
        }

        .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: auto;
        }

        .name {
            font-weight: bold;
        }

        .barcode {
            /* text-align: center; */
            margin-left: 20px;
            margin-top: 10px;
        }

        /* CSS untuk membagi kertas menjadi dua bagian */
        @media print {
            body {
                width: 100%;
                page-break-before: always;
            }

            .ktp-cards-container {
                width: 48%;
                float: left;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    @foreach ($anggotas as $anggota)
    <div class="ktp-card">
        <div class="details">
            <div class="col"></div>
            <div class="row">
                <h4>Sekolah Dasar Islam Terpadu</h4>
                <h4>Adzkia 1 Kota Padang</h4>
                <div class="col-lg-9 md-5">
                    <div class="col">Nama: {{ $anggota->nama_anggota }}</div>
                    <div class="col">Jenis Kelamin: {{ $anggota->jenis_kelamin }}</div>
                    <div class="col">Kelas: {{ $anggota->kelas->nama_kelas }}</div>
                </div>
                <div class="barcode">
                    {!! DNS1D::getBarcodeHTML(htmlspecialchars($anggota->anggota_code), 'EAN13') !!}
                    <p class="barcode">p - {{ $anggota->anggota_code }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</body>

</html> -->

<!-- edit baru -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Pustaka</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
.col-md-6 {
    flex: 0 0 calc(50% - 10px);
    margin-right: 10px;
}
        /* .ktp-cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 15px;
            margin-top: 15px;
        } */

        .ktp-card {
            width: 100%;
            /* Mengatur lebar kartu untuk 2 kartu per baris */
            /* height: 225px; */
            border: 1px solid #ccc;
            margin: 10px;
            margin-bottom: auto;
        }

        .ktp-card h4 {
            text-align: center;
            margin: 10px 0;
        }

         .details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 10px;
            margin-left: 10px;
            margin-bottom: auto;
        }

         .name {
            font-weight: bold;
        }

        .barcode {
            text-align: center;
            margin-left: 20px;
            margin-top: 10px;
        }

        /* CSS untuk halaman cetak */
        /* @media print {
            body {
                margin: 0;
            }

            .ktp-cards-container {
                page-break-before: always;
                width: 100%;
                display: flex;
                justify-content: space-between;
            }

            .ktp-card {
                width: 50%;
                page-break-inside: avoid;
            }
        } */
    </style>
</head>

<body onload="window.print()">
    {{-- <div class="ktp-cards-container"> --}}
        <div class="row">
            @foreach ($anggotas as $anggota)
            <div class="col-md-6">
                <div class="ktp-card">
                    <div class="details">
                        <div class="col"></div>
                        <div class="row">
                            <h4>Sekolah Dasar Islam Terpadu</h4>
                            <h4>Adzkia 1 Kota Padang</h4>
                            <div class="col-lg-9 md-5">
                                <div class="col">Nama: {{ $anggota->nama_anggota }}</div>
                                <div class="col">Jenis Kelamin: {{ $anggota->jenis_kelamin }}</div>
                                <div class="col">Kelas: {{ $anggota->kelas->nama_kelas }}</div>

                            </div>
                            <div class="barcode">
                                {!! DNS1D::getBarcodeHTML(htmlspecialchars($anggota->anggota_code), 'EAN13') !!}
                                <p class="barcode">p - {{ $anggota->anggota_code }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    {{-- </div> --}}
</body>

</html>
