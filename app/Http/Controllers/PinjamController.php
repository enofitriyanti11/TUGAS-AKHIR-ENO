<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjams = Pinjam::with('anggota', 'buku')->get();
        return view('pinjam.index', compact('pinjams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggotas = anggota::all(); // Mengambil semua data anggota
        $bukus = Buku::all(); // Mengambil semua data buku

        return view('pinjam.create', compact('anggotas', 'bukus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_pinjam)
    {
        $pinjam = Pinjam::findOrFail($id_pinjam);
        $anggotas = anggota::all(); // Mengambil semua data anggota
        $bukus = Buku::all(); // Mengambil semua data buku
        return view('pinjam.edit', compact('pinjam', 'anggotas', 'bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */

    // public function getDataFromBarcode($barcode)
    // {
    //     $data = explode(';', $barcode);
    //     $nama_anggota = $data[1];

    //     return compact('nama_anggota');
    // }
    // public function showForm(Request $request)
    // {
    //     $barcode_data = $this->getDataFromBarcode($request->barcode);
    //     return view('formulir', $barcode_data);
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_anggota' => 'required|exists:anggotas,id_anggota',
            'id_buku' => 'required|exists:bukus,id_buku',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required',

        ]);
        Pinjam::create($validatedData);
        return redirect('/pinjam')->with('pesan', 'Input Data Berhasil!');
    }
    // public function save_pinjam(Request $request)

    // {

    //     //dd($request->all());

    //     Pinjam::create([
    //         'name' => $request['name'],
    //         'daily' => $request['daily'],
    //         'next' => $request['next'],
    //         'status' => "daily",
    //         'waktu' => $request['waktu'],
    //         'updated_at' => $request['updated_at'],

    //     ]);

    //     return redirect()->route('daily')->with('succes', 'Data berhasil ditambah');
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id_pinjam)
    {
        $this->validate($request, [
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
        $pinjam->save();

        return redirect('/pinjam')->with('success', 'Peminjaman berhasil diperbarui.');
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
