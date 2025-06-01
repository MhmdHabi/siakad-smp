<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        // Ambil data dari model Ruangan
        $ruangan = Ruangan::all();
        return view('admin.ruangan.index', compact('ruangan'));
    }
    public function create()
    {
        return view('admin.ruangan.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'kode_ruangan' => 'required|string|max:50|unique:ruangans,kode_ruangan',
        ]);

        try {
            Ruangan::create([
                'nama_ruangan' => $request->nama_ruangan,
                'kode_ruangan' => $request->kode_ruangan,
            ]);

            return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        return view('admin.ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'kode_ruangan' => 'nullable|string|max:50',
        ]);

        try {
            $ruangan = Ruangan::findOrFail($id);
            $ruangan->update([
                'nama_ruangan' => $request->nama_ruangan,
                'kode_ruangan' => $request->kode_ruangan,
            ]);

            return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id)
    {
        Ruangan::destroy($id);

        return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil dihapus.');
    }
}
