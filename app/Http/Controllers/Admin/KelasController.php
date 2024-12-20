<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan daftar kelas
    public function index()
    {
        $kelas = Kelas::with('waliKelas')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    // Menampilkan form untuk menambah kelas
    public function create()
    {
        // Ambil semua user yang memiliki role 'guru'
        $gurus = User::where('role', 'guru')->get(); // Sesuaikan role jika perlu
        return view('admin.kelas.add', compact('gurus'));
    }

    // Menyimpan data kelas
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas_id' => 'required|exists:users,id', // Validasi bahwa wali_kelas_id ada di tabel users
        ]);

        Kelas::create($request->all());

        return redirect()->route('admin.kelas')->with('success', 'Kelas created successfully!');
    }

    // Menampilkan form untuk mengedit kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $gurus = User::where('role', 'guru')->get(); // Ambil data guru untuk form edit
        return view('admin.kelas.edit', compact('kelas', 'gurus'));
    }

    // Mengupdate data kelas
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas_id' => 'required|exists:users,id', // Validasi bahwa wali_kelas_id ada di tabel users
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('admin.kelas')->with('success', 'Kelas updated successfully!');
    }

    // Menghapus data kelas
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('admin.kelas')->with('success', 'Kelas deleted successfully!');
    }
}
