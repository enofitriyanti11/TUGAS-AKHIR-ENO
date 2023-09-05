<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategoris'; // Menyatakan nama tabel yang terkait dengan model ini
    protected $primaryKey = 'id_kategori'; // Menyatakan nama kolom primary key
    protected $fillable = [
        'nama_kategori'
    ];

    public function lokasi()
    {
        return $this->hasOne(Lokasi::class, 'id_kategori', 'id_kategori');
    }
}
