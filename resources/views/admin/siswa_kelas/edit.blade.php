@extends('layouts.master')

@section('judul', 'Edit Siswa Kelas')

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

        <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 mb-4">Edit Siswa Kelas</h1>

        <form action="{{ route('siswa_kelas.update', $siswaKelas->id) }}" method="POST"
            class="bg-white p-6 rounded-lg w-full shadow-md max-w-full">
            @csrf
            @method('PUT')

            <!-- Pilih Siswa -->
            <div class="mb-4">
                <label for="siswa_id" class="block text-sm font-medium text-gray-700">Pilih Siswa</label>
                <select id="siswa_id" name="siswa_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Siswa --</option>
                    @foreach ($siswa as $siswa)
                        <option value="{{ $siswa->id }}" {{ $siswaKelas->siswa_id == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
                @error('siswa_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pilih Kelas -->
            <div class="mb-4">
                <label for="kelas_id" class="block text-sm font-medium text-gray-700">Pilih Kelas</label>
                <select id="kelas_id" name="kelas_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelas as $kls)
                        <option value="{{ $kls->id }}" {{ $siswaKelas->kelas_id == $kls->id ? 'selected' : '' }}>
                            {{ $kls->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Pilih Tahun Akademik -->
            <div class="mb-4">
                <label for="tahun_akademik_id" class="block text-sm font-medium text-gray-700">Pilih Tahun Akademik</label>
                <select id="tahun_akademik_id" name="tahun_akademik_id"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- Pilih Tahun Akademik --</option>
                    @foreach ($tahunAkademik as $tahun)
                        <option value="{{ $tahun->id }}"
                            {{ $siswaKelas->tahun_akademik_id == $tahun->id ? 'selected' : '' }}>
                            {{ $tahun->tahun }} - {{ ucfirst($tahun->semester) }}
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
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
