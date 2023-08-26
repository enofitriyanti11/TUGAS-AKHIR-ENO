<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = anggota::all();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {

        return view('anggota.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_anggota)
    {
        $anggota = anggota::findOrFail($id_anggota);
        return view('anggota.edit', compact('anggota'));
    }

    public function store(Request $request)
    {

        $number = mt_rand(1000000000, 9999999999);

        if ($this->anggotaCodeExists($number)) {
            $number = mt_rand(1000000000, 9999999999);
        }

        $request['anggota_code'] = $number;

        $validatedData = $request->validate([
            'nama_anggota' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'anggota_code' => 'required'

        ]);
        anggota::create($validatedData);
        return redirect('/anggota')->with('pesan', 'Input Data Berhasil!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id_anggota)
    {
        $this->validate($request, [
            'nama_anggota' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $anggota = anggota::findOrFail($id_anggota);
        $anggota->nama_anggota = $request->input('nama_anggota');
        $anggota->kelas = $request->input('kelas');
        $anggota->jenis_kelamin = $request->input('jenis_kelamin');
        $anggota->alamat = $request->input('alamat');
        $anggota->save();

        return redirect('/anggota')->with('success', 'anggota berhasil diperbarui.');
    }

    public function anggotaCodeExists($number)
    {
        return anggota::whereAnggotaCode($number)->exists();
    }

    public function destroy(Request $request, $id_anggota)
    {
        anggota::destroy($id_anggota);
        return redirect('/anggota')->with('pesan', 'Data berhasil dihapus');
    }

    public function show()
    {
        $anggotas = anggota::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('anggota.cetak_kartu', compact('anggotas', 'pdf')));
        $pdf->render();
        return $pdf->stream();
    }
}
