<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Wishlist</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 min-h-screen">
        @include('layouts.navbar')

        <header class="bg-gradient-to- pt-4 pb-8 shadow-md border">
            <a
                href="{{ route('account') }}"
                class="fas fa-arrow-left fa-2x pl-4"
            ></a>
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold">Wishlist</h1>
                <p class="text-lg mt-2 text-gray-600">
                    Here are your saved products.
                </p>
            </div>
        </header>

        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session("success") }}
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ session("error") }}
        </div>
        @endif

        <main>
            <!-- waiting on backend... -->
        </main>

        @include('layouts.footer')
    </body>
</html>
