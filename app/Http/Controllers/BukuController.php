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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $number = mt_rand(1000000000, 9999999999);

        if ($this->bukuCodeExists($number)) {
            $number = mt_rand(1000000000, 9999999999);
        }

        $request['buku_code'] = $number;

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

        return redirect('/buku')->with('success', 'anggota berhasil diperbarui.');
    }

    public function bukuCodeExists($number)
    {
        return Buku::whereBukuCode($number)->exists();
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
}
