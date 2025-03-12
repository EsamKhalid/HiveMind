<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login Page</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        @include('layouts.navbar')

        <main class="mt-12 mb-12 flex flex-col items-center">
            <h1 class="text-4xl font-bold text-gray-800 mb-6">
                Track my Order
            </h1>

            @if ($errors->any())
            <div
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 w-96"
            >
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif Guest Order
        </main>
        @include('layouts.footer')
    </body>
</html>
