<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Models\Pinjam;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['not_login'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login-s', [AuthController::class, 'login'])->name('proses_login');
});

Route::middleware(['auth', 'is_login'])->group(function () {
    Route::get('/dashboard', function () {
        $bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
        $tahun = date('Y');
        $data = [];
        $pinjam = [];
        $kembali = [];
        foreach ($bulan as $key => $b) {
            $pinjam[] =  [
                "x" => $b,
                "y" => Pinjam::whereMonth('tgl_pinjam', $key + 1)->whereYear('tgl_pinjam', $tahun)->where('status', 'dipinjam')->count()
            ];
            $kembali[] = [
                "x" => $b,
                "y" => Pinjam::whereMonth('tgl_pinjam', $key + 1)->whereYear('tgl_pinjam', $tahun)->where('status', 'dikembalikan')->count(),
            ];
        }
        return view('dashboard.index', compact('data', 'pinjam', 'kembali'));
    })->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('user', UserController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::get('anggota/cetak', [AnggotaController::class, 'show'])->name('anggota.cetak_kartu');
    Route::resource('buku', BukuController::class);
    Route::get('buku/cetak', [BukuController::class, 'cetak'])->name('buku.cetak_buku');
    Route::get('buku/print/{buku}', [BukuController::class, 'buku_print'])->name('buku.print');
    Route::resource('kategori', KategoriController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('pinjam', PinjamController::class);
    Route::resource('lokasi', LokasiController::class);

    Route::get('pinjam/konfirmasi-pengembalian/{pinjam}', [PinjamController::class, 'konfirmasi_pengembalian'])->name('anggota.konfirmasi_pengembalian');
    Route::post('pinjam/perpanjang/{pinjam}', [PinjamController::class, 'perpanjang'])->name('pinjam.perpanjang');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak-siswa', [LaporanController::class, 'cetakSiswa'])->name('laporan.cetak_siswa');
    Route::get('/laporan/cetak-buku', [LaporanController::class, 'cetakBuku'])->name('laporan.cetak_buku');
    Route::get('/laporan/cetak-peminjamansiswa', [LaporanController::class, 'cetakPeminjamanSiswa'])->name('laporan.cetak_peminjamansiswa');
    Route::get('/laporan/cetak-peminjaman', [LaporanController::class, 'cetakPeminjaman'])->name('laporan.cetak_peminjaman');
});
