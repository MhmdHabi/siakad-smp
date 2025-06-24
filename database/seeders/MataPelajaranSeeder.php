<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_mapel' => 'Bahasa Indonesia', 'kode_mapel' => 'BIN'],
            ['nama_mapel' => 'Matematika dan Ilmu Pengetahuan Alam', 'kode_mapel' => 'MTKIPA'],
            ['nama_mapel' => 'Ilmu Pengetahuan Sosial (IPS)', 'kode_mapel' => 'IPS'],
            ['nama_mapel' => 'Pendidikan Agama Islam', 'kode_mapel' => 'PAI'],
            ['nama_mapel' => 'Sejarah', 'kode_mapel' => 'SEJ'],
            ['nama_mapel' => 'Matematika', 'kode_mapel' => 'MTK'],
            ['nama_mapel' => 'Pendidikan Biologi', 'kode_mapel' => 'BIO'],
            ['nama_mapel' => 'Bahasa Inggris', 'kode_mapel' => 'BIG'],
            ['nama_mapel' => 'Lainnya', 'kode_mapel' => 'LAIN'],
            ['nama_mapel' => 'Pendidikan Luar Sekolah', 'kode_mapel' => 'PLS'],
            ['nama_mapel' => 'Biologi', 'kode_mapel' => 'BIO2'],
            ['nama_mapel' => 'Manajemen Pendidikan', 'kode_mapel' => 'MP'],
            ['nama_mapel' => 'Bimbingan dan Konseling (Konselor)', 'kode_mapel' => 'BK'],
        ];

        foreach ($data as $mapel) {
            MataPelajaran::create($mapel);
        }
    }
}
