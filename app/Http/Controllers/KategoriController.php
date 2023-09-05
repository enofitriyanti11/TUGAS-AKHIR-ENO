<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',

        ]);
        Kategori::create($validatedData);
        return redirect('/kategori')->with('pesan', 'Input Data Berhasil!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id_kategori)
    {
        $this->validate($request, [
            'nama_kategori'     => 'required',
        ]);

        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();

        return redirect('/kategori')->with('pesan', 'Kategori berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_kategori)
    {
        Kategori::destroy($id_kategori);
        return redirect('/kategori')->with('pesan', 'Data berhasil dihapus');
    }
}
