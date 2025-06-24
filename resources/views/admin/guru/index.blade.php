@extends('layouts.master')

@section('judul', 'Data Guru')

@section('content')
    <div class="container mx-auto mt-5 bg-gray-100 shadow-lg rounded-lg p-6">
        <!-- Success and Error Messages -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <!-- 🟦 Info Box -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <!-- Total Siswa -->
            <div class="bg-white border-l-4 border-blue-600 p-4 shadow rounded-lg flex items-center">
                <i class="fas fa-users text-blue-600 text-2xl mr-4"></i>
                <div>
                    <p class="text-gray-600 text-sm">Total Guru</p>
                    <h3 class="text-xl font-bold text-gray-800">{{ $teachers->count() }}</h3>
                </div>
            </div>
        </div>

        <!-- Title -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg lg:text-2xl font-semibold text-gray-800">Data Guru</h1>
            <div class="space-x-4 flex items-center">
                <!-- Tombol untuk layar besar -->
                <a href="{{ route('guru.create') }}"
                    class="hidden sm:inline-block text-sm px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <i class="fas fa-user-plus mr-2"></i> Tambah Data
                </a>

                <!-- Ikon untuk layar kecil -->
                <div class="inline-flex space-x-2 sm:hidden">
                    <a href=""
                        class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table for Data Guru -->
        <div class="overflow-x-auto p-4">
            <table class="min-w-full table-auto border-separate border-spacing-0" id="dataTable">
                <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">NIP</th>
                        <th class="px-6 py-3 text-left">Nama Guru</th>
                        <th class="px-6 py-3 text-left">Tempat Lahir</th>
                        <th class="px-6 py-3 text-left">Tanggal Lahir</th>
                        <th class="px-6 py-3 text-left">Jenis kelamin</th>
                        <th class="px-6 py-3 text-left">Agama</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Jenjang</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($teachers as $teacher)
                        <tr class="hover:bg-gray-50 transition-all duration-200 ease-in-out">
                            <td class="px-6 py-3 text-gray-800">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $teacher->nip }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $teacher->name }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $teacher->tempat_lahir }}</td>
                            <td class="px-6 py-3 text-gray-800">
                                {{ \Carbon\Carbon::parse($teacher->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $teacher->gender }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $teacher->agama }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $teacher->status }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $teacher->jenjang }}</td>
                            <td class="px-6 py-3">
                                <a href="{{ route('guru.edit', $teacher->id) }}"
                                    class="text-blue-600 hover:text-blue-800 mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('guru.destroy', $teacher->id) }}" method="POST"
                                    style="display:inline;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-red-600 hover:text-red-800 mx-2 delete-button">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTable with pagination options
            $('#dataTable').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10,
                "lengthMenu": [10, 25, 50, 100, 500, ]
            });
        });

        // SweetAlert ketika tombol delete ditekan
        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();

            const form = $(this).closest('form'); // Mengambil form yang berisi tombol delete
            const url = form.attr('action'); // URL action dari form

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika konfirmasi di-OK-kan
                    form.submit();
                }
            });
        });
    </script>
@endsection

<style>
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1rem;
    }
</style>
