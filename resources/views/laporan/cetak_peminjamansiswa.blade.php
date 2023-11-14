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
    <h1>Laporan Peminjaman Siswa</h1>
    <hr>
    @foreach ($pinjams->groupBy('anggota.kelas.nama_kelas') as $kelas => $peminjamanKelas)
    <h2>Kelas: {{ $kelas }}</h2>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Nama Kelas</th>
                <th>Judul Buku Dipinjam</th>
                <th>Status</th>
                <th>Denda</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($peminjamanKelas as $pinjam)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pinjam->anggota->nama_anggota }}</td>
                <td>{{ $pinjam->anggota->kelas ? $pinjam->anggota->kelas->nama_kelas : 'Belum ada data kelas terkait' }}</td>
                <td>{{ $pinjam->buku->judul }}</td>
                <td>
                    <span class="badge {{ $pinjam->status == 'dipinjam' ? 'bg-danger' : 'bg-success' }}">{{ $pinjam->status }}</span>
                </td>
                <td>{{ $pinjam->status == 'dipinjam' ? '-' : 'Rp ' . number_format($pinjam->denda) }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
</body>

</html>