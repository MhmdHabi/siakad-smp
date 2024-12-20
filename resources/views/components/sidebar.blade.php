<div id="sidebar" class="hidden lg:block lg:w-64 bg-white shadow-md transition-all duration-300 ease-in-out">
    <div class="p-4 flex justify-end mx-auto items-center">
        <button id="toggleSidebar" class="focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <h1 id="sidebarTitle" class="text-xl px-5 font-bold text-blue-600">Siakad SMP 1 Atap Merangin</h1>
    <ul class="mt-6 space-y-2">
        <!-- Sidebar untuk Admin -->
        @if (auth()->user()->role === 'admin')
            <li>
                <a href="{{ route('data_siswa') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('admin/data_siswa') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-user-graduate mr-2"></i>
                    <span class="sidebar-text">Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{ route('data_guru') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('admin/data_guru') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-user-tie mr-2"></i>
                    <span class="sidebar-text">Data Guru</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ruangan') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('admin/ruangan') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-door-open mr-2"></i>
                    <span class="sidebar-text">Ruangan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.mapel') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('admin/mapel') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-book-open mr-2"></i>
                    <span class="sidebar-text">Mata Pelajaran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.kelas') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('admin/kelas') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-school mr-2"></i>
                    <span class="sidebar-text">Kelas</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.jadwal_pelajaran') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('admin/jadwal_pelajaran') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <span class="sidebar-text">Jadwal Pelajaran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.siswa_kelas') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('admin/siswa_kelas') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fa-solid fa-users mr-2"></i>
                    <span class="sidebar-text">Siswa Kelas</span>
                </a>
            </li>
        @endif

        <!-- Sidebar untuk Guru -->
        @if (auth()->user()->role === 'guru')
            <li>
                <a href="{{ route('jadwal.mengajar') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('guru/jadwal-mengajar') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-chalkboard mr-2"></i>
                    <span class="sidebar-text">Jadwal Mengajar</span>
                </a>
            </li>
            <li>
                <a href="{{ route('nilai.daftar') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('guru/nilai/daftar') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-clipboard-list mr-2"></i>
                    <span class="sidebar-text">Daftar Siswa</span>
                </a>
            </li>
        @endif

        <!-- Sidebar untuk Siswa -->
        @if (auth()->user()->role === 'siswa')
            <li>
                <a href="{{ route('jadwal.pelajaran') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('siswa/jadwal-pelajaran') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-calendar-day mr-2"></i>
                    <span class="sidebar-text">Jadwal Pelajaran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('siswa.nilai') }}"
                    class="flex items-center py-2 px-4 text-gray-800 hover:bg-[#5DB9FF] hover:text-white sidebar-item {{ request()->is('siswa/nilai') ? 'bg-[#5DB9FF] text-white' : '' }}">
                    <i class="fas fa-poll mr-2"></i>
                    <span class="sidebar-text">Nilai</span>
                </a>
            </li>
        @endif
    </ul>
</div>
