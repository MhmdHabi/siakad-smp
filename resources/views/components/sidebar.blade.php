<div id="sidebar" class="hidden lg:block lg:w-64 bg-[#211C84] shadow-md transition-all duration-300 ease-in-out">
    <div class="p-4 flex justify-between items-center mx-auto">
        <!-- User Info -->
        <div id="sidebarTitle" class="text-white">
            <div class="flex items-center space-x-2">
                <i class="fas fa-user-circle text-3xl"></i>
                <div class="flex flex-col text-sm font-medium">
                    <span>{{ auth()->user()->name }}</span>
                    <span class="text-xs text-gray-300">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>
        <!-- Hamburger Icon -->
        <button id="toggleSidebar" class="focus:outline-none text-white text-lg">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="overflow-y-auto max-h-[calc(100vh-80px)]">
        <ul class="mt-4 space-y-2">
            @if (auth()->user()->role === 'admin')
                <li class="px-4 text-xs text-gray-300 uppercase tracking-wider">
                    Main
                </li>
                <li>
                    <a href="{{ route('data_siswa') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/data_siswa') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-user-graduate mr-2"></i>
                        <span class="sidebar-text">Data Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('data_guru') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/data_guru') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-user-tie mr-2"></i>
                        <span class="sidebar-text">Data Guru</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.ruangan') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/ruangan') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-door-open mr-2"></i>
                        <span class="sidebar-text">Ruangan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.mapel') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/mapel') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-book-open mr-2"></i>
                        <span class="sidebar-text">Mata Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kelas') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/kelas') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-school mr-2"></i>
                        <span class="sidebar-text">Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.jadwal_pelajaran') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/jadwal_pelajaran') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        <span class="sidebar-text">Jadwal Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.siswa_kelas') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/siswa_kelas') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fa-solid fa-users mr-2"></i>
                        <span class="sidebar-text">Siswa Kelas</span>
                    </a>
                </li>
                <li class="px-4 pt-4 text-xs text-gray-300 uppercase tracking-wider">
                    Laporan
                </li>
                <li>
                    <a href="{{ route('admin.laporan.guru') }}" target="_blank"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/laporan_guru') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        <span class="sidebar-text">Laporan Guru</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.laporan.siswa') }}" target="_blank"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/laporan_siswa') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        <span class="sidebar-text">Laporan Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.laporan.ruangan') }}" target="_blank"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/laporan_siswa') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        <span class="sidebar-text">Laporan Ruangan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.laporan.mapel') }}" target="_blank"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('admin/laporan_siswa') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        <span class="sidebar-text">Laporan Mapel</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role === 'guru')
                <li>
                    <a href="{{ route('jadwal.mengajar') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('guru/jadwal-mengajar') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-chalkboard mr-2"></i>
                        <span class="sidebar-text">Jadwal Mengajar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('nilai.daftar') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('guru/nilai/daftar') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        <span class="sidebar-text">Daftar Siswa</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role === 'siswa')
                <li>
                    <a href="{{ route('jadwal.pelajaran') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('siswa/jadwal-pelajaran') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-calendar-day mr-2"></i>
                        <span class="sidebar-text">Jadwal Pelajaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('siswa.nilai') }}"
                        class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] sidebar-item {{ request()->is('siswa/nilai') ? 'bg-[#4D55CC] text-white' : '' }}">
                        <i class="fas fa-poll mr-2"></i>
                        <span class="sidebar-text">Nilai</span>
                    </a>
                </li>
            @endif

            <li class="px-4 pt-4 text-xs text-gray-300 uppercase tracking-wider">
                Auth
            </li>
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"
                    class="flex items-center py-2 px-4 text-white hover:bg-[#4D55CC] transition-all duration-200 sidebar-item">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span class="sidebar-text">Logout</span>
                </a>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
