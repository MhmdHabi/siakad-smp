@extends('layouts.master')

@section('judul', 'Tambah Data Siswa')

@section('content')
    <div class="container mx-auto">
        <!-- Tombol Back -->
        <a href="{{ route('data_siswa') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Siswa
        </a>

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Data Siswa</h2>

        <form action="{{ route('siswa.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-full w-full">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- NIS & NISN -->
            <div class="flex flex-col md:flex-row gap-4 mb-4">
                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="name" class="block text-sm font-medium text-gray-700">NISN</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="string" id="nisn" name="nisn" value="{{ old('nisn') }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nisn')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="name" class="block text-sm font-medium text-gray-700">NIS</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="string" id="nis" name="nis" value="{{ old('nis') }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nis')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Tempat Lahir & Tanggal Lahir -->
            <div class="flex flex-col md:flex-row gap-4 mb-4">
                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('tempat_lahir')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full md:w-1/2">
                    <div class="relative inline-block">
                        <label for="name" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('tgl_lahir')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Jenis Kelamin dan No Telepon   -->
            <div class="flex gap-4 mb-4">
                <!-- No Telepon -->
                <div class="w-1/2">
                    <div class="relative inline-block">
                        <label for="no_tlp" class="block text-sm font-medium text-gray-700">No Telepon</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <input type="number" id="no_tlp" name="no_tlp" value="{{ old('no_tlp') }}"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('no_tlp')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="w-1/2">
                    <div class="relative inline-block">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                            <i class="fas fa-asterisk"></i>
                        </span>
                    </div>
                    <select id="gender" name="gender"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Agama -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <select id="agama" name="agama"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Agama</option>
                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
                @error('agama')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="name" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <textarea id="alamat" name="alamat" rows="3"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-2 mt-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
        </form>
    </div>
@endsection
