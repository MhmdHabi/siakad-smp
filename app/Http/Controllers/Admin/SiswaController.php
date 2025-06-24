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
            'nis' => 'required|string|max:50',
            'tempat_lahir' => 'required|string|max:100',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_tlp' => 'required|string|max:20',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|string',
        ]);

        // Wrap database operations in a transaction
        DB::transaction(function () use ($validated) {
            // Buat data siswa baru dan set role default menjadi 'siswa'
            User::create([
                'name' => $validated['name'],
                'nisn' => $validated['nisn'],
                'nis' => $validated['nis'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'tgl_lahir' => $validated['tgl_lahir'],
                'alamat' => $validated['alamat'],
                'no_tlp' => $validated['no_tlp'],
                'gender' => $validated['gender'],
                'agama' => $validated['agama'],
                'role' => 'siswa',
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
        $validated = $request->validate([
            'name' => 'string|max:255',
            'nisn' => 'integer',
            'gender' => 'string|in:Laki-laki,Perempuan',
            'nis' => 'string|max:50',
            'tempat_lahir' => 'string|max:100',
            'tgl_lahir' => 'date',
            'alamat' => 'string|max:255',
            'no_tlp' => 'string|max:20',
            'agama' => 'string',
        ]);

        $user = User::findOrFail($id);

        try {
            DB::transaction(function () use ($user, $validated) {
                $user->update([
                    'name' => $validated['name'],
                    'nisn' => $validated['nisn'],
                    'gender' => $validated['gender'],
                    'nis' => $validated['nis'],
                    'tempat_lahir' => $validated['tempat_lahir'],
                    'tgl_lahir' => $validated['tgl_lahir'],
                    'alamat' => $validated['alamat'],
                    'no_tlp' => $validated['no_tlp'],
                    'agama' => $validated['agama'],
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


        // Delete the user
        $user->delete();
        // Redirect back with a success message
        return redirect()->route('data_siswa')->with('success', 'Data Siswa berhasil dihapus');
    }
}
