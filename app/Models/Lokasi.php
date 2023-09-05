<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasi'; // Menyatakan nama tabel yang terkait dengan model ini
    protected $primaryKey = 'id_lokasi'; // Menyatakan nama kolom primary key
    protected $fillable = [
        'id_kategori',
        'rak',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
