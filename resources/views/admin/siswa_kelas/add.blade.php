@extends('layouts.master')

@section('judul', 'Tambah Siswa Kelas')

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
        <a href="{{ route('admin.siswa_kelas') }}" class="text-blue-600 hover:text-blue-800 mb-4 inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Siswa Kelas
        </a>

        <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 mb-4">Tambah Siswa Kelas</h1>

        <form action="{{ route('siswa_kelas.store') }}" method="POST"
            class="bg-white p-6 rounded-lg w-full shadow-md max-w-full">
            @csrf
            <!-- Pilih Siswa -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Pilih Siswa</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <select id="siswa_id" name="siswa_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswa as $item)
                        <option value="{{ $item->id }}" {{ old('siswa_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                @error('siswa_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pilih Kelas -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Pilih Kelas</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <select id="kelas_id" name="kelas_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}" {{ old('kelas_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pilih Tahun Akademik -->
            <div class="mb-4">
                <div class="relative inline-block">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Pilih Tahun Akademik</label>
                    <span class="absolute top-1 -right-2 text-red-500 text-[7px]">
                        <i class="fas fa-asterisk"></i>
                    </span>
                </div>
                <select id="tahun_akademik_id" name="tahun_akademik_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Tahun Akademik --</option>
                    @foreach ($tahunAkademik as $item)
                        <option value="{{ $item->id }}" {{ old('tahun_akademik_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->tahun }} ({{ ucfirst($item->semester) }})
                        </option>
                    @endforeach
                </select>
                @error('tahun_akademik_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    Tambah Siswa Kelas
                </button>
            </div>
        </form>
    </div>
@endsection
