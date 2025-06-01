@extends('layouts.master')

@section('judul', 'Daftar Siswa')

@section('content')
    <div class="container mx-auto py-6 max-w-screen-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Daftar Siswa Berdasarkan Kelas</h1>

        <!-- Tombol Kelas -->
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            @foreach ($kelasList as $kelas)
                <a href="{{ route('nilai.daftar', ['kelas_id' => $kelas->id]) }}"
                    class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                    {{ $kelas->nama_kelas }}
                </a>
            @endforeach
        </div>

        <!-- Daftar Siswa -->
        @if (!empty($result))
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6">Daftar Siswa</h2>
                <div class="space-y-8">
                    @foreach ($result as $item)
                        <form
                            action="{{ isset($item['nilai']) ? route('nilai.update', $item['nilai']->id) : route('nilai.store') }}"
                            method="POST" class="bg-gray-50 border border-gray-200 rounded-lg p-4 shadow-sm">
                            @csrf
                            @if (isset($item['nilai']))
                                @method('PUT')
                            @endif
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-700">
                                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm">
                                        <tr>
                                            <th class="py-3 px-4">Nama Siswa</th>
                                            <th class="py-3 px-4">Mata Pelajaran</th>
                                            <th class="py-3 px-4 text-center">Pengetahuan</th>
                                            <th class="py-3 px-4 text-center">Keterampilan</th>
                                            <th class="py-3 px-4 text-center">Hadir</th>
                                            <th class="py-3 px-4 text-center">Izin</th>
                                            <th class="py-3 px-4 text-center">Alpha</th>
                                            <th class="py-3 px-4 text-center">Tahun Akademik</th>
                                            <th class="py-3 px-4 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-t">
                                            <td class="py-3 px-4">
                                                {{ $item['nama_siswa'] }}
                                                <input type="hidden" name="siswa_id" value="{{ $item['siswa_id'] }}">
                                            </td>
                                            <td class="py-3 px-4">
                                                {{ $item['mata_pelajaran'] }}
                                                <input type="hidden" name="mapel_id" value="{{ $item['mapel_id'] }}">
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <input type="number" name="nilai_pengetahuan"
                                                    class="w-20 text-center border border-gray-300 rounded-md p-1 focus:ring-2 focus:ring-blue-400"
                                                    value="{{ isset($item['nilai']) ? $item['nilai']->nilai_pengetahuan : old('nilai_pengetahuan') }}">
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <input type="number" name="nilai_keterampilan"
                                                    class="w-20 text-center border border-gray-300 rounded-md p-1 focus:ring-2 focus:ring-blue-400"
                                                    value="{{ isset($item['nilai']) ? $item['nilai']->nilai_keterampilan : old('nilai_keterampilan') }}">
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <input type="number" name="hadir"
                                                    class="w-16 text-center border border-gray-300 rounded-md p-1 focus:ring-2 focus:ring-blue-400"
                                                    value="{{ isset($item['nilai']) ? $item['nilai']->hadir : old('hadir') }}">
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <input type="number" name="izin"
                                                    class="w-16 text-center border border-gray-300 rounded-md p-1 focus:ring-2 focus:ring-blue-400"
                                                    value="{{ isset($item['nilai']) ? $item['nilai']->izin : old('izin') }}">
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <input type="number" name="alpha"
                                                    class="w-16 text-center border border-gray-300 rounded-md p-1 focus:ring-2 focus:ring-blue-400"
                                                    value="{{ isset($item['nilai']) ? $item['nilai']->alpha : old('alpha') }}">
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <select name="tahun_akademik_id"
                                                    class="border border-gray-300 rounded-md p-1 w-full focus:ring-2 focus:ring-blue-400">
                                                    <option value="">Pilih</option>
                                                    @foreach ($tahunAkademikList as $tahunAkademik)
                                                        <option value="{{ $tahunAkademik->id }}"
                                                            @if (isset($item['nilai']) && $item['nilai']->tahun_akademik_id == $tahunAkademik->id) selected @endif>
                                                            {{ $tahunAkademik->tahun }} {{ $tahunAkademik->semester }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="py-3 px-4 text-center">
                                                <button type="submit"
                                                    class="bg-green-500 hover:bg-green-600 text-white py-1 px-3 rounded-md transition duration-200">
                                                    {{ isset($item['nilai']) ? 'Perbarui' : 'Simpan' }}
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                position: 'center',
                confirmButtonColor: '#3085d6',
            });
        @endif

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                position: 'center',
                confirmButtonColor: '#d33',
            });
        @endif
    </script>

@endsection
