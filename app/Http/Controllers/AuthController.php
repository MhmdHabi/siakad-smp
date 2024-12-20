<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Coba login dengan email dan password
        $user = User::where('email', $request->email)->first();

        if ($user && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Login berhasil
            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('data_siswa')->with('success', 'Login berhasil!'); // Admin ke Data Siswa
            } elseif ($user->role === 'guru') {
                return redirect()->route('jadwal.mengajar')->with('success', 'Login berhasil!'); // Guru ke Kelas Siswa
            } elseif ($user->role === 'siswa') {
                return redirect()->route('jadwal.pelajaran')->with('success', 'Login berhasil!'); // Siswa ke Nilai
            }
        }

        // Jika login gagal
        return back()->with('error', 'Email atau password salah.')->withInput();
    }


    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        // Validasi data yang dikirim
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'nisn' => 'required|string|max:20|unique:users',
            'gender' => 'required|in:Laki-laki,Perempuan', // Validasi gender
            'agama' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Jika validasi gagal, kembali ke halaman register dengan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menyimpan data pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
            'gender' => $request->gender, // Pastikan ini adalah salah satu nilai enum
            'agama' => $request->agama,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        // Mengatur pesan sukses
        session()->flash('success', 'Pendaftaran berhasil! Silakan login.');

        // Redirect ke halaman login setelah berhasil registrasi
        return redirect()->route('login');
    }


    // Fungsi untuk logout
    public function logout(Request $request)
    {
        Auth::logout();  // Mengakhiri sesi pengguna yang sedang login

        // Menghapus data sesi dan mengarahkan pengguna ke halaman login
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
