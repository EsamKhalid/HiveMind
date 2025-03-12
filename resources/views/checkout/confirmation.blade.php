<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <header></header>
        @include('layouts.navbar')

        <main>
            <div class="flex justify-center m-4">
                <div class="inline-block">
                    <p class="text-6xl">Confirmation</p>

                    @auth
                    <a
                        href="{{ route('orders') }}"
                        class="bg-ghost-white rounded-lg text-4xl p-1 h-fit w-full m-4"
                        >Click here to view your order</a
                    >
                    @else
                    <a
                        href="{{ route('orders.guest.validate') }}"
                        class="bg-ghost-white rounded-lg text-4xl p-1 h-fit w-full m-4"
                        >Click here to view your order</a
                    >
                    @endauth
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
