@extends('layouts.master')

@section('judul', 'Tambah Ruangan')

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
        <a href="{{ route('admin.ruangan') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Ruangan
        </a>

        <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 mb-4">Tambah Ruangan</h1>

        <form action="{{ route('ruangan.store') }}" method="POST" class="bg-white p-6 rounded-lg w-full shadow-md max-w-full">
            @csrf

            <!-- Kode Ruangan -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Kode Ruangan</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <input type="text" id="kode_ruangan" name="kode_ruangan" value="{{ old('kode_ruangan') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('kode_ruangan')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Ruangan -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Nama Ruangan</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <input type="text" id="nama_ruangan" name="nama_ruangan" value="{{ old('nama_ruangan') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nama_ruangan')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kapasitas -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <input type="number" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    min="1">
                @error('kapasitas')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Tambah Ruangan
                </button>
            </div>
        </form>
    </div>
@endsection
