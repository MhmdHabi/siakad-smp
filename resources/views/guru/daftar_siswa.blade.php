@extends('layouts.master')

@section('judul', 'Daftar Siswa')

@section('content')
    <div class="container mx-auto py-6 max-w-screen-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Daftar Siswa Berdasarkan Kelas</h1>

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Menampilkan pesan sukses jika ada -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-6">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Tampilkan tombol untuk setiap kelas -->
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            @foreach ($kelasList as $kelas)
                <a href="{{ route('nilai.daftar', ['kelas_id' => $kelas->id]) }}"
                    class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                    {{ $kelas->nama_kelas }}
                </a>
            @endforeach
        </div>

        <!-- Tampilkan daftar siswa jika ada -->
        @if (!empty($result))
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Daftar Siswa</h2>
                <div class="overflow-x-auto">
                    @foreach ($result as $item)
                        <form
                            action="{{ isset($item['nilai']) ? route('nilai.update', $item['nilai']->id) : route('nilai.store') }}"
                            method="POST">
                            @csrf
                            @if (isset($item['nilai']))
                                @method('PUT')
                            @endif
                            <table class="min-w-full bg-gray-50 border border-gray-200 rounded-lg">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Nama Siswa</th>
                                        <th class="py-3 px-6 text-left">Mata Pelajaran</th>
                                        <th class="py-3 px-6 text-center">Nilai Pengetahuan</th>
                                        <th class="py-3 px-6 text-center">Nilai Keterampilan</th>
                                        <th class="py-3 px-6 text-center">Hadir</th>
                                        <th class="py-3 px-6 text-center">Izin</th>
                                        <th class="py-3 px-6 text-center">Alpha</th>
                                        <th class="py-3 px-6 text-center">Tahun Akademik</th>
                                        <th class="py-3 px-6 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-sm font-light">
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            {{ $item['nama_siswa'] }}
                                            <input type="hidden" name="siswa_id" value="{{ $item['siswa_id'] }}">
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            {{ $item['mata_pelajaran'] }}
                                            <input type="hidden" name="mapel_id" value="{{ $item['mapel_id'] }}">
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <input type="number" name="nilai_pengetahuan" class="border p-2 rounded-md"
                                                value="{{ isset($item['nilai']) ? $item['nilai']->nilai_pengetahuan : old('nilai_pengetahuan') }}">
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <input type="number" name="nilai_keterampilan" class="border p-2 rounded-md"
                                                value="{{ isset($item['nilai']) ? $item['nilai']->nilai_keterampilan : old('nilai_keterampilan') }}">
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <input type="number" name="hadir" class="border p-2 rounded-md"
                                                value="{{ isset($item['nilai']) ? $item['nilai']->hadir : old('hadir') }}">
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <input type="number" name="izin" class="border p-2 rounded-md"
                                                value="{{ isset($item['nilai']) ? $item['nilai']->izin : old('izin') }}">
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <input type="number" name="alpha" class="border p-2 rounded-md"
                                                value="{{ isset($item['nilai']) ? $item['nilai']->alpha : old('alpha') }}">
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <select name="tahun_akademik_id" class="border p-2 rounded-md">
                                                <option value="">Pilih Tahun Akademik</option>
                                                @foreach ($tahunAkademikList as $tahunAkademik)
                                                    <option value="{{ $tahunAkademik->id }}"
                                                        @if (isset($item['nilai']) && $item['nilai']->tahun_akademik_id == $tahunAkademik->id) selected @endif>
                                                        {{ $tahunAkademik->tahun }} {{ $tahunAkademik->semester }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">
                                                @if (isset($item['nilai']))
                                                    Perbarui
                                                @else
                                                    Simpan
                                                @endif
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
