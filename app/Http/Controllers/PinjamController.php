<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjams = Pinjam::all();
        return view('pinjam.index', compact('pinjams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pinjam.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_pinjam)
    {
        $pinjam = Pinjam::findOrFail($id_pinjam);
        return view('pinjam.edit', compact('pinjam'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function getDataFromBarcode($barcode)
    {
        $data = explode(';', $barcode);
        $nama_anggota = $data[1];

        return compact('nama_anggota');
    }
    public function showForm(Request $request)
    {
        $barcode_data = $this->getDataFromBarcode($request->barcode);
        return view('formulir', $barcode_data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required|exists:kategoris,id_kategori',
            'nama_anggota' => 'required',
            // 'id_anggota' => 'required|exists:anggotas, id_anggota,',
            'id_buku' => 'required|exists:bukus, id_buku,',
            'status' => 'required',
        ]);

        pinjam::create($validatedData);
        return redirect('/pinjam')->with('pesan', 'Input Data Berhasil!');

        // $pinjam->tanggal_pinjam = now(); // Isi dengan tanggal saat ini
        // $pinjam->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id_pinjam)
    {
    }

    /**
     * Display the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_pinjam)
    {
        Pinjam::destroy($id_pinjam);
        return redirect('/pinjam')->with('pesan', 'Data berhasil dihapus');
    }
}
