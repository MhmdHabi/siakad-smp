<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $teachers = User::where('role', 'guru')->get();

        return view('admin.guru.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.guru.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:users',
            'gender' => 'required|string',
            'agama' => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'status' => 'required|string',
            'jenjang' => 'required|string|max:50',
            'tugas_tambahan' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = new User();
            $user->name = $request->name;
            $user->nip = $request->nip;
            $user->gender = $request->gender;
            $user->agama = $request->agama;
            $user->role = $request->role;
            $user->tempat_lahir = $request->tempat_lahir;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->status = $request->status;
            $user->jenjang = $request->jenjang;
            $user->tugas_tambahan = $request->tugas_tambahan;
            $user->password = bcrypt($request->password);
            $user->role = 'guru';
            $user->save();

            return redirect()->route('data_guru')->with('success', 'Guru berhasil ditambahkan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan. Guru gagal ditambahkan.')->withInput();
        }
    }


    public function edit($id)
    {
        // Ambil data guru berdasarkan ID
        $guru = User::findOrFail($id);
        // Kirim data guru ke view edit
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diinput
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric',
            'gender' => 'required|string',
            'agama' => 'required|string',
            'role' => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'status' => 'required|string',
            'tugas_tambahan' => 'required|string',
            'jenjang' => 'required|string|max:50',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Ambil data guru berdasarkan ID
        $guru = User::findOrFail($id);

        // Update data guru
        $guru->name = $validatedData['name'];
        $guru->nip = $validatedData['nip'];
        $guru->gender = $validatedData['gender'];
        $guru->agama = $validatedData['agama'];
        $guru->tempat_lahir = $validatedData['tempat_lahir'];
        $guru->tgl_lahir = $validatedData['tgl_lahir'];
        $guru->status = $validatedData['status'];
        $guru->jenjang = $validatedData['jenjang'];
        $guru->tugas_tambahan = $validatedData['tugas_tambahan'];
        $guru->role = $validatedData['role'];

        // Update password jika diisi
        if ($request->password) {
            $guru->password = bcrypt($validatedData['password']);
        }

        // Simpan perubahan
        $guru->save();

        // Berikan feedback kepada user
        return redirect()->route('data_guru')->with('success', 'Data guru berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Cari user berdasarkan ID
        // Find the user by ID
        $user = User::findOrFail($id);

        // Hapus user
        // Delete the user
        $user->delete();

        // Redirect ke halaman sebelumnya dengan message sukses
        // Redirect back with a success message
        return redirect()->route('data_guru')->with('success', 'Data Guru berhasil dihapus');
    }
}
