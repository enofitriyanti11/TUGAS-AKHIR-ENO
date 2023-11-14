<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::with('kategori')->get();
        return view('buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('buku.create', compact('kategoris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_buku)
    {
        $buku = buku::findOrFail($id_buku);
        $kategoris = Kategori::all();
        return view('buku.edit', compact('buku', 'kategoris'));
    }

    private function calculateEAN13Checksum($digits)
    {
        $digitsArray = str_split($digits); // Konversi angka menjadi array digit

        $evenSum = 0;
        $oddSum = 0;

        for ($i = 0; $i < 12; $i++) {
            if ($i % 2 === 0) {
                $oddSum += $digitsArray[$i];
            } else {
                $evenSum += $digitsArray[$i];
            }
        }

        $totalSum = $oddSum + $evenSum * 3;
        $remainder = $totalSum % 10;

        return $remainder === 0 ? 0 : 10 - $remainder;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Generate 12 digit random number
        $randomNumber = mt_rand(100000000000, 999999999999);

        // Calculate 1 digit checksum
        $checksum = $this->calculateEAN13Checksum($randomNumber);

        // Create 13 digit anggota code
        $bukuCode = $randomNumber . $checksum;

        // Validate and ensure it's unique
        if ($this->bukuCodeExists($bukuCode)) {
            // Generate again if it's not unique
            // ...
        }

        $request['buku_code'] = $bukuCode;

        $validatedData = $request->validate([
            'judul' => 'required',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tempat_terbit' => 'required',
            'stok' => 'required',
            'buku_code' => 'required'

        ]);

        buku::create($validatedData);
        return redirect('/buku')->with('pesan', 'Input Data Berhasil!');
    }

    public function bukuCodeExists($code)
    {
        return Buku::where('buku_code', $code)->exists();
    }

    public function update(Request $request,  $id_buku)
    {
        $this->validate($request, [
            'judul' => 'required',
            'id_kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tempat_terbit' => 'required',
            'stok' => 'required',
        ]);

        $buku = buku::findOrFail($id_buku);
        $buku->judul = $request->input('judul');
        $buku->id_kategori = $request->input('id_kategori');
        $buku->pengarang = $request->input('pengarang');
        $buku->penerbit = $request->input('penerbit');
        $buku->tempat_terbit = $request->input('tempat_terbit');
        $buku->stok = $request->input('stok');
        $buku->save();

        return redirect('/buku')->with('pesan', 'Buku berhasil diperbarui.');
    }

    public function destroy(Request $request, $id_buku)
    {
        Buku::destroy($id_buku);
        return redirect('/buku')->with('pesan', 'Data berhasil dihapus');
    }


    public function show()
    {
        $bukus = Buku::with('kategori')->get();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('buku.cetak_buku', compact('bukus', 'pdf')));
        $pdf->render();
        return $pdf->stream();
    }

    public function buku_print(Buku $buku)
    {
        return view('buku.print', compact('buku'));
    }
}
