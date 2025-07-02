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

            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6 border-b pb-4">Laporan Data Ruangan</h1>

            <!-- Tombol Cetak -->
            <div class="mb-4 text-right no-print">
                <button onclick="window.print()"
                    class="bg-gray-500 text-white px-4 py-1 shadow hover:bg-blue-700 transition">
                    Cetak
                </button>
            </div>

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

        </div>
    </div>
</body>

</html>
