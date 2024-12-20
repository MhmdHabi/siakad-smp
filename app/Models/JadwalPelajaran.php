<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'mapel_id',
        'guru_id',
        'kelas_id',
        'ruangan_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    public function mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id',);
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
}
