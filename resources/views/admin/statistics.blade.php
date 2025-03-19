<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>User Enquiries</title>
    </head>
    <body>
        @include('layouts.navbar')
        <div class="flex justify-center">
            @if($errors->any())
            <h4 class="text-3xl">{{$errors->first()}}</h4>
            @endif
        </div>

        <main class="flex justify-center items-center text-center min-h-screen">
            <div class="w-full max-w-4xl p-4">
                <p
                    class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md my-10"
                >
                    <i class="fa-solid fa-chart-line text-7xl mr-4 my-auto"></i>
                    Statistics
                </p>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
