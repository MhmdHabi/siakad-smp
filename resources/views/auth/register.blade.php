<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-6 m-5">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="https://via.placeholder.com/150" alt="Logo" class="w-24 h-24">
        </div>

        <!-- Form Register -->
        <h1 class="mb-6 text-3xl font-bold text-center">Register</h1>
        <form action="{{ route('registerPost') }}" method="POST">
            @csrf
            <!-- Input Fields Flex Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border rounded-lg" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border rounded-lg" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="nisn" class="block mb-2 text-sm font-medium text-gray-700">NISN</label>
                    <input type="text" id="nisn" name="nisn" class="w-full p-3 border rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-700">Gender</label>
                    <select id="gender" name="gender" class="w-full p-3 border rounded-lg" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label for="religion" class="block mb-2 text-sm font-medium text-gray-700">Agama</label>
                <select id="agama" name="agama" class="w-full p-3 border rounded-lg" required>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="hindu">Hindu</option>
                    <option value="buddha">Buddha</option>
                    <option value="konghucu">Konghucu</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full p-3 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">Confirm
                    Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="w-full p-3 border rounded-lg" required>
            </div>

            <button type="submit" class="w-full p-3 text-white bg-green-500 rounded-lg hover:bg-green-600">
                Register
            </button>
        </form>
        <p class="mt-4 text-sm text-center">Sudah punya akun?
            <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </p>
    </div>
</body>

</html>
