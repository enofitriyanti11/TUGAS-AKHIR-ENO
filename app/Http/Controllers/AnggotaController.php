<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\Kelas;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = anggota::with('kelas')->get();
        return view('anggota.index', compact('anggotas'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('anggota.create', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_anggota)
    {
        $anggota = anggota::findOrFail($id_anggota);
        $kelas = Kelas::all();
        return view('anggota.edit', compact('anggota', 'kelas'));
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


    public function store(Request $request)
    {
        // Generate 12 digit random number
        $randomNumber = mt_rand(100000000000, 999999999999);

        // Calculate 1 digit checksum
        $checksum = $this->calculateEAN13Checksum($randomNumber);

        // Create 13 digit anggota code
        $anggotaCode = $randomNumber . $checksum;

        // Validate and ensure it's unique
        if ($this->anggotaCodeExists($anggotaCode)) {
            // Generate again if it's not unique
            // ...
        }

        $request['anggota_code'] = $anggotaCode;

        $validatedData = $request->validate([
            'nama_anggota' => 'required',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'anggota_code' => 'required',
            'tahun' => 'required|numeric',

        ]);
        anggota::create($validatedData);
        return redirect('/anggota')->with('pesan', 'Input Data Berhasil!');
    }

    public function anggotaCodeExists($code)
    {
        return anggota::where('anggota_code', $code)->exists();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id_anggota)
    {
        $this->validate($request, [
            'nama_anggota' => 'required',
            'id_kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tahun' => 'required',
        ]);

        $anggota = anggota::findOrFail($id_anggota);
        $anggota->nama_anggota = $request->input('nama_anggota');
        $anggota->id_kelas = $request->input('id_kelas');
        $anggota->jenis_kelamin = $request->input('jenis_kelamin');
        $anggota->alamat = $request->input('alamat');
        $anggota->tahun = $request->input('tahun');
        $anggota->save();

        return redirect('/anggota')->with('pesan', 'anggota berhasil diperbarui.');
    }

    public function destroy(Request $request, $id_anggota)
    {
        anggota::destroy($id_anggota);
        return redirect('/anggota')->with('pesan', 'Data berhasil dihapus');
    }

    public function show()
    {
        $anggotas = anggota::all();
        return view('anggota.cetak_kartu', compact('anggotas'));

        // $pdf = new Dompdf();
        // $pdf->loadHtml(view('anggota.cetak_kartu', compact('anggotas', 'pdf')));
        // $pdf->render();
        // return $pdf->stream();
    }
}
