@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md max-w-5xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-purple-700">Insert Data</h1>

    <form action="{{ route('insert.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- ID -->
            <div>
                <label for="id" class="block text-base font-medium text-gray-700 mb-1">ID</label>
                <input type="text" id="id" name="custom_id" value="{{ old('custom_id') }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date -->
            <div>
                <label for="date" class="block text-base font-medium text-gray-700 mb-1">Date</label>
                <input type="date" id="date" name="date" value="{{ old('date') }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('date')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Full Name -->
            <div>
                <label for="fullname" class="block text-base font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('fullname')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-base font-medium text-gray-700 mb-1">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('address')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Photo -->
        <div>
    <label for="photo" class="block text-base font-medium text-gray-700 mb-1">Photo</label>
    <input type="file" id="photo" name="photo"
        class="mt-1 block w-full text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
        accept="image/*"
        onchange="previewImage(event)">
    
    {{-- Show validation error --}}
    @error('photo')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

    {{-- Image Preview --}}
    <div class="mt-4">
        <img id="preview" class="max-h-48 rounded-md border" style="display: none;" />
    </div>
</div>


            <!-- Total Price -->
            <div>
                <label for="total_price" class="block text-base font-medium text-gray-700 mb-1">Total Price</label>
                <input type="number" id="total_price" name="total_price" step="0" value="{{ old('total_price') }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('total_price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Room No -->
            <div>
                <label for="room_no" class="block text-base font-medium text-gray-700 mb-1">Room No</label>
                <input type="text" id="room_no" name="room_no" value="{{ old('room_no') }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('room_no')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-base font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit"
                class="w-full md:w-auto bg-purple-600 text-white text-lg px-8 py-3 rounded-md hover:bg-purple-700 transition">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
