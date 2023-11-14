<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\Buku;
use App\Models\Kelas;
use App\Models\Kategori;
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
        $anggotas = Anggota::with('kelas')->orderBy('id_kelas')->get();

        $pdf = new Dompdf();
        $pdf->setPaper('landscape');

        // Load view dan pass data ke dalamnya
        $pdf->loadHtml(view('laporan.cetak_siswa', compact('anggotas')));

        // Render PDF
        $pdf->render();

        return $pdf->stream('cetak_siswa.pdf');
    }


    public function cetakBuku()
    {
        $bukus = Buku::with('kategori')->orderBy('id_kategori')->orderBy('judul')->get();
        $pdf = new Dompdf();
        $pdf->setPaper('landscape');
        $pdf->loadHtml(view('laporan.cetak_buku', compact('bukus', 'pdf')));
        $pdf->render();
        return $pdf->stream('cetak_buku.pdf');
    }


    public function cetakPeminjamanSiswa()
    {
        $pinjams = Pinjam::with(['anggota', 'anggota.kelas', 'buku'])
            ->orderByRaw("MONTH(tgl_pinjam)")
            ->orderBy('tgl_pinjam')
            ->get();

        $pdf = new Dompdf();
        $pdf->setPaper('landscape');
        $pdf->loadHtml(view('laporan.cetak_peminjamansiswa', compact('pinjams')));
        $pdf->render();
        return $pdf->stream('laporan_peminjaman_siswa.pdf');
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
        return $pdf->stream('cetak_peminjaman.pdf');
    }
}
