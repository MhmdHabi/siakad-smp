@extends('layouts.master')

@section('judul', 'Jenis Mata Pelajaran')

@section('content')
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-semibold text-center mb-8 text-blue-800">📅 Jadwal Mengajar</h1>

        @if ($jadwalMengajar->isEmpty())
            <p class="text-center text-gray-500 italic">Belum ada jadwal mengajar.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-100 text-blue-900 uppercase text-sm font-medium tracking-wide">
                            <th class="px-6 py-3 text-left border-b border-blue-300">Hari</th>
                            <th class="px-6 py-3 text-left border-b border-blue-300">Jam</th>
                            <th class="px-6 py-3 text-left border-b border-blue-300">Mata Pelajaran</th>
                            <th class="px-6 py-3 text-left border-b border-blue-300">Kelas</th>
                            <th class="px-6 py-3 text-left border-b border-blue-300">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @foreach ($jadwalMengajar as $jadwal)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="px-6 py-4 border-b border-blue-200">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-4 border-b border-blue-200">
                                    {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                </td>
                                <td class="px-6 py-4 border-b border-blue-200">{{ $jadwal->mapel->nama_mapel }}</td>
                                <td class="px-6 py-4 border-b border-blue-200">{{ $jadwal->kelas->nama_kelas }}</td>
                                <td class="px-6 py-4 border-b border-blue-200">{{ $jadwal->ruangan->nama_ruangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
