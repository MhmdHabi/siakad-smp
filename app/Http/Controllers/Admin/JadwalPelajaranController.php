<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    // Menampilkan daftar jadwal pelajaran
    public function index()
    {
        $jadwalPelajarans = JadwalPelajaran::with(['mapel', 'guru', 'kelas', 'ruangan'])->get();
        return view('admin.jadwal.index', compact('jadwalPelajarans'));
    }

    // Menampilkan form untuk membuat jadwal pelajaran baru
    public function create()
    {
        $mataPelajaran = MataPelajaran::all();
        $guru = User::where('role', 'guru')->get();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();

        return view('admin.jadwal.add', compact('mataPelajaran', 'guru', 'kelas', 'ruangan'));
    }

    // Menyimpan jadwal pelajaran baru
    public function store(Request $request)
    {
        $request->validate([
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'guru_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        JadwalPelajaran::create($request->all());

        return redirect()->route('admin.jadwal_pelajaran')->with('success', 'Jadwal pelajaran berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit jadwal pelajaran
    public function edit($id)
    {
        $jadwal = JadwalPelajaran::findOrFail($id);
        $mataPelajaran = MataPelajaran::all();
        $guru = User::where('role', 'guru')->get();
        $kelas = Kelas::all();
        $ruangan = Ruangan::all();

        return view('admin.jadwal.edit', compact('jadwal', 'mataPelajaran', 'guru', 'kelas', 'ruangan'));
    }

    // Memperbarui jadwal pelajaran
    public function update(Request $request, $id)
    {
        $request->validate([
            'mapel_id' => 'required|exists:mata_pelajarans,id',
            'guru_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'ruangan_id' => 'required|exists:ruangans,id',
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $jadwal = JadwalPelajaran::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal_pelajaran')->with('success', 'Jadwal pelajaran berhasil diperbarui!');
    }

    // Menghapus jadwal pelajaran
    public function destroy($id)
    {
        $jadwal = JadwalPelajaran::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal_pelajaran')->with('success', 'Jadwal pelajaran berhasil dihapus!');
    }
}
