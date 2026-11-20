<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Helpdesk IT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Helpdesk IT</h1>
            <p class="text-blue-600 font-semibold mt-1">Login Admin</p>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST" class="bg-white p-6 rounded-lg shadow">
            @csrf

            <div class="mb-4">
                <label for="email" class="block font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       placeholder="Masukkan email" autofocus
                       class="w-full p-3 border rounded-lg bg-white">
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block font-semibold mb-2">Password</label>
                <input type="password" name="password" id="password"
                       placeholder="Masukkan password"
                       class="w-full p-3 border rounded-lg bg-white">
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-2 mb-6 text-sm">
                <input type="checkbox" name="remember" class="rounded">
                Ingat saya
            </label>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
                Masuk
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-4">
            Pelapor gangguan? <a href="{{ route('complaint.preview') }}" class="text-blue-600 hover:underline">Buka form pengaduan</a>
        </p>
    </div>

</body>
</html>
