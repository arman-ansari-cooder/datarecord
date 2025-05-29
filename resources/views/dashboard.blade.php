@extends('layouts.app')

@section('content')
<body class="bg-gray-50 text-gray-800 font-sans">
    <main class="flex-1 p-6 bg-gray-50 overflow-y-auto grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all">
            <div class="text-gray-600">Users</div>
            <div class="text-2xl font-bold text-purple-700 mt-1">{{ $totalUsers }}</div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all">
            <div class="text-gray-600">Active Customers</div>
            <div class="text-2xl font-bold text-green-600 mt-1">{{ $activeUsers }}</div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all">
            <div class="text-gray-600">Inactive Customers</div>
            <div class="text-2xl font-bold text-red-500 mt-1">{{ $inactiveUsers }}</div>
        </div>

    </main>
</body>
@endsection
