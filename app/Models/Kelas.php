<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas'; // Menyatakan nama tabel yang terkait dengan model ini
    protected $primaryKey = 'id_kelas'; // Menyatakan nama kolom primary key
    protected $fillable = [
        'nama_kelas'
    ];
}
