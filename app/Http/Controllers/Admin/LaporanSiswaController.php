<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;

class LaporanSiswaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar semua kelas untuk dropdown
        $kelasList = Kelas::all();

        // Ambil data siswaKelas beserta relasi siswa dan kelas
        $query = SiswaKelas::with(['siswa', 'kelas']);

        // Jika ada filter kelas_id, gunakan untuk filter
        if ($request->kelas_id) {
            $query->where('kelas_id', $request->kelas_id);
        }

        // Eksekusi query
        $siswas = $query->get();

        // Kirim data ke view
        return view('admin.laporan.laporan_siswa', [
            'siswas' => $siswas,
            'kelasList' => $kelasList,
            'selectedKelas' => $request->kelas_id
        ]);
    }
}
