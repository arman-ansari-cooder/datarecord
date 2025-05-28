<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="bg-white shadow-lg w-64 hidden md:block">
            <div class="p-6 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-purple-700">My Resort</h1>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg text-gray-700 hover:bg-purple-100 transition">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7m-9 2v6m0 0H5m4 0h10"></path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('insert') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg text-gray-700 hover:bg-purple-100 transition">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Insert Data
                </a>
                <a href="{{ route('data.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg text-gray-700 hover:bg-purple-100 transition">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3"></path>
                    </svg>
                    Reports
                </a>
                <a href="#" class="flex items-center gap-2 py-2 px-4 rounded-lg text-gray-700 hover:bg-purple-100 transition">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m0 14v1m8.5-8.5l-.7.7M4.2 4.2l.7.7m12 12l.7.7M4.2 19.8l.7-.7M21 12h1M2 12H1"></path>
                    </svg>
                    Settings
                </a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="flex items-center gap-2 py-2 px-4 rounded-lg text-red-600 hover:bg-red-100 transition mt-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
                    </svg>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-md p-5 flex items-center justify-between">
                <h2 class="text-xl font-semibold">Dashboard</h2>
                <div class="text-sm">Welcome, {{ Auth::user()->name }}</div>
            </header>

            <!-- Page Content -->
            <main class="p-6 overflow-y-auto flex-1">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
