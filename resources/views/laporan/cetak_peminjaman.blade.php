<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Peminjaman</title>
    <style>
        @page {
            size: landscape;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }

        .bg-danger {
            background-color: #dc3545;
            color: white;
        }

        .bg-success {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Peminjaman</h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rentang Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Judul Buku</th>
                    <th>Rak</th>
                    <th>Denda</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjams as $pinjam)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ date('d-m-Y', strtotime($pinjam->tgl_pinjam)) }} s/d {{ date('d-m-Y', strtotime($pinjam->tgl_kembali)) }}</td>
                    <td>{{ $pinjam->status == 'dipinjam' ? 'belum dikembalikan' : date('d-m-Y', strtotime($pinjam->tgl_pengembalian)) }}</td>
                    <td>{{ $pinjam->anggota->nama_anggota }}</td>
                    <td>{{ $pinjam->anggota->kelas }}</td>
                    <td>{{ $pinjam->buku->judul }}</td>
                    <b><small>{{ $pinjam->buku->kategori->lokasi->rak }}</b>
                    <td>{{ $pinjam->status == 'dipinjam' ? 'belum dikembalikan' : 'Rp ' . number_format($pinjam->denda) }}</td>
                    <td>
                        <span class="badge {{ $pinjam->status == 'dipinjam' ? 'bg-danger' : 'bg-success' }}">{{ $pinjam->status }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>