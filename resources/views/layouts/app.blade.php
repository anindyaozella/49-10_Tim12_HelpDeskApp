<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Helpdesk IT')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 text-gray-800">

    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('categories.index') }}" class="text-xl font-bold text-blue-800">
                Helpdesk IT
            </a>

            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('complaint.preview') }}" class="text-blue-700 hover:underline">Form Pengaduan</a>

                @auth
                    <a href="{{ route('categories.index') }}" class="text-blue-700 hover:underline">Kategori Masalah</a>

                    <span class="text-gray-500">Halo, {{ auth()->user()->name }}</span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white py-2 px-5 rounded-full hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white py-2 px-5 rounded-full hover:bg-blue-700">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>