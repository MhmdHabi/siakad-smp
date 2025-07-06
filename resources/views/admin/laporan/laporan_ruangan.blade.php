<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Ruangan</title>
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

<body class="bg-gray-50 text-gray-800 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white p-6">

            <!-- Header Sekolah -->
            <div class="text-center mb-7 pb-2">
                <h2 class="text-2xl font-bold text-gray-900">SMP 1 ATAP MERANGIN</h2>
                <p class="text-sm text-gray-700 mt-1">Jl. Pendidikan No. 123, Merangin, Jambi</p>
            </div>

            <!-- Judul Laporan dan Tombol Cetak -->
            <div class="flex items-center justify-between border-b pb-4 mb-6">
                <h1 class="text-xl font-semibold text-gray-800">Laporan Data Ruangan</h1>
                <div class="no-print">
                    <button onclick="window.print()"
                        class="bg-gray-500 text-white px-4 py-1 shadow hover:bg-blue-700 transition">
                        Cetak
                    </button>
                </div>
            </div>

            <!-- Tabel Ruangan -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-300 text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 font-medium">Nama Ruangan</th>
                            <th class="px-6 py-3 font-medium">Kode Ruangan</th>
                            <th class="px-6 py-3 font-medium">Kapasitas</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($ruangans as $ruangan)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">{{ $ruangan->nama_ruangan }}</td>
                                <td class="px-6 py-4">{{ $ruangan->kode_ruangan }}</td>
                                <td class="px-6 py-4">{{ $ruangan->kapasitas }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-6 text-gray-500 italic">
                                    Data ruangan tidak ditemukan.
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
