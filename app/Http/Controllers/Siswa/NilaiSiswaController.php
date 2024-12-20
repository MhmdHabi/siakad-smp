<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiSiswaController extends Controller
{
    public function index()
    {
        // Ambil user yang sedang login
        $siswa = Auth::user();

        // Pastikan hanya siswa dengan role 'siswa' yang dapat mengakses
        if ($siswa->role !== 'siswa') {
            abort(404);
        }

        // Ambil semua nilai berdasarkan siswa yang login
        $nilaiSiswa = Nilai::where('siswa_id', $siswa->id)
            ->with(['mapel', 'guru', 'tahunAkademik'])
            ->get();

        return view('siswa.nilai', compact('nilaiSiswa'));
    }

    public function cetakPDF()
    {
        $user = auth()->user(); // Mendapatkan user yang login
        $nilaiSiswa = Nilai::where('siswa_id', $user->id)
            ->with(['mapel', 'guru', 'tahunAkademik']) // Include relations for PDF
            ->get(); // Data nilai siswa login

        // Retrieve the 'tahunAkademik' from the first record (assuming all records have the same 'tahunAkademik')
        $tahunAkademik = $nilaiSiswa->first()->tahunAkademik;

        // Since 'hadir', 'izin', and 'alpha' are part of the 'Nilai' model,
        // you can access these directly from the $nilaiSiswa collection.
        $kehadiran = [
            'hadir' => $nilaiSiswa->sum('hadir'),
            'izin' => $nilaiSiswa->sum('izin'),
            'alpha' => $nilaiSiswa->sum('alpha')
        ];

        // Pass 'siswa', 'tahunAkademik', 'nilaiSiswa', and 'kehadiran' to the view
        $siswa = $user;

        // Load view to generate PDF
        $pdf = Pdf::loadView('siswa.cetak', compact('nilaiSiswa', 'kehadiran', 'siswa', 'tahunAkademik'));
        return $pdf->stream('nilai_siswa.pdf'); // Menampilkan di browser
    }
}
