@extends('layouts.master')

@section('judul', 'Tambah Nilai')

@section('content')
    <div class="container mx-auto mt-5">
        <!-- Success and Error Messages -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg flex flex-col items-start">
                <div class="flex items-center space-x-2 mb-1">
                    <i class="fas fa-check-circle text-green-600 text-lg"></i>
                    <span class="font-semibold">Berhasil!</span>
                </div>
                <span>{{ session('success') }}</span>
            </div>
        @elseif (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg flex flex-col items-start">
                <div class="flex items-center space-x-2 mb-1">
                    <i class="fas fa-times-circle text-red-600 text-lg"></i>
                    <span class="font-semibold">Gagal!</span>
                </div>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 mb-4">Tambah Nilai untuk Kelas {{ $kelas->nama_kelas }} -
            Mata Pelajaran {{ $mapel->nama_mapel }}</h1>

        <form action="{{ route('nilai.store') }}" method="POST" class="bg-white p-6 rounded-lg w-full shadow-md">
            @csrf
            <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
            <input type="hidden" name="guru_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="tahun_akademik_id" value="{{ $tahun_akademik->id }}">

            <div class="mb-4">
                <table class="w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama Siswa</th>
                            <th class="px-4 py-2 border">Nilai Pengetahuan</th>
                            <th class="px-4 py-2 border">Nilai Keterampilan</th>
                            <th class="px-4 py-2 border">Hadir</th>
                            <th class="px-4 py-2 border">Izin</th>
                            <th class="px-4 py-2 border">Alpha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa_kelas as $index => $siswa)
                            <tr>
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $siswa->user->name }}</td>
                                <td class="px-4 py-2 border">
                                    <input type="number" name="nilai_pengetahuan[]" class="w-full px-4 py-2 border"
                                        required>
                                </td>
                                <td class="px-4 py-2 border">
                                    <input type="number" name="nilai_keterampilan[]" class="w-full px-4 py-2 border"
                                        required>
                                </td>
                                <td class="px-4 py-2 border">
                                    <input type="number" name="hadir[]" class="w-full px-4 py-2 border" required>
                                </td>
                                <td class="px-4 py-2 border">
                                    <input type="number" name="izin[]" class="w-full px-4 py-2 border" required>
                                </td>
                                <td class="px-4 py-2 border">
                                    <input type="number" name="alpha[]" class="w-full px-4 py-2 border" required>
                                </td>
                                <input type="hidden" name="siswa_id[]" value="{{ $siswa->siswa_id }}">
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Simpan Nilai
                </button>
            </div>
        </form>
    </div>
@endsection
