@extends('layouts.master')

@section('judul', 'Tambah Kelas')

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
        <a href="{{ route('admin.kelas') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Kelas
        </a>

        <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 mb-4">Tambah Kelas</h1>

        <form action="{{ route('kelas.store') }}" method="POST" class="bg-white p-6 rounded-lg w-full shadow-md max-w-full">
            @csrf

            <!-- Kode Kelas -->
            <div class="mb-4">
                <label for="kode_kelas" class="block text-sm font-medium text-gray-700">Kode Kelas</label>
                <input type="text" id="kode_kelas" name="kode_kelas" value="{{ old('kode_kelas') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('kode_kelas')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Kelas -->
            <div class="mb-4">
                <label for="nama_kelas" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                <input type="text" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nama_kelas')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pilih Wali Kelas -->
            <div class="mb-4">
                <label for="wali_kelas_id" class="block text-sm font-medium text-gray-700">Wali Kelas</label>
                <select name="wali_kelas_id" id="wali_kelas_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Wali Kelas</option>
                    @foreach ($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ old('wali_kelas_id') == $guru->id ? 'selected' : '' }}>
                            {{ $guru->name }}
                        </option>
                    @endforeach
                </select>
                @error('wali_kelas_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Tambah Kelas
                </button>
            </div>
        </form>
    </div>
@endsection
