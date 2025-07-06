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

            <!-- Header Sekolah -->
            <div class="text-center mb-7 pb-2">
                <h2 class="text-2xl font-bold text-gray-900">SMP 1 ATAP MERANGIN</h2>
                <p class="text-sm text-gray-700 mt-1">Jl. Pendidikan No. 123, Merangin, Jambi</p>
            </div>

            <!-- Judul Laporan dan Filter -->
            <div class="flex justify-between items-center border-b pb-4 mb-6">
                <h1 class="text-xl font-semibold text-gray-800">Laporan Data Siswa</h1>

                <div class="no-print flex items-center gap-4">
                    <form method="GET" action="{{ route('admin.laporan.siswa') }}">
                        <label for="kelas_id" class="text-sm font-medium text-gray-700 mr-2">Filter Kelas:</label>
                        <select name="kelas_id" id="kelas_id" onchange="this.form.submit()"
                            class="text-sm bg-white border border-gray-300 rounded px-3 py-2 shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                            <option value="">-- Semua Kelas --</option>
                            @foreach ($kelasList as $kelas)
                                <option value="{{ $kelas->id }}"
                                    {{ $selectedKelas == $kelas->id ? 'selected' : '' }}>
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
