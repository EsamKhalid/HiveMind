<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Order Confirmation</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        @include('layouts.navbar')

        <main
            class="flex flex-col items-center justify-center min-h-screen py-12"
        >
            <div
                class="bg-white shadow-lg rounded-lg p-8 max-w-lg w-full text-center"
            >
                <h1 class="text-4xl font-bold text-gray-800 mb-6">
                    Order Confirmation
                </h1>
                <p class="text-2xl text-gray-600 mb-4">
                    Thank you for your order!
                </p>
                <p class="text-xl text-gray-700 mb-8">
                    Your confirmation number is:
                </p>
                <p class="text-3xl font-semibold text-gray-900 mb-8">
                    {{ $confirmation_number }}
                </p>

                @auth
                <a
                    href="{{ route('orders') }}"
                    class="bg-amber hover:bg-amber text-white font-bold py-2 px-4 rounded-lg text-xl"
                >
                    View Your Order
                </a>
                @else
                <a
                    href="{{ route('orders.guest.validate') }}"
                    class="bg-amber hover:bg-amber text-white font-bold py-2 px-4 rounded-lg text-xl"
                >
                    View Your Order
                </a>
                @endauth
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
