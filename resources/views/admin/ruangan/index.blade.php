@extends('layouts.master')

@section('judul', 'Ruangan')

@section('content')
    <div class="container mx-auto mt-5 bg-gray-100 shadow-lg rounded-lg p-6">
        <!-- Title -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg lg:text-2xl font-semibold text-gray-800">Ruangan</h1>
            <a href="{{ route('ruangan.create') }}"
                class="text-sm hidden sm:inline-block  px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <i class="fas fa-plus mr-2"></i> Tambah Ruangan
            </a>

            <!-- Ikon untuk layar kecil -->
            <div class="inline-flex space-x-2 sm:hidden">
                <a href="{{ route('ruangan.create') }}"
                    class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>

        <!-- Table for Jenis Mata Pelajaran -->
        <div class="overflow-x-auto p-4">
            <table class="min-w-full table-auto border-separate border-spacing-0" id="dataTable">
                <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Nama Ruangan</th>
                        <th class="px-6 py-3 text-left">Kode Ruangan</th>
                        <th class="px-6 py-3 text-left">Dibuat Pada</th>
                        <th class="px-6 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($ruangan as $item)
                        <tr class="hover:bg-gray-50 transition-all duration-200 ease-in-out">
                            <td class="px-6 py-3 text-gray-800">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $item->nama_ruangan }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $item->kode_ruangan }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $item->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-3">
                                <a href="{{ route('ruangan.edit', $item->id) }}"
                                    class="text-blue-600 hover:text-blue-800 mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('ruangan.destroy', $item->id) }}" method="POST"
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

            // SweetAlert untuk notifikasi sukses
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif

            // SweetAlert untuk notifikasi error
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif
        });

        // Konfirmasi hapus data dengan SweetAlert
        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();

            const form = $(this).closest('form');

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
    </script>

    <style>
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1rem;
        }
    </style>
@endsection
