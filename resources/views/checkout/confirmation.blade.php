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
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
