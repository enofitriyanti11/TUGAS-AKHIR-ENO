<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\anggota;
use App\Models\Buku;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::with('anggota', 'buku')->get();
        return view('pinjam.index', compact('pinjams'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('pinjam.create', compact('anggotas', 'bukus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required',
        ]);

        Pinjam::create([
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => date("Y-m-d", strtotime($request->tgl_pinjam . " +$request->lama_pinjam days")),
            'status' => 'dipinjam',
        ]);

        //update stok berkurang
        Buku::where('id_buku', $request->id_buku)->update([
            'stok' => DB::raw("stok-1")
        ]);
        return redirect()->route('pinjam.index')->with('pesan', 'Input Data Berhasil!');

        // return redirect('/pinjam')->with('pesan', 'Input Data Berhasil!');
    }

    public function konfirmasi_pengembalian(Pinjam $pinjam)
    {
        //update status pinjam, dan tgl pengembalian
        $pinjam->tgl_pengembalian = now();
        $pinjam->status = 'dikembalikan';
        //hitung denda jika lewat tgl kembali
        $returnDateTime = new DateTime($pinjam->tgl_kembali);
        $returnedDateTime = new DateTime(now());

        if ($returnedDateTime > $returnDateTime) {
            $interval = $returnDateTime->diff($returnedDateTime);
            if ($interval->days > 0) {
                $pinjam->denda = $interval->days * 500;
            } else {
                $pinjam->denda = 0;
            }
        } else {
            $pinjam->denda = 0;
        }
        //update stok
        Buku::where('id_buku', $pinjam->id_buku)->update([
            'stok' => DB::raw("stok+1")
        ]);
        $pinjam->save();
        return redirect()->route('pinjam.index')->with('pesan', 'Berhasil dikonfirmasi!');
    }

    public function update(Request $request, $id_pinjam)
    {

        $validatedData = $request->validate([
            'id_anggota' => 'required|exists:anggotas,id_anggota',
            'id_buku' => 'required|exists:bukus,id_buku',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required',
        ]);

        $pinjam = Pinjam::findOrFail($id_pinjam);
        $pinjam->id_anggota = $request->input('id_anggota');
        $pinjam->id_buku = $request->input('id_buku');
        $pinjam->tgl_pinjam = $request->input('tgl_pinjam');
        $pinjam->tgl_kembali = $request->input('tgl_kembali');
        $pinjam->status = $request->input('status');

        // Simpan tanggal tgl_seharusnya_kembali sebagai string dari input form
        $tglSeharusnyaKembaliStr = $request->input('tgl_seharusnya_kembali');

        // Ubah string menjadi objek DateTime
        $tglSeharusnyaKembali = new \DateTime($tglSeharusnyaKembaliStr);

        // Simpan tanggal tgl_kembali sebagai string dari input form
        $tglKembaliStr = $request->input('tgl_kembali');

        // Ubah string menjadi objek DateTime
        $tglKembali = new \DateTime($tglKembaliStr);

        // Hitung selisih hari antara tanggal kembali dan tanggal seharusnya dikembalikan
        $selisihHari = $tglKembali->diff($tglSeharusnyaKembali)->days;

        // Hitung denda jika terlambat mengembalikan
        $denda = $selisihHari > 0 ? $selisihHari * 500 : 0;

        $pinjam->denda = $denda;

        $pinjam->save();
        $pinjam->update($validatedData);


        return redirect('/pinjam.index')->with('success', 'Peminjaman berhasil diperbarui.');
    }


    public function destroy($id_pinjam)
    {
        $pinjam = Pinjam::where('id_pinjam', $id_pinjam)->first();
        //update stok bertambah
        Buku::where('id_buku', $pinjam->id_buku)->update([
            'stok' => DB::raw("stok+1")
        ]);
        Pinjam::destroy($id_pinjam);
        return redirect('/pinjam')->with('pesan', 'Data berhasil dihapus');
    }

    public function getAnggotaInfo(Request $request)
    {
        $barcodeAnggota = $request->barcodeAnggota;
        $anggota = anggota::where('anggota_code', $barcodeAnggota)->first();
        return response()->json([
            'status' => 'ok',
            'anggota' => $anggota,
        ]);
    }

    public function getBukuInfo(Request $request)
    {
        $barcodebuku = $request->barcodeBuku;
        $buku = Buku::where('buku_code', $barcodebuku)->first();
        return response()->json([
            'status' => 'ok',
            'buku' => $buku,
        ]);
    }
}
