<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Validate</title>
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
            @endif
            <form action="{{ route('orders.guest.getOrder') }}" method="GET">
                @csrf

                <div class="mb-4">
                    <label
                        for="surname"
                        class="block text-gray-700 text-sm font-bold mb-2"
                        >Surname:</label
                    >
                    <input
                        type="text"
                        name="surname"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        maxlength="50"
                        placeholder="Enter your Surname"
                        autofocus
                    />
                </div>

                <div class="mb-6">
                    <label
                        for="confirmation"
                        class="block text-gray-700 text-sm font-bold mb-2"
                        >Confirmation Number (6-digits):</label
                    >
                    <input
                        type="text"
                        name="confirmation"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="123456"
                    />
                </div>

                <div class="flex items-center justify-between">
                    <button
                        type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Continue
                    </button>
                    <button
                        type="reset"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Clear
                    </button>
                </div>
            </form>
        </main>
        @include('layouts.footer')
    </body>
</html>
