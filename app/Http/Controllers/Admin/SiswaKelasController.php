<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\SiswaKelas;
use App\Models\TahunAkademik;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaKelasController extends Controller
{
    public function index()
    {
        $siswaKelas = SiswaKelas::with(['siswa', 'kelas', 'tahunAkademik'])->get();
        return view('admin.siswa_kelas.index', compact('siswaKelas'));
    }

    // Show the form for creating a new SiswaKelas
    public function create()
    {
        $siswa = User::where('role', 'siswa')->get();
        $kelas = Kelas::all();
        $tahunAkademik = TahunAkademik::all();
        return view('admin.siswa_kelas.add', compact('siswa', 'kelas', 'tahunAkademik'));
    }

    // Store a newly created SiswaKelas in the database
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
        ]);

        SiswaKelas::create($request->all());
        return redirect()->route('admin.siswa_kelas')->with('success', 'Data berhasil ditambahkan.');
    }

    // Show the form for editing an existing SiswaKelas
    public function edit($id)
    {
        $siswaKelas = SiswaKelas::findOrFail($id);
        $siswa = User::where('role', 'siswa')->get();
        $kelas = Kelas::all();
        $tahunAkademik = TahunAkademik::all();
        return view('admin.siswa_kelas.edit', compact('siswaKelas', 'siswa', 'kelas', 'tahunAkademik'));
    }

    // Update an existing SiswaKelas in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_akademik_id' => 'required|exists:tahun_akademiks,id',
        ]);

        $siswaKelas = SiswaKelas::findOrFail($id);
        $siswaKelas->update($request->all());
        return redirect()->route('admin.siswa_kelas')->with('success', 'Data berhasil diperbarui.');
    }

    // Delete a SiswaKelas from the database
    public function destroy($id)
    {
        $siswaKelas = SiswaKelas::findOrFail($id);
        $siswaKelas->delete();
        return redirect()->route('admin.siswa_kelas')->with('success', 'Data berhasil dihapus.');
    }
}
