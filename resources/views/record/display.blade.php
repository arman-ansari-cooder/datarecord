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
    <div class="overflow-x-auto">
       <table class="min-w-full table-fixed border border-gray-300">
        <thead>
            <tr class="bg-gray-100 text-sm">
                <th class="border px-2 py-2 w-24">ID No</th>
                <th class="border px-2 py-2 w-28">Date</th>
                <th class="border px-2 py-2 w-40">Full Name</th>
                <th class="border px-2 py-2 w-48">Address</th>
                <th class="border px-2 py-2 w-28">Photo</th>
                <th class="border px-2 py-2 w-32">Total Price</th>
                <th class="border px-2 py-2 w-24">Room No</th>
                <th class="border px-2 py-2 w-40">Food Name</th>
                <th class="border px-2 py-2 w-28">Status</th>
                <th class="border px-2 py-2 w-40">Actions</th>
            </tr>
        </thead>
            <tbody class="text-sm">
                @foreach ($data as $item)
                <tr class="hover:bg-gray-50">
                   <td class="border px-2 py-2 text-center truncate">{{ $item->custom_id }}</td>
<td class="border px-2 py-2 text-center">{{ $item->date }}</td>
<td class="border px-2 py-2 truncate">{{ $item->fullname }}</td>
<td class="border px-2 py-2 truncate">{{ $item->address }}</td>
<td class="border px-2 py-2 text-center">
    <a href="{{ asset('image/' . $item->photo) }}" target="_blank">
        <img src="{{ asset('image/' . $item->photo) }}" alt="Photo"
            class="h-12 w-12 object-cover mx-auto rounded">
    </a>
</td>
<td class="border px-2 py-2 text-right">{{ $item->total_price }}</td>
<td class="border px-2 py-2 text-center">{{ $item->room_no }}</td>
<td class="border px-2 py-2">{!! $item->food_name !!}</td>

<td class="border px-2 py-2 text-center">{{ ucfirst($item->status) }}</td>

<td class="border px-2 py-2">
    <div class="flex justify-center gap-2">
        {{-- Edit Icon --}}
        <a href="{{ route('data.edit', $item->id) }}"
            class="text-yellow-500 hover:text-yellow-600" title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M16.121 3.879l3 3L12 14l-4 1 1-4 7.121-7.121z" />
            </svg>
        </a>

        {{-- Delete Icon --}}
        <form action="{{ route('data.destroy', $item->id) }}" method="POST"
              onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-700" title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </form>

        {{-- Print Icon --}}
        <button onclick="printRow(this)" class="text-green-600 hover:text-green-700" title="Print">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 9V2h12v7M6 18h12v4H6v-4zM6 14h12v-4H6v4z" />
            </svg>
        </button>
    </div>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

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

    <link rel="stylesheet" href="{{ asset('toaster/toastercss.css') }}">
    <script src="{{ asset('toaster/toasterjq.js') }}"></script>
    <script src="{{ asset('toaster/toasterjs.js') }}"></script>

    <script>
      $(document).ready(function () {
        @if (session('success'))
      toastr.success("{{ session('success') }}");
    @endif

        @if (session('error'))
      toastr.error("{{ session('error') }}");
    @endif

        @if (session('info'))
      toastr.info("{{ session('info') }}");
    @endif

        @if (session('warning'))
      toastr.warning("{{ session('warning') }}");
    @endif
        });
    </script>
@endsection
