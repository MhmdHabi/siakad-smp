<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Guru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 min-h-screen">
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white p-6">

            <!-- Judul Sekolah -->
            <!-- Judul dan Alamat Sekolah -->
            <div class="text-center mb-7">
                <h2 class="text-2xl font-bold text-gray-900">SMP 1 ATAP MERANGIN</h2>
                <p class="text-sm text-gray-700 mt-1">Jl. Pendidikan No. 123, Merangin, Jambi</p>
            </div>

            <!-- Baris Judul dan Tombol Cetak -->
            <div class="flex items-center justify-between border-b pb-4 mb-6">
                <h1 class="text-xl font-semibold text-gray-800">Laporan Data Guru</h1>
                <div class="no-print">
                    <button onclick="window.print()"
                        class="bg-gray-500 text-white px-4 py-1 shadow hover:bg-blue-700 transition">
                        Cetak
                    </button>
                </div>
            </div>
            <!-- Tabel Data Guru -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-300 text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 font-medium">NIP</th>
                            <th class="px-6 py-3 font-medium">Nama Guru</th>
                            <th class="px-6 py-3 font-medium">Tugas Tambahan</th>
                            <th class="px-6 py-3 font-medium">Mata Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($gurus as $guru)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $guru->nip }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $guru->name }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-medium rounded-full
                                        {{ $guru->tugas_tambahan ? 'bg-blue-50 text-blue-800' : 'bg-gray-100 text-gray-500' }}">
                                        {{ $guru->tugas_tambahan ?? 'Tidak Ada' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <ul class="list-disc list-inside space-y-1">
                                        @forelse($guru->jadwalPelajarans as $jadwal)
                                            <li>{{ $jadwal->mapel->nama_mapel }}</li>
                                        @empty
                                            <li class="text-gray-400 italic">Tidak ada mata pelajaran</li>
                                        @endforelse
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-6 text-gray-500 italic">
                                    Data guru tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Tanda Tangan -->
            <div class="mt-16 flex justify-end">
                <div class="text-right">
                    <p class="mb-1 mr-10">Mengetahui,</p>
                    <div class="h-20"></div>
                    <p class="text-gray-800 mr-5">Kepala Sekolah</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
