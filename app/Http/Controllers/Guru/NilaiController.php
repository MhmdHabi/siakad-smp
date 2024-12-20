<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\SiswaKelas;
use App\Models\TahunAkademik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function getDaftarSiswa(Request $request)
    {
        $guru = Auth::user();
        $tahunAkademikList = TahunAkademik::all();

        $kelasList = JadwalPelajaran::where('guru_id', $guru->id)
            ->with('kelas')
            ->get()
            ->pluck('kelas')
            ->unique('id');

        $result = [];
        if ($request->has('kelas_id')) {
            $kelasId = $request->kelas_id;

            $jadwal = JadwalPelajaran::where('guru_id', $guru->id)
                ->where('kelas_id', $kelasId)
                ->with('kelas.siswaKelas.siswa', 'mapel')
                ->get();

            foreach ($jadwal as $jadwalItem) {
                $kelas = $jadwalItem->kelas;
                foreach ($kelas->siswaKelas as $siswaKelas) {
                    // Ambil data nilai jika sudah ada
                    $nilai = Nilai::where('siswa_id', $siswaKelas->siswa->id)
                        ->where('mapel_id', $jadwalItem->mapel->id)
                        ->first();

                    $result[] = [
                        'siswa_id' => $siswaKelas->siswa->id,
                        'nama_siswa' => $siswaKelas->siswa->name,
                        'kelas' => $kelas->nama_kelas,
                        'mata_pelajaran' => $jadwalItem->mapel->nama_mapel,
                        'mapel_id' => $jadwalItem->mapel->id,
                        'nilai' => $nilai, // Data nilai jika ada
                    ];
                }
            }
        }

        return view('guru.daftar_siswa', compact('kelasList', 'result', 'tahunAkademikList'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'siswa_id' => 'required|exists:users,id',
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
            'nilai_pengetahuan' => 'required|numeric|min:0|max:100',
            'nilai_keterampilan' => 'required|numeric|min:0|max:100',
            'hadir' => 'required|numeric|min:0',
            'izin' => 'required|numeric|min:0',
            'alpha' => 'required|numeric|min:0',
        ]);

        // Ambil data guru yang sedang login
        $guru = auth()->user();

        // Pastikan pengguna yang login adalah guru
        if ($guru->role !== 'guru') {
            return redirect()->back()->withErrors(['error' => 'Hanya pengguna dengan peran guru yang dapat menambahkan nilai.']);
        }

        // Buat data nilai
        $nilai = Nilai::create([
            'siswa_id' => $request->input('siswa_id'),
            'mapel_id' => $request->input('mapel_id'),
            'guru_id' => $guru->id,
            'tahun_akademik_id' => $request->input('tahun_akademik_id'),
            'nilai_pengetahuan' => $request->input('nilai_pengetahuan'),
            'nilai_keterampilan' => $request->input('nilai_keterampilan'),
            'hadir' => $request->input('hadir'),
            'izin' => $request->input('izin'),
            'alpha' => $request->input('alpha'),
        ]);

        // Redirect dengan pesan sukses
        return back()->with('success', 'Nilai berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nilai_pengetahuan' => 'required|numeric',
            'nilai_keterampilan' => 'required|numeric',
            'hadir' => 'required|numeric',
            'izin' => 'required|numeric',
            'alpha' => 'required|numeric',
            'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
        ]);

        // Cari dan update data
        $nilai = Nilai::findOrFail($id);
        $nilai->update([
            'nilai_pengetahuan' => $request->nilai_pengetahuan,
            'nilai_keterampilan' => $request->nilai_keterampilan,
            'hadir' => $request->hadir,
            'izin' => $request->izin,
            'alpha' => $request->alpha,
            'tahun_akademik_id' => $request->tahun_akademik_id,
        ]);

        return back()->with('success', 'Data berhasil diperbarui!');
    }
}
