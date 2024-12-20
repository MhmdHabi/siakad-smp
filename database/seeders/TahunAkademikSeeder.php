<?php

namespace Database\Seeders;

use App\Models\TahunAkademik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'tahun' => '2023/2024',
                'semester' => 'ganjil',
                'is_aktif' => true,
            ],
            [
                'tahun' => '2023/2024',
                'semester' => 'genap',
                'is_aktif' => false,
            ],
            [
                'tahun' => '2024/2025',
                'semester' => 'ganjil',
                'is_aktif' => false,
            ],
            [
                'tahun' => '2024/2025',
                'semester' => 'genap',
                'is_aktif' => false,
            ],
        ];

        foreach ($data as $item) {
            TahunAkademik::create($item);
        }
    }
}
