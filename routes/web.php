<?php

use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\JadwalPelajaranController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\LaporanGuruController;
use App\Http\Controllers\Admin\LaporanMapelController;
use App\Http\Controllers\Admin\LaporanRuanganController;
use App\Http\Controllers\Admin\LaporanSiswaController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\SiswaKelasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guru\JadwalMengajarGuruController;
use App\Http\Controllers\Guru\NilaiController;
use App\Http\Controllers\Siswa\JadwalPelajaranSiswaController;
use App\Http\Controllers\Siswa\NilaiSiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Authentication
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'loginPost'])->name('loginPost');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('registerPost');


Route::prefix('admin')->middleware('role:admin')->group(function () {
    // CRUD Siswa
    Route::prefix('/')->group(function () {
        Route::get('/data_siswa', [SiswaController::class, 'index'])->name('data_siswa');
        Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    });

    // CRUD Guru
    Route::prefix('/')->group(function () {
        Route::get('/data_guru', [GuruController::class, 'index'])->name('data_guru');
        Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
        Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
        Route::get('guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
        Route::put('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update');
        Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
    });

    // CRUD mata pelajaran
    Route::prefix('/')->group(function () {
        Route::get('/mapel', [MapelController::class, 'index'])->name('admin.mapel');
        Route::get('/mapel/add', [MapelController::class, 'create'])->name('mapel.create');
        Route::post('/mapel', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
        Route::put('/mapel/{id}', [MapelController::class, 'update'])->name('mapel.update');
        Route::delete('/mapel/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');
    });

    // CRUD Ruangan
    Route::prefix('/')->group(function () {
        Route::get('/ruangan', [RuanganController::class, 'index'])->name('admin.ruangan');
        Route::get('/ruangan/add', [RuanganController::class, 'create'])->name('ruangan.create');
        Route::post('/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
        Route::get('/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
        Route::put('/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
        Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');
    });

    // CRUD Kelas
    Route::prefix('/')->group(function () {
        Route::get('/kelas', [KelasController::class, 'index'])->name('admin.kelas');
        Route::get('/kelas/add', [KelasController::class, 'create'])->name('kelas.create');
        Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
        Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
    });

    // CRUD Jadwal Pelajaran
    Route::prefix('/')->group(function () {
        Route::get('/jadwal_pelajaran', [JadwalPelajaranController::class, 'index'])->name('admin.jadwal_pelajaran');
        Route::get('/jadwal_pelajaran/add', [JadwalPelajaranController::class, 'create'])->name('jadwal_pelajaran.create');
        Route::post('/jadwal_pelajaran', [JadwalPelajaranController::class, 'store'])->name('jadwal_pelajaran.store');
        Route::get('/jadwal_pelajaran/{id}/edit', [JadwalPelajaranController::class, 'edit'])->name('jadwal_pelajaran.edit');
        Route::put('/jadwal_pelajaran/{id}', [JadwalPelajaranController::class, 'update'])->name('jadwal_pelajaran.update');
        Route::delete('/jadwal_pelajaran/{id}', [JadwalPelajaranController::class, 'destroy'])->name('jadwal_pelajaran.destroy');
    });

    // CRUD Siswa Kelas
    Route::prefix('/')->group(function () {
        Route::get('/siswa_kelas', [SiswaKelasController::class, 'index'])->name('admin.siswa_kelas');
        Route::get('/siswa_kelas/add', [SiswaKelasController::class, 'create'])->name('siswa_kelas.create');
        Route::post('/siswa_kelas', [SiswaKelasController::class, 'store'])->name('siswa_kelas.store');
        Route::get('/siswa_kelas/{id}/edit', [SiswaKelasController::class, 'edit'])->name('siswa_kelas.edit');
        Route::put('/siswa_kelas/{id}', [SiswaKelasController::class, 'update'])->name('siswa_kelas.update');
        Route::delete('/siswa_kelas/{id}', [SiswaKelasController::class, 'destroy'])->name('siswa_kelas.destroy');
    });

    // Laporan
    Route::prefix('/')->group(function () {
        Route::get('/laporan_guru', [LaporanGuruController::class, 'index'])->name('admin.laporan.guru');
        Route::get('/laporan_siswa', [LaporanSiswaController::class, 'index'])->name('admin.laporan.siswa');
        Route::get('/laporan_ruangan', [LaporanRuanganController::class, 'index'])->name('admin.laporan.ruangan');
        Route::get('/laporan_mapel', [LaporanMapelController::class, 'index'])->name('admin.laporan.mapel');
    });
});

// route guru
Route::prefix('guru')->middleware('role:guru')->group(function () {
    Route::get('/jadwal-mengajar', [JadwalMengajarGuruController::class, 'index'])->name('jadwal.mengajar');

    Route::get('/nilai/daftar', [NilaiController::class, 'getDaftarSiswa'])->name('nilai.daftar');

    Route::post('/nilai/add', [NilaiController::class, 'store'])->name('nilai.store');

    Route::put('/nilai/update/{id}', [NilaiController::class, 'update'])->name('nilai.update');
});

// route siswa
Route::prefix('siswa')->middleware('role:siswa')->group(function () {
    Route::get('/jadwal-pelajaran', [JadwalPelajaranSiswaController::class, 'index'])->name('jadwal.pelajaran');
    Route::get('/nilai', [NilaiSiswaController::class, 'index'])->name('siswa.nilai');
    Route::get('/siswa/nilai-siswa/pdf', [NilaiSiswaController::class, 'cetakPDF'])->name('nilai-siswa.pdf');
});
