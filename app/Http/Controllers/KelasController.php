<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => [
                'required',
                Rule::unique('kelas', 'nama_kelas'),
            ],
        ], [
            'nama_kelas.unique' => 'Nama kelas sudah digunakan.',
        ]);
        Kelas::create($validatedData);
        return redirect('/kelas')->with('pesan', 'Input Data Berhasil!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id_kelas)
    {
        $this->validate($request, [
            'nama_kelas'     => 'required',
        ]);

        $kelas = Kelas::findOrFail($id_kelas);
        $kelas->nama_kelas = $request->input('nama_kelas');
        $kelas->save();

        return redirect('/kelas')->with('pesan', 'kelas berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id_kelas)
    {
        Kelas::destroy($id_kelas);
        return redirect('/kelas')->with('pesan', 'Data berhasil dihapus');
    }
}
