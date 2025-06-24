@extends('layouts.master')

@section('judul', 'Edit Guru')

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
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Guru
        </a>

        <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 mb-4">Edit Data Guru</h1>

        <form action="{{ route('guru.update', $guru->id) }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-md max-w-full w-full">
            @csrf
            @method('PUT') <!-- Using PUT method for update -->

            <!-- NIP -->
            <div class="mb-4">
                <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                <input type="number" id="nip" name="nip" value="{{ old('nip', $guru->nip) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nip')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $guru->name) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gender -->
            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select id="gender" name="gender"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option selected disabled>-- Select Gender --</option>
                    <option value="Laki-laki" {{ old('gender', $guru->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ old('gender', $guru->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
                @error('gender')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Agama -->
            <div class="mb-4">
                <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                <select id="agama" name="agama"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected disabled>-- Pilih Agama --</option>
                    <option value="islam" {{ old('agama', $guru->agama) == 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="kristen" {{ old('agama', $guru->agama) == 'kristen' ? 'selected' : '' }}>Kristen
                    </option>
                    <option value="hindu" {{ old('agama', $guru->agama) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="buddha" {{ old('agama', $guru->agama) == 'buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="konghucu" {{ old('agama', $guru->agama) == 'konghucu' ? 'selected' : '' }}>Konghucu
                    </option>
                </select>
                @error('agama')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tempat Lahir -->
            <div class="mb-4">
                <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir"
                    value="{{ old('tempat_lahir', $guru->tempat_lahir) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('tempat_lahir')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-4">
                <label for="tgl_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', $guru->tgl_lahir) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('tgl_lahir')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" id="status" name="status" value="{{ old('status', $guru->status) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('status')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jenjang -->
            <div class="mb-4">
                <label for="jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
                <input type="text" id="jenjang" name="jenjang" value="{{ old('jenjang', $guru->jenjang) }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('jenjang')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select id="role" name="role"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option selected disabled>-- Select Role --</option>
                    <option value="siswa" {{ old('role', $guru->role) == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="guru" {{ old('role', $guru->role) == 'guru' ? 'selected' : '' }}>Guru</option>
                    <option value="admin" {{ old('role', $guru->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('password')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('password_confirmation')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Update
                    Guru</button>
            </div>
        </form>
    </div>
@endsection
