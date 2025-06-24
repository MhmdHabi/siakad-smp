@extends('layouts.master')

@section('judul', 'Edit Data Siswa')

@section('content')
    <div class="container mx-auto">
        <!-- Tombol Back -->
        <a href="{{ route('data_siswa') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Siswa
        </a>

        <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Siswa</h2>

        <form action="{{ route('siswa.update', $user->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md max-w-full w-full">
            @csrf
            @method('PUT')

            <!-- NIS & NISN -->
            <div class="flex gap-4 mb-4">
                <div class="w-1/2">
                    <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                    <input type="number" id="nisn" name="nisn"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('nisn', $user->nisn) }}">
                    @error('nisn')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                    <input type="number" id="nis" name="nis"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('nis', $user->nis) }}">
                    @error('nis')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input type="text" id="name" name="name"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tempat Lahir & Tanggal Lahir -->
            <div class="flex gap-4 mb-4">
                <div class="w-1/2">
                    <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                    @error('tempat_lahir')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('tgl_lahir', $user->tgl_lahir) }}">
                    @error('tgl_lahir')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select id="gender" name="gender"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" {{ old('gender', $user->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ old('gender', $user->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
                @error('gender')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- No Telepon & Agama -->
            <div class="flex gap-4 mb-4">
                <div class="w-1/2">
                    <label for="no_tlp" class="block text-sm font-medium text-gray-700">No Telepon</label>
                    <input type="number" id="no_tlp" name="no_tlp"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('no_tlp', $user->no_tlp) }}">
                    @error('no_tlp')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                    <select id="agama" name="agama"
                        class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Agama</option>
                        @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'] as $agama)
                            <option value="{{ $agama }}"
                                {{ old('agama', $user->agama) == $agama ? 'selected' : '' }}>
                                {{ $agama }}
                            </option>
                        @endforeach
                    </select>
                    @error('agama')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="alamat" name="alamat"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="2">{{ old('alamat', $user->alamat) }}</textarea>
                @error('alamat')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="w-full py-2 mt-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Simpan
            </button>
        </form>
    </div>
@endsection
