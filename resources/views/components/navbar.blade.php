<nav class="bg-white shadow sticky top-0 z-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Left: Hamburger & Title -->
            <div class="flex items-center">
                <button id="toggleDrawer" class="lg:hidden mr-4 text-gray-600 hover:text-blue-600 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <span class="text-xl font-semibold text-gray-900">@yield('judul')</span>
            </div>

            <!-- Right: Icons & User Dropdown -->
            <div class="hidden lg:flex items-center space-x-6 relative">
                <!-- Notification Icon -->
                <button class="text-gray-600 hover:text-blue-600 focus:outline-none relative" aria-label="Notifications">
                    <i class="fas fa-bell text-xl"></i>
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full"
                        title="New notifications"></span>
                </button>

                <!-- Chat Icon -->
                <button class="text-gray-600 hover:text-blue-600 focus:outline-none" aria-label="Chat">
                    <i class="fas fa-comments text-xl"></i>
                </button>

                <!-- User Icon -->
                <button id="userMenuButton"
                    class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 focus:outline-none"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle text-2xl"></i>
                    <span class="text-sm font-medium">Hi, <strong>{{ auth()->user()->name }}</strong></span>
                    <i class="fas fa-chevron-down text-sm ml-1"></i>
                </button>

                <!-- Dropdown Menu -->
                <div id="userDropdown"
                    class="absolute right-0 mt-20 w-40 bg-white border border-gray-200 rounded-md shadow-lg py-2 opacity-0 pointer-events-none transition-opacity duration-200"
                    role="menu" aria-orientation="vertical" aria-labelledby="userMenuButton">
                    <form id="dropdownLogoutForm" action="{{ route('logout') }}" method="POST" class="px-3">
                        @csrf
                        <button type="submit"
                            class="w-full text-left text-white bg-blue-700 hover:bg-blue-600 rounded-md py-1.5 text-sm font-semibold transition-colors duration-150 flex items-center justify-center"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    const userMenuButton = document.getElementById('userMenuButton');
    const userDropdown = document.getElementById('userDropdown');

    userMenuButton.addEventListener('click', () => {
        const isVisible = userDropdown.classList.contains('opacity-100');
        if (isVisible) {
            userDropdown.classList.remove('opacity-100');
            userDropdown.classList.add('opacity-0', 'pointer-events-none');
            userMenuButton.setAttribute('aria-expanded', 'false');
        } else {
            userDropdown.classList.add('opacity-100');
            userDropdown.classList.remove('opacity-0', 'pointer-events-none');
            userMenuButton.setAttribute('aria-expanded', 'true');
        }
    });

    document.addEventListener('click', (event) => {
        if (!userMenuButton.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.classList.remove('opacity-100');
            userDropdown.classList.add('opacity-0', 'pointer-events-none');
            userMenuButton.setAttribute('aria-expanded', 'false');
        }
    });
</script>
