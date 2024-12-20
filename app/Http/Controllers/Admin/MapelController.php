<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        // Ambil data dari model MataPelajaran
        $MataPelajaran = MataPelajaran::all();
        return view('admin.mapel.index', compact('MataPelajaran'));
    }
    public function create()
    {
        return view('admin.mapel.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
        ]);

        try {
            MataPelajaran::create([
                'nama_mapel' => $request->nama_mapel,
            ]);

            return redirect()->route('admin.mapel')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function edit($id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        return view('admin.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mapel' => 'required|string|max:255',
        ]);

        try {
            $mapel = MataPelajaran::findOrFail($id);
            $mapel->update([
                'nama_mapel' => $request->nama_mapel,
            ]);

            return redirect()->route('admin.mapel')->with('success', 'Mata Pelajaran berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        MataPelajaran::destroy($id);

        return redirect()->route('admin.mapel')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }
}
