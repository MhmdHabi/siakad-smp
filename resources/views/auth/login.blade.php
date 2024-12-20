<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="https://via.placeholder.com/150" alt="Logo" class="w-24 h-24">
        </div>

        <!-- Form Login -->
        <h1 class="mb-6 text-3xl font-bold text-center">Login</h1>

        <!-- Display Success or Error Messages -->
        @if (session('success'))
            <div class="mb-4 p-3 text-white bg-green-500 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-3 text-white bg-red-500 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('loginPost') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full p-3 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Login
            </button>
        </form>
        <p class="mt-4 text-sm text-center">Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
        </p>
    </div>
</body>

</html>
