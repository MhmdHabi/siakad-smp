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
            class="bg-white p-6 rounded-lg shadow-md max-w-full w-full ">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input type="text"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nisn" class="block text-sm font-medium text-gray-700">NISN</label>
                <input type="number"
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="nisn" name="nisn" value="{{ old('nisn', $user->nisn) }}" required>
                @error('nisn')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select
                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="gender" name="gender" required>
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

            <button type="submit"
                class="w-full py-2 mt-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
        </form>
    </div>
@endsection
