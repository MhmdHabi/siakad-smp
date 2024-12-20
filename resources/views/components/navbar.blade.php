  <nav class="bg-white rounded shadow sticky top-0 z-10">
      <div class="flex justify-between items-center p-4">
          <!-- Hamburger Menu -->
          <button id="toggleDrawer" class="lg:hidden focus:outline-none">
              <i class="fas fa-bars text-gray-800 text-lg"></i>
          </button>

          <div class="text-lg font-semibold text-gray-800">Navbar</div>
          <div class="hidden lg:flex items-center space-x-4">
              <span class="text-gray-600">Welcome, {{ auth()->user()->name }}</span>
              <form id="dropdownLogoutForm" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <a href="#"
                      onclick="event.preventDefault(); document.getElementById('dropdownLogoutForm').submit();"
                      class="text-blue-500">Logout</a>
              </form>
          </div>
      </div>
  </nav>
