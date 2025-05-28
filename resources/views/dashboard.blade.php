@extends('layouts.app')

@section('content')
<body class="bg-gray-50 text-gray-800 font-sans">



            <!-- Content -->
            <main class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all">
                        <div class="text-gray-600">Users</div>
                        <div class="text-2xl font-bold text-purple-700 mt-1">1,250</div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all">
                        <div class="text-gray-600">Active Customers</div>
                        <div class="text-2xl font-bold text-green-600 mt-1">875</div>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition-all">
                        <div class="text-gray-600">Inactive Customers</div>
                        <div class="text-2xl font-bold text-red-500 mt-1">375</div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>
@endsection
