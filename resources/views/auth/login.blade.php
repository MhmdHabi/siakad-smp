<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="min-h-screen flex items-center justify-center bg-blue-400">
    <div class="flex w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Left Image Section -->
        <div class="hidden md:block md:w-1/2 min-h-[28rem] p-6 shadow-2xl rounded-lg">
            <img src="{{ asset('assets/login.jpg') }}" alt="Login Image"
                class="object-cover w-full h-full rounded-lg" />
        </div>

        <!-- Right Form Section -->
        <div class="w-full md:w-1/2 p-8">
            <h1 class="text-3xl font-bold mb-8 text-gray-800 text-center">Selamat Datang</h1>

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="mb-4 p-3 text-sm text-white bg-green-500 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-3 text-sm text-white bg-red-500 rounded-md">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('loginPost') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email Input with Icon -->
                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 pointer-events-none">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" placeholder="you@example.com" required
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    </div>
                </div>

                <!-- Password Input with Icon -->
                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400 pointer-events-none">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" placeholder="••••••••" required
                            class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />

                        <!-- Eye icon -->
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-200">
                    Login
                </button>
            </form>

            <p class="mt-6 text-sm text-center text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>
</body>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye / eye-slash icon
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>

</html>
