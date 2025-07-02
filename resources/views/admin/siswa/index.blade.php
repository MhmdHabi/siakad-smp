@extends('layouts.master')

@section('judul', 'Data siswa')

@section('content')
    <div class="container mx-auto mt-5 bg-gray-100 shadow-lg rounded-lg p-6">
        <!-- Success and Error Messages -->
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

        <!-- 🟦 Info Box -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <!-- Total Siswa -->
            <div class="bg-white border-l-4 border-blue-600 p-4 shadow rounded-lg flex items-center">
                <i class="fas fa-users text-blue-600 text-2xl mr-4"></i>
                <div>
                    <p class="text-gray-600 text-sm">Total Siswa</p>
                    <h3 class="text-xl font-bold text-gray-800">{{ $users->count() }}</h3>
                </div>
            </div>

            <!-- Siswa Laki-laki -->
            <div class="bg-white border-l-4 border-green-600 p-4 shadow rounded-lg flex items-center">
                <i class="fas fa-male text-green-600 text-2xl mr-4"></i>
                <div>
                    <p class="text-gray-600 text-sm">Laki-laki</p>
                    <h3 class="text-xl font-bold text-gray-800">
                        {{ $users->where('gender', 'Laki-laki')->count() }}
                    </h3>
                </div>
            </div>

            <!-- Siswa Perempuan -->
            <div class="bg-white border-l-4 border-pink-500 p-4 shadow rounded-lg flex items-center">
                <i class="fas fa-female text-pink-500 text-2xl mr-4"></i>
                <div>
                    <p class="text-gray-600 text-sm">Perempuan</p>
                    <h3 class="text-xl font-bold text-gray-800">
                        {{ $users->where('gender', 'Perempuan')->count() }}
                    </h3>
                </div>
            </div>
        </div>

        <!-- Title and Buttons -->
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-lg lg:text-2xl font-semibold text-gray-800">Data Siswa Siswi</h1>
            <div class="space-x-4 flex items-center">
                <!-- Tombol untuk layar besar -->
                <a href="{{ route('siswa.create') }}"
                    class="hidden sm:inline-block text-sm px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <i class="fas fa-user-plus mr-2"></i> Tambah Data Siswa
                </a>

                <!-- Ikon untuk layar kecil -->
                <div class="inline-flex space-x-2 sm:hidden">
                    <a href="{{ route('siswa.create') }}"
                        class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table for Data User -->
        <div class="overflow-x-auto p-4">
            <table class="min-w-full table-auto border-separate border-spacing-0" id="dataTable">
                <thead class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                    <tr class="text-sm">
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">NIS</th>
                        <th class="px-6 py-3 text-left">NISN</th>
                        <th class="px-6 py-3 text-left">Nama Siswa</th>
                        <th class="px-6 py-3 text-left">Tempat Lahir</th>
                        <th class="px-6 py-3 text-left">Tanggal Lahir</th>
                        <th class="px-6 py-3 text-left">Agama</th>
                        <th class="px-6 py-3 text-left">Alamat</th>
                        <th class="px-6 py-3 text-left">No Telepon</th>
                        <th class="px-6 py-3 text-left">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition-all duration-200 ease-in-out text-sm">
                            <td class="px-6 py-3 text-gray-800">{{ $loop->iteration }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $user->nis }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $user->nisn }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $user->name }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $user->tempat_lahir }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $user->tgl_lahir }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $user->agama }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $user->alamat }}</td>
                            <td class="px-6 py-3 text-gray-800">{{ $user->no_tlp }}</td>
                            <td class="px-6 py-3 text-gray-700 flex items-center gap-2">
                                {!! $user->gender === 'Laki-laki'
                                    ? '<i class="fas fa-mars text-blue-500 text-lg"></i> <span class="text-gray-800">Laki-laki</span>'
                                    : '<i class="fas fa-venus text-pink-500 text-lg"></i> <span class="text-gray-800">Perempuan</span>' !!}
                            </td>
                            <td class="px-6 py-3 text-center">
                                <a href="{{ route('siswa.edit', $user->id) }}"
                                    class="text-blue-600 hover:text-blue-800 mx-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('siswa.destroy', $user->id) }}" method="POST"
                                    style="display:inline;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 mx-2">
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script DataTable & SweetAlert -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                paging: true,
                searching: true,
                info: true,
                lengthChange: true,
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100, 500],
            });
        });

        // SweetAlert delete confirmation
        document.querySelectorAll('.delete-form').forEach((form) => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan bisa mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection

<style>
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1rem;
    }
</style>
