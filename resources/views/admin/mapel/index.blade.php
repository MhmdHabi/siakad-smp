@extends('layouts.master')

@section('judul', 'Jenis Mata Pelajaran')

@section('content')
    <div class="container mx-auto mt-5 bg-gray-100 shadow-lg rounded-lg p-6">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg flex flex-col items-start">
                <div class="flex items-center space-x-2 mb-1">
                    <i class="fas fa-check-circle text-green-600 text-lg"></i>
                    <span class="font-semibold">Berhasil!</span>
                </div>
                <span>{{ session('success') }}</span>
            </div>
        @elseif (session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg flex flex-col items-start">
                <div class="flex items-center space-x-2 mb-1">
                    <i class="fas fa-times-circle text-red-600 text-lg"></i>
                    <span class="font-semibold">Gagal!</span>
                </div>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Title -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg lg:text-2xl font-semibold text-gray-800">Mata Pelajaran</h1>
            <a href="{{ route('mapel.create') }}"
                class="text-sm hidden sm:inline-block  px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-plus mr-2"></i> Tambah Mapel
            </a>

            <!-- Ikon untuk layar kecil -->
            <div class="inline-flex space-x-2 sm:hidden">
                <a href="{{ route('mapel.create') }}"
                    class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        <!-- Table for Mata Pelajaran -->
        <div class="overflow-x-auto p-4">
            <table class="min-w-full table-auto border-separate border-spacing-0" id="dataTable">
                <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Nama Mapel</th>
                        <th class="px-6 py-3 text-left">Kode Mapel</th>
                        <th class="px-6 py-3 text-left">Dibuat Pada</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($MataPelajaran as $mapel)
                        <tr class="hover:bg-gray-50 transition-all duration-200 ease-in-out">
                            <td class="px-6 py-3 text-gray-800">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $mapel->nama_mapel }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $mapel->kode_mapel }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $mapel->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-3">
                                <a href="{{ route('mapel.edit', $mapel->id) }}"
                                    class="text-blue-600 hover:text-blue-800 mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST"
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
            $('#dataTable').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "lengthChange": true,
                "pageLength": 10,
                "lengthMenu": [10, 25, 50, 100]
            });
        });

        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();

            const form = $(this).closest('form');
            const url = form.attr('action');

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
                    form.submit();
                }
            });
        });

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33'
            });
        @endif
    </script>

    <style>
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1rem;
        }
    </style>
@endsection
