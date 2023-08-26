<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            width: 300px;
            height: 250px;
            border: 1px solid #ccc;
            margin: 10px;
            margin-bottom: auto;
        }

        .ktp-card:not(:first-child) {
            margin-top: 10px;
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
    </style>
</head>

<body>
    <div class="ktp-cards-container">

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
                        <div class="col">Kelas: {{ $anggota->kelas }}</div>
                    </div>
                    <div class="barcode">
                        {!! DNS1D::getBarcodeHTML($anggota->anggota_code, 'UPCA', 2, 50) !!}
                        <p>{{ $anggota->anggota_code }}</p>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</body>

</html>