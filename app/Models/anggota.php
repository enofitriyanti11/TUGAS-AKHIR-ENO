<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas'; // Menyatakan nama tabel yang terkait dengan model ini
    protected $primaryKey = 'id_anggota'; // Menyatakan nama kolom primary key
    protected $fillable = [
        'nama_anggota',
        'jenis_kelamin',
        'id_kelas',
        'alamat',
        'anggota_code',
        'tahun'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }
}
