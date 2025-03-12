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

                    <a
                        href="{{ route('orders') }}"
                        class="bg-ghost-white rounded-lg text-4xl p-1 h-fit w-full m-4"
                        >Click here to view your order</a
                    >
                    {{ $confirmation_number }}
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
