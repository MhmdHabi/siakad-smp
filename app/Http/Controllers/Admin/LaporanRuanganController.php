<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class LaporanRuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::all();
        return view('admin.laporan.laporan_ruangan', compact('ruangans'));
    }
}
