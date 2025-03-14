<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Your account</title>
    </head>
    <body class="transition-all ease-in-out duration-1000 transform bg-yellow-50 dark:bg-stone-950 dark:text-white">

        @include('layouts.navbar')

        <main class="flex justify-center items-center min-h-screen">
            <div class="bg-yellow-100 text-gray-800 border p-16 rounded-lg shadow-lg w-2/3 max-w-4xl transition-all ease-in-out duration-1000 transform dark:bg-stone-700 dark:text-white dark:border-stone-800">
                <h1 class="text-6xl font-bold text-orange-950 pt-10 mb-20 text-center transition-all ease-in-out duration-1000 dark:text-white">
                    Hi {{ ucfirst($user->first_name) }}
                </h1>

                <div class="flex justify-between">
                    <div class="flex flex-col space-y-4 mb-8">
                        <button class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700">
                            <a href="{{ route('products') }}">Continue shopping</a>
                        </button>
                        <button class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700">
                            <a href="{{ route('basket.view') }}">View basket</a>
                        </button>
                    </div>

                    @if($user->permission_level == "admin")
                        <div class="flex flex-col space-y-4 mb-8 h-full">
                            <a class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700 h-full" href="{{ route('admin.dashboard') }}">
                                Go to Admin Portal
                            </a>
                        </div>
                    @endif

                    <div class="border bg-yellow-50 p-6 rounded-lg shadow-md text-center transition-all ease-in-out duration-1000 dark:bg-stone-800">
                        <ul class="space-y-4 text-orange-950 text-lg dark:text-white">
                            <li><a href="{{ route('orders') }}" class="dark:text-white">Orders</a></li>
                            <li><a href="{{ route('user.details') }}" class="dark:text-white">Details</a></li>
                            <li><a href="{{ route('terms') }}" class="dark:text-white">Terms & Conditions</a></li>
                            <li><a href="{{ route('user.settings') }}" class="dark:text-white">Settings</a></li>
                            <li><a href="{{ route('logout') }}" class="dark:text-white">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
