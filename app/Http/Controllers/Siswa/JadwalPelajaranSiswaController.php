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

        if ($user->role !== 'siswa') {
            abort(403, 'Unauthorized');
        }

        // Ambil semua tahun akademik aktif
        $tahunAkademiks = TahunAkademik::where('is_aktif', true)->get();

        if ($tahunAkademiks->isEmpty()) {
            return view('siswa.jadwal', ['jadwal' => [], 'message' => 'Tahun akademik aktif belum diatur.']);
        }

        $siswaKelas = null;
        $jadwal = collect();

        foreach ($tahunAkademiks as $tahunAkademik) {
            // Cek apakah siswa terdaftar di tahun akademik ini
            $siswaKelas = SiswaKelas::where('siswa_id', $user->id)
                ->where('tahun_akademik_id', $tahunAkademik->id)
                ->first();

            if ($siswaKelas) {
                // Jika ketemu, ambil jadwal lalu break
                $jadwal = JadwalPelajaran::where('kelas_id', $siswaKelas->kelas_id)
                    ->with(['mapel', 'guru', 'ruangan'])
                    ->orderBy('hari')
                    ->orderBy('jam_mulai')
                    ->get();
                break;
            }
        }

        if (!$siswaKelas) {
            return view('siswa.jadwal', ['jadwal' => [], 'message' => 'Anda belum terdaftar di kelas untuk tahun akademik aktif manapun.']);
        }

        return view('siswa.jadwal', ['jadwal' => $jadwal, 'message' => null]);
    }
}
