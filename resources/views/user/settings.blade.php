<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navbar')
        <p class="text-9xl text-red-500">settings</p>
        <div class="custom-diagonal-white-right-static"></div>

        <a href="{{ route('settings.security') }}" class="block underline py-2 px-4 hover:bg-gray-200">Security Settings</a>

    </body>
</html>
