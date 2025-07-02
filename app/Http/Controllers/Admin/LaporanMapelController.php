<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class LaporanMapelController extends Controller
{
    public function index()
    {
        $mapels = MataPelajaran::all();
        return view('admin.laporan.laporan_mapel', compact('mapels'));
    }
}
