<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navbar')

    <main class="mt-12 mb-12 flex flex-col items-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">Login</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 w-96">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="loginForm" action="{{ route('login.submit') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96 max-w-sm">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    maxlength="50" 
                    value="{{ old('email') }}" 
                    placeholder="Enter your email"
                    autofocus 
                />
            </div>

            <div>
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    placeholder="Enter your password" 
                />
            </div>

            <div class="mt-2 mb-4">
                <a href="{{ route('password.recover') }}" class="text-blue-500 hover:underline text-sm">
                    Forgot password?
                </a>
            </div>

            <div class="flex items-center justify-between">
                <button 
                    type="submit" 
                    class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Login
                </button>
                <button 
                    type="reset" 
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Clear
                </button>
            </div>

            <div class="mt-4 text-center">
                <a 
                    href="{{ route('signup') }}" 
                    class="text-blue-500 hover:underline text-sm">
                    Not a customer yet? Create an account
                </a>
            </div>
        </form>
    </main>
    @include('layouts.footer')
</body>
</html>
