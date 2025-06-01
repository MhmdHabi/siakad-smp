@extends('layouts.master')

@section('judul', 'Edit Ruangan')

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

        <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 mb-4">Edit Ruangan</h1>

        <form action="{{ route('ruangan.update', $ruangan->id) }}" method="POST"
            class="bg-white p-6 rounded-lg w-full shadow-md max-w-full">
            @csrf
            @method('PUT')

            <!-- Kode Ruangan -->
            <div class="mb-4">
                <label for="kode_ruangan" class="block text-sm font-medium text-gray-700">Kode Ruangan</label>
                <input type="text" id="kode_ruangan" name="kode_ruangan"
                    value="{{ old('kode_ruangan', $ruangan->kode_ruangan) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('kode_ruangan')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Jenis Mata Pelajaran -->
            <div class="mb-4">
                <label for="nama_ruangan" class="block text-sm font-medium text-gray-700">Nama Jenis Mata Pelajaran</label>
                <input type="text" id="nama_ruangan" name="nama_ruangan"
                    value="{{ old('nama_ruangan', $ruangan->nama_ruangan) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nama_ruangan')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Update Ruangan
                </button>
            </div>
        </form>

    </div>
@endsection
