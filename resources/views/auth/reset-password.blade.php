<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Reset Password</h2>
        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">New Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>
            <button type="submit" class="w-full py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Reset Password</button>
        </form>
    </div>
    <link rel="stylesheet" href="{{ asset('toaster/toastercss.css') }}">
    <script src="{{ asset('toaster/toasterjq.js') }}"></script>
    <script src="{{ asset('toaster/toasterjs.js') }}"></script>

    <script>
        $(document).ready(function() {
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
</body>
</html>
