<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalMengajarGuruController extends Controller
{
    public function index()
    {
        // Ensure the logged-in user is a 'guru'
        $user = Auth::user();

        if ($user->role !== 'guru') {
            abort(403, 'Unauthorized action.');
        }

        // Fetch teaching schedule for the logged-in teacher
        $jadwalMengajar = JadwalPelajaran::with(['mapel', 'kelas', 'ruangan'])
            ->where('guru_id', $user->id)
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        // Return view with the schedule data
        return view('guru.jadwal', compact('jadwalMengajar'));
    }
}
