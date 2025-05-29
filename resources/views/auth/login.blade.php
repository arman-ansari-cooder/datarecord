<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animated Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md animate__animated animate__fadeInDown">
        <h2 class="text-3xl font-extrabold text-center text-purple-600 mb-6 animate__animated animate__fadeIn animate__delay-1s">
            Welcome My Resort 👋
        </h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded-md text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded-md text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" placeholder="you@example.com" required
                    class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" placeholder="Your password" required
                    class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>

            <div class="flex justify-between items-center text-sm">
                <a href="{{ route('password.request') }}" class="text-purple-600 hover:underline">
                    Forgot Password?
                </a>
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition duration-300 transform hover:scale-105">
                    Login
                </button>
            </div>
        </form>

        <!-- <p class="text-sm text-center mt-6 text-gray-600 animate__animated animate__fadeIn animate__delay-2s">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-purple-600 font-semibold hover:underline">Register</a>
        </p> -->
    </div>

</body>
</html>
