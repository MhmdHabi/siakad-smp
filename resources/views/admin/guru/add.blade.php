@extends('layouts.master')

@section('judul', 'Tambah Guru')

@section('content')
    <div class="container mx-auto mt-5">
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

        <!-- Tombol Back -->
        <a href="{{ route('data_guru') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Siswa
        </a>

        <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 mb-4">Tambah Data Guru</h1>

        <form action="{{ route('guru.store') }}" method="POST" class="bg-white p-6 rounded-lg w-full shadow-md max-w-full">
            @csrf

            <!-- NIP -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">NIP</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <input type="number" id="nip" name="nip" value="{{ old('nip') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nip')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Name -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Nama</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tempat Lahir dan Tanggal Lahir -->
            <div class="flex flex-col md:flex-row gap-4 mb-4">
                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('tempat_lahir')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('tgl_lahir')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Status dan Jenjang -->
            <div class="flex flex-col md:flex-row gap-4 mb-4">
                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Status</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="text" id="status" name="status" value="{{ old('status') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('status')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Jenjang</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="text" id="jenjang" name="jenjang" value="{{ old('jenjang') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('jenjang')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Gender dan Agama -->
            <div class="flex flex-col md:flex-row gap-4 mb-4">
                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <select id="gender" name="gender"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option selected disabled>-- Select Gender --</option>
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Agama</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <select id="agama" name="agama"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" selected disabled>-- Pilih Agama --</option>
                        <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam</option>
                        <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="buddha" {{ old('agama') == 'buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="konghucu" {{ old('agama') == 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                    @error('agama')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Password</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('password')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('password_confirmation')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Tambah
                    Guru</button>
            </div>
        </form>
    </div>
@endsection
