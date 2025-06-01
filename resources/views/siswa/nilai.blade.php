@extends('layouts.master')

@section('judul', 'Nilai Siswa')

@section('content')
    <div class="container mx-auto">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 sm:mb-0">📚 Daftar Nilai Siswa</h1>
            <a href="{{ route('nilai-siswa.pdf') }}"
                class="flex items-center gap-2 px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700 transition">
                <i class="fas fa-file-pdf"></i>
                <span class="hidden sm:inline">Cetak PDF</span>
            </a>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-blue-50">
                    <tr class="text-sm font-semibold text-gray-600 tracking-wider">
                        <th class="px-4 py-3 text-blue-800 font-semibold text-left">Mata Pelajaran</th>
                        <th class="px-4 py-3  text-blue-800 font-semibold text-left">Guru</th>
                        <th class="px-4 py-3  text-blue-800 font-semibold text-left">Tahun Akademik</th>
                        <th class="px-4 py-3  text-blue-800 font-semibold text-left">Pengetahuan</th>
                        <th class="px-4 py-3  text-blue-800 font-semibold text-left">Keterampilan</th>
                        <th class="px-4 py-3  text-blue-800 font-semibold text-left">Kehadiran</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700 divide-y divide-gray-200">
                    @forelse ($nilaiSiswa as $nilai)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">{{ $nilai->mapel->nama_mapel }}</td>
                            <td class="px-4 py-3">{{ $nilai->guru->name }}</td>
                            <td class="px-4 py-3">
                                {{ $nilai->tahunAkademik->tahun }} ({{ $nilai->tahunAkademik->semester }})
                            </td>
                            <td class="px-4 py-3">{{ $nilai->nilai_pengetahuan }}</td>
                            <td class="px-4 py-3">{{ $nilai->nilai_keterampilan }}</td>
                            <td class="px-4 py-3">
                                <ul class="list-inside leading-relaxed">
                                    <li>✅ Hadir: {{ $nilai->hadir }}</li>
                                    <li>📝 Izin: {{ $nilai->izin }}</li>
                                    <li>❌ Alpha: {{ $nilai->alpha }}</li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-4 py-6 text-gray-500">Tidak ada data nilai tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
