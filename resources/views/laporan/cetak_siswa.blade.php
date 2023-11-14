<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Siswa</title>

    <style>
        @page {
            size: landscape;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .class-section {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Laporan Cetak Siswa</h1>
    <hr>
    @foreach ($anggotas->groupBy('id_kelas') as $kelasId => $siswas)
    <div class="class-section">
        <h2>Kelas: {{ $siswas[0]->kelas->nama_kelas }}</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nama_anggota }}</td>
                    <td>{{ $siswa->kelas ? $siswa->kelas->nama_kelas : 'Belum ada data kelas terkait' }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->alamat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="page-break-before: always;"></div>

    @endforeach

</body>

</html>

</html>