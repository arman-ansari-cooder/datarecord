@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow-md rounded max-w-7xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Data List</h2>

  <div class="flex justify-end mb-4">
    <form method="GET" action="{{ route('data.index') }}" class="flex space-x-2">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search by name..." 
            class="border border-gray-300 rounded px-4 py-2 w-64">
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Search</button>
    </form>
</div>


    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID No</th>
                <th class="border px-4 py-2">Date</th>
                <th class="border px-4 py-2">Full Name</th>
                <th class="border px-4 py-2">Address</th>
                <th class="border px-4 py-2">Photo</th>
                <th class="border px-4 py-2">Total Price</th>
                <th class="border px-4 py-2">Room No</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item->custom_id }}</td>
                <td class="border px-4 py-2">{{ $item->date }}</td>
                <td class="border px-4 py-2">{{ $item->fullname }}</td>
                <td class="border px-4 py-2">{{ $item->address }}</td>
                <td class="border px-4 py-2">
                    <img src="{{ asset('image/' . $item->photo) }}" alt="Photo" class="h-12">
                </td>
                <td class="border px-4 py-2">{{ $item->total_price }}</td>
                <td class="border px-4 py-2">{{ $item->room_no }}</td>
                <td class="border px-4 py-2">{{ ucfirst($item->status) }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('data.edit', $item->id) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('data.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <button onclick="printRow(this)" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                        Print
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $data->links() }}
    </div>
</div>

<script>
    function printRow(button) {
        const row = button.closest("tr").outerHTML;
        const printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.write('<table border="1" cellspacing="0" cellpadding="10">' + row + '</table>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
@endsection
