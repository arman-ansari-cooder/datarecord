@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow-md max-w-5xl mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-purple-700">Edit Data</h1>

    <form action="{{ route('data.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- ID -->
            <div>
                <label for="custom_id" class="block text-base font-medium text-gray-700 mb-1">ID</label>
                <input type="number" id="custom_id" name="custom_id" value="{{ old('custom_id', $data->custom_id) }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('custom_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date -->
            <div>
                <label for="date" class="block text-base font-medium text-gray-700 mb-1">Date</label>
                <input type="date" id="date" name="date" value="{{ old('date', $data->date) }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('date')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Full Name -->
            <div>
                <label for="fullname" class="block text-base font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $data->fullname) }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('fullname')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-base font-medium text-gray-700 mb-1">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $data->address) }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('address')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Photo -->
            <div>
                <label for="photo" class="block text-base font-medium text-gray-700 mb-1">Photo</label>

                @if ($data->photo)
                    <div class="mb-2">
                        <a href="{{ asset('image/' . $data->photo) }}" target="_blank">
                            <img src="{{ asset('image/' . $data->photo) }}" alt="Current Photo"
                                class="h-20 w-20 object-cover rounded border">
                        </a>
                    </div>
                @endif

                <input type="file" id="photo" name="photo"
                    class="mt-1 block w-full text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
                    accept="image/*" onchange="previewImage(event)">
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
                <input type="number" id="total_price" name="total_price" step="0" min="0" value="{{ old('total_price', $data->total_price) }}"
                    class="mt-1 block w-full h-12 px-4 text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                @error('total_price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Room No -->
            <div>
                <label for="room_no" class="block text-base font-medium text-gray-700 mb-1">Room No</label>
                <input type="number" id="room_no" name="room_no" value="{{ old('room_no', $data->room_no) }}"
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
                    <option value="active" {{ old('status', $data->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $data->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

<!-- Food Name -->
<div class="col-span-1 md:col-span-2">
    <label for="food_name" class="block text-base font-medium text-gray-700 mb-1">Food Name</label>
    <textarea id="food_name" name="food_name"
        class="mt-1 block w-full text-lg border border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500"
        rows="5">{{ old('food_name', $data->food_name) }}</textarea>
    @error('food_name')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit"
                class="w-full md:w-auto bg-purple-600 text-white text-lg px-8 py-3 rounded-md hover:bg-purple-700 transition">
                Update
            </button>
        </div>
    </form>
</div>

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

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('food_name');
</script>

@endsection
