@extends('layouts.master')

@section('judul', 'Jadwal Pelajaran')

@section('content')
    <div class="container mx-auto mt-5">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-blue-800">📅 Jadwal Pelajaran</h1>
        </div>

        @if ($message)
            <div class="mb-4 p-4 bg-yellow-100 text-yellow-800 border border-yellow-300 rounded-md shadow">
                {{ $message }}
            </div>
        @elseif ($jadwal->isEmpty())
            <div class="mb-4 p-4 bg-gray-100 text-gray-700 border border-gray-300 rounded-md shadow">
                Jadwal pelajaran belum tersedia.
            </div>
        @else
            <div class="space-y-6">
                @foreach ($jadwal->groupBy('hari') as $hari => $items)
                    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6">
                        <h2 class="text-xl font-semibold text-gray-700 border-b pb-2 mb-4">{{ $hari }}</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left border-collapse">
                                <thead class="bg-blue-50">
                                    <tr>
                                        <th class="px-4 py-3 text-blue-800 font-semibold">Jam</th>
                                        <th class="px-4 py-3 text-blue-800 font-semibold">Mata Pelajaran</th>
                                        <th class="px-4 py-3 text-blue-800 font-semibold">Guru</th>
                                        <th class="px-4 py-3 text-blue-800 font-semibold">Ruangan</th>
                                        <th class="px-4 py-3 text-blue-800 font-semibold">Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="hover:bg-blue-50 border-b transition">
                                            <td class="px-4 py-3 text-gray-800">
                                                {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                                                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                                            </td>
                                            <td class="px-4 py-3 text-gray-700">{{ $item->mapel->nama_mapel }}</td>
                                            <td class="px-4 py-3 text-gray-700">{{ $item->guru->name }}</td>
                                            <td class="px-4 py-3">
                                                <span
                                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                                    {{ $item->ruangan->nama_ruangan }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <span
                                                    class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs font-medium">
                                                    {{ $item->kelas->nama_kelas }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
