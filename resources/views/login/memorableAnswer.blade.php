<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navbar')

    <main class="mt-12 mb-12 flex flex-col items-center">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 w-96">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.verifyAnswer') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96 max-w-sm">
            @csrf
            <p>{{ $email }}</p>
            <h1 class="text-3xl font-bold text-gray-800 mb-5">Password Recovery</h1>

            <input type="hidden" name="email" value="{{ $email }}">

            <div class="mb-4">
                <p><strong class="text-gray-700 text-sm font-bold mb-2">Memorable Question:</strong> {{ $memorable_question }}</p>
            </div>

            <div class="mb-6">
                <label for="memorable_answer" class="block text-gray-700 text-sm font-bold mb-2">Answer:</label>
                <input type="text" name="memorable_answer" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required/>
            </div>

            <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded">Next</button>
            <a href="{{ route('login') }}" class="px-4 py-2 ml-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Cancel
            </a> 
        </form>


    </main>
    @include('layouts.footer')
</body>
</html>
