<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\Buku;

use App\Models\Pinjam;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::all(); // Ubah ini dengan query sesuai kebutuhan
        return view('laporan.index', compact('pinjams'));
    }

    public function cetakSiswa()
    {
        $anggotas = anggota::all();
        $anggotas = anggota::orderBy('kelas')->get();
        $anggotas = anggota::orderBy('kelas')
            ->orderBy('nama_anggota')
            ->get();
        $pdf = new Dompdf();
        $pdf->setPaper('landscape');
        $pdf->loadHtml(view('laporan.cetak_siswa', compact('anggotas', 'pdf')));
        $pdf->render();
        return $pdf->stream();
    }

    public function cetakBuku()
    {
        $bukus = Buku::with('kategori')->orderBy('id_kategori')->orderBy('judul')->get();
        $pdf = new Dompdf();
        $pdf->setPaper('landscape');
        $pdf->loadHtml(view('laporan.cetak_buku', compact('bukus', 'pdf')));
        $pdf->render();
        return $pdf->stream();
    }

    public function cetakPeminjamanSiswa()
    {
        $pinjams = Pinjam::with(['anggota', 'buku'])
            ->orderBy('id_pinjam')
            ->get();

        // Mengambil daftar kelas dari tabel Kelas dan urutkan sesuai keinginan
        $kelasOrder = anggota::orderBy('kelas')->pluck('kelas')->toArray();

        $pinjamsGroupedByKelas = $pinjams->groupBy(function ($item) {
            return $item->anggota->kelas;
        })->sortBy(function ($items, $kelas) use ($kelasOrder) {
            return array_search($kelas, $kelasOrder);
        });

        $pdf = new Dompdf();
        $pdf->setPaper('landscape');
        $pdf->loadHtml(view('laporan.cetak_peminjamansiswa', compact('pinjamsGroupedByKelas')));
        $pdf->render();
        return $pdf->stream();
    }


    public function cetakPeminjaman()
    {
        $pinjams = Pinjam::with(['anggota', 'buku'])
            ->orderByRaw("MONTH(tgl_pinjam)")
            ->orderBy('tgl_pinjam')
            ->get();

        $pdf = new Dompdf();
        $pdf->setPaper('landscape');
        $pdf->loadHtml(view('laporan.cetak_peminjaman', compact('pinjams', 'pdf')));
        $pdf->render();
        return $pdf->stream();
    }
}
