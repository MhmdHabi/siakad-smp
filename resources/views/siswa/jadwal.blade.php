@extends('layouts.master')

@section('judul', 'Jadwal Pelajaran')

@section('content')
    <div class="container mx-auto mt-5">
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-2xl font-bold text-gray-800">Jadwal Pelajaran</h1>
            <a href=""
                class="hidden md:flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-file-pdf mr-2"></i> Cetak PDF
            </a>
            <a href=""
                class="flex md:hidden justify-center items-center w-10 h-10 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-file-pdf"></i>
            </a>
        </div>

        @if ($message)
            <div class="mb-4 p-4 bg-yellow-100 text-yellow-800 rounded-lg">
                {{ $message }}
            </div>
        @elseif ($jadwal->isEmpty())
            <div class="mb-4 p-4 bg-gray-100 text-gray-800 rounded-lg">
                Jadwal pelajaran belum tersedia.
            </div>
        @else
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg p-6">
                @foreach ($jadwal->groupBy('hari') as $hari => $items)
                    <div class="mb-5">
                        <h3 class="text-lg font-semibold text-gray-700 mb-3">{{ $hari }}</h3>
                        <table class="w-full min-w-[600px] border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Jam</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Mata Pelajaran</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Guru</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Ruangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 text-gray-800">
                                            {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                                        </td>
                                        <td class="px-6 py-4 text-gray-800">{{ $item->mapel->nama_mapel }}</td>
                                        <td class="px-6 py-4 text-gray-800">{{ $item->guru->name }}</td>
                                        <td class="px-6 py-4 text-gray-800">{{ $item->ruangan->nama_ruangan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
