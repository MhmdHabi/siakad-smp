<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'nama_mapel'
    ];

    public function jadwalPelajarans()
    {
        return $this->hasMany(JadwalPelajaran::class, 'mapel_id');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalPelajaran::class);
    }
}
