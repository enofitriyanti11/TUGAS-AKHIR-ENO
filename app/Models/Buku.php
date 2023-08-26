<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus'; // Menyatakan nama tabel yang terkait dengan model ini
    protected $primaryKey = 'id_buku'; // Menyatakan nama kolom primary key
    protected $fillable = [
        'judul',
        'id_kategori',
        'pengarang',
        'penerbit',
        'tempat_terbit',
        'stok',
        'buku_code'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
