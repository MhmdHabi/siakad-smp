<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'siswa')->get();

        return view('admin.siswa.index', compact('users'));
    }


    public function create()
    {
        return view('admin.siswa.add',);
    }

    public function store(Request $request)
    {
        // Validasi data request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|integer|unique:users,nisn',
            'gender' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Wrap database operations in a transaction
        DB::transaction(function () use ($validated) {
            // Buat data siswa baru dan set role default menjadi 'siswa'
            $siswa = User::create([
                'name' => $validated['name'],
                'nisn' => $validated['nisn'],
                'gender' => $validated['gender'],
                'role' => 'siswa',  // Set default role menjadi siswa
            ]);
        });

        // Redirect dengan pesan sukses setelah transaksi selesai
        return redirect()->route('data_siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.siswa.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'required|integer',
            'gender' => 'required|string|in:Laki-laki,Perempuan',
        ]);

        // Find the student by ID
        $user = User::findOrFail($id);

        try {
            DB::transaction(function () use ($user, $validated) {
                $user->update([
                    'name' => $validated['name'],
                    'nisn' => $validated['nisn'],
                    'gender' => $validated['gender'],
                ]);
            });

            return redirect()->route('data_siswa')->with('success', 'Data siswa berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('data_siswa')->with('error', 'Terjadi kesalahan saat memperbarui data siswa. Silakan coba lagi.');
        }
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
        return redirect()->route('data_siswa')->with('success', 'Data Siswa berhasil dihapus');
    }
}
