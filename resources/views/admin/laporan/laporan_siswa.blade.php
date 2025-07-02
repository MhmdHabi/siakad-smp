<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media print {

            select,
            button,
            form,
            .no-print {
                display: none !important;
            }
        }
    </style>

</head>

<body class="bg-gray-50 text-gray-900 min-h-screen py-10">
    <div class="max-w-4xl mx-auto px-6">
        <div class="bg-white p-6">
            <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6 border-b pb-4">Laporan Data Siswa</h1>

            <div class="flex justify-between items-center mb-4">
                <!-- Filter Kelas -->
                <form method="GET" action="{{ route('admin.laporan.siswa') }}" class="inline-block">
                    <label for="kelas_id" class="text-sm font-medium text-gray-700 mr-2">Filter Kelas:</label>
                    <select name="kelas_id" id="kelas_id" onchange="this.form.submit()"
                        class="text-sm bg-white border border-gray-300 rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                        <option value="">-- Semua Kelas --</option>
                        @foreach ($kelasList as $kelas)
                            <option value="{{ $kelas->id }}" {{ $selectedKelas == $kelas->id ? 'selected' : '' }}>
                                {{ $kelas->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <!-- Tombol Cetak -->
                <button onclick="window.print()"
                    class="bg-gray-500 text-white px-4 py-1 shadow hover:bg-blue-700 transition">
                    Cetak
                </button>
            </div>

            <!-- Tabel Siswa -->
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-300 text-sm">
                    <thead class="bg-gray-200 text-gray-800 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-300 text-left font-medium">NISN</th>
                            <th class="px-6 py-3 border-b border-gray-300 text-left font-medium">Nama Siswa</th>
                            <th class="px-6 py-3 border-b border-gray-300 text-left font-medium">Kelas</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($siswas as $item)
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="px-6 py-4 border-b border-gray-200">{{ $item->siswa->nisn }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $item->siswa->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $item->kelas->nama_kelas ?? '-' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-6 text-center text-gray-500 italic">
                                    Tidak ada data siswa yang tersedia untuk kelas yang dipilih.
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
