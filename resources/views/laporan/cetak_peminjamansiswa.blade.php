<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Peminjaman Siswa</title>
    <style>
        @page {
            size: landscape;
        }

        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    <h1>Laporan Data Peminjaman Siswa</h1>

    @foreach ($pinjamsGroupedByKelas as $kelas => $pinjamsPerKelas)
    <h2>Kelas: {{ $kelas }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Judul Buku</th>
                <th>Rak</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjamsPerKelas as $pinjam)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pinjam->anggota->nama_anggota }}</td>
                <td>{{ $pinjam->anggota->kelas }}</td>
                <td>{{ $pinjam->buku->judul }}</td>
                <td><small>{{ $pinjam->buku->kategori->lokasi->rak }}</td>
                <td>{{ $pinjam->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
</body>

</html>