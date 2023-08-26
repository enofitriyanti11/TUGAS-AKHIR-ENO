<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjams'; // Menyatakan nama tabel yang terkait dengan model ini
    protected $primaryKey = 'id_pinjam'; // Menyatakan nama kolom primary key
    protected $fillable = [
        'id_anggota',
        'id_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'status'
    ];

    public function anggota()
    {
        return $this->belongsTo(anggota::class, 'id_anggota', 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }
}
