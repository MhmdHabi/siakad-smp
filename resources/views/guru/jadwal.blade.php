@extends('layouts.master')

@section('judul', 'Jenis Mata Pelajaran')

@section('content')
    <div class="max-w-6xl bg-white p-6 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Jadwal Mengajar</h1>

        @if ($jadwalMengajar->isEmpty())
            <p class="text-center text-gray-500">Belum ada jadwal mengajar.</p>
        @else
            <div class="overflow-auto"> <!-- Tambahkan overflow-auto untuk responsif -->
                <table class="min-w-full bg-white border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Hari</th>
                            <th class="px-4 py-2 border">Jam</th>
                            <th class="px-4 py-2 border">Mata Pelajaran</th>
                            <th class="px-4 py-2 border">Kelas</th>
                            <th class="px-4 py-2 border">Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalMengajar as $jadwal)
                            <tr>
                                <td class="px-4 py-2 border">{{ $jadwal->hari }}</td>
                                <td class="px-4 py-2 border">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                                <td class="px-4 py-2 border">{{ $jadwal->mapel->nama_mapel }}</td>
                                <td class="px-4 py-2 border">{{ $jadwal->kelas->nama_kelas }}</td>
                                <td class="px-4 py-2 border">{{ $jadwal->ruangan->nama_ruangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
