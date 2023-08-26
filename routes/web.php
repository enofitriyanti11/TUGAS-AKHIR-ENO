<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PinjamController;
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

Route::get('/', function () {
    return view('dashboard.index');
});



Route::resource('anggota', AnggotaController::class);
Route::get('anggota/cetak', [AnggotaController::class, 'cetak'])->name('anggota.cetak_kartu');
Route::resource('buku', BukuController::class);
Route::get('buku/cetak', [BukuController::class, 'cetak'])->name('buku.cetak_buku');
Route::resource('kategori', KategoriController::class);
Route::resource('pinjam', PinjamController::class);


// Route::get('/pengembalian', function () {
//     return view('pengembalian.index');
// });

// Route::get('/denda', function () {
//     return view('denda.index');
// });

// Route::get('/laporan', function () {
//     return view('laporan.index');
// });
