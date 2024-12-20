<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use App\Models\SiswaKelas;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class JadwalPelajaranSiswaController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ensure the user is a student
        if ($user->role !== 'siswa') {
            abort(403, 'Unauthorized');
        }

        // Get the active academic year
        $tahunAkademik = TahunAkademik::where('is_aktif', true)->first();
        if (!$tahunAkademik) {
            return view('siswa.jadwal', ['jadwal' => [], 'message' => 'Tahun akademik aktif belum diatur.']);
        }

        // Get the student's class in the active academic year
        $siswaKelas = SiswaKelas::where('siswa_id', $user->id)
            ->where('tahun_akademik_id', $tahunAkademik->id)
            ->first();

        if (!$siswaKelas) {
            return view('siswa.jadwal', ['jadwal' => [], 'message' => 'Anda belum terdaftar di kelas untuk tahun akademik ini.']);
        }

        // Get the schedule for the class
        $jadwal = JadwalPelajaran::where('kelas_id', $siswaKelas->kelas_id)
            ->with(['mapel', 'guru', 'ruangan'])
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('siswa.jadwal', ['jadwal' => $jadwal, 'message' => null]);
    }
}
