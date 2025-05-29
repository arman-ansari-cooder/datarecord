<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700">Verify OTP</h2>
        <form method="POST" action="{{ route('password.otp.verify') }}" class="space-y-4">
            @csrf
            <div>
                <label for="otp" class="block text-sm font-medium text-gray-600">Enter OTP</label>
                <input type="number" id="otp" name="otp" class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter OTP" required>
                @error('otp')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Verify</button>
        </form>
    </div>
</body>
</html>
