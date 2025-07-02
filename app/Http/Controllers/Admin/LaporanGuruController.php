<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanGuruController extends Controller
{

    public function index()
    {
        // Ambil data guru dengan role 'guru' beserta relasi mata pelajaran
        $gurus = User::with('jadwalPelajarans')
            ->where('role', 'guru')
            ->get();

        return view('admin.laporan.laporan_guru', compact('gurus'));
    }
}
