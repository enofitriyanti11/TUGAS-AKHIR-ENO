<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Kategori;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::with('kategori')->get();
        return view('lokasi.index', compact('lokasis'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('lokasi.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'rak' => 'required',
        ]);

        lokasi::create($validatedData);
        return redirect('/lokasi')->with('pesan', 'Input Data Berhasil!');
    }

    public function edit($id_lokasi)
    {
        $lokasi = Lokasi::findOrFail($id_lokasi);
        $kategoris = Kategori::all();
        return view('lokasi.edit', compact('lokasi', 'kategoris'));
    }

    public function update(Request $request, $id_lokasi)
    {
        // Validasi input data jika diperlukan

        $this->validate($request, [
            'id_kategori' => 'required',
            'rak' => 'required',
        ]);


        // Cari lokasi yang akan diupdate
        $lokasi = lokasi::findOrFail($id_lokasi);

        // Update data lokasi
        $lokasi->id_kategori = $request->input('id_kategori');
        $lokasi->rak = $request->input('rak');
        $lokasi->save();

        return redirect('/lokasi')->with('pesan', 'Data lokasi berhasil diperbarui.');
    }

    public function destroy($id_lokasi)
    {
        $lokasi = Lokasi::find($id_lokasi);
        $lokasi->delete();

        return redirect()->route('lokasi.index')->with('pesan', 'Data berhasil dihapus');
    }
}
