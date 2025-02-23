<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Your account</title>
    </head>
    <body>
        @include('layouts.navbar')

        <main class="flex justify-center items-center min-h-screen">
            <div
                class="bg-yellow-100 border p-16 rounded-lg shadow-lg w-2/3 max-w-4xl"
            >
                <!-- want to add customer's name when they log in -->
                <h1 class="text-6xl font-bold text-orange-950 pt-10 mb-20">
                    Hi {{ $user->first_name}}
                </h1>

                <div class="flex justify-between">
                    <!-- buttons for customer to easily access once logged in -->
                    <div class="flex flex-col space-y-4 mb-8">
                        <button
                            class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700"
                        >
                            <a href="{{ route('products') }}"
                                >Continue shopping</a
                            >
                        </button>
                        <button
                            class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700"
                        >
                            <a href="{{ route('basket.view') }}">View basket</a>
                        </button>
                    </div>

                    @if($user->permission_level == "admin")

                    <div class="flex flex-col space-y-4 mb-8 h-full">
                        <a
                            class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700 h-full"
                            href="{{ route('admin.dashboard') }}"
                            >Go to Admin Portal</a
                        >
                    </div>

                    @endif

                    <!-- section for user to view orders, account settings etc. // some features not yet implemented -->
                    <div
                        class="border bg-yellow-50 p-6 rounded-lg shadow-md text-center"
                    >
                        <ul class="space-y-4 text-orange-950 text-lg">
                            <li><a href="{{ route('orders') }}">Orders</a></li>
                            <!-- these pages aren't implemented yet, redirects to products page for now -->
                            <li>
                                <a href="{{ route('user.details') }}"
                                    >Details</a
                                >
                            </li>
                            <li>
                                <a href="{{ route('user.terms') }}"
                                    >Terms & Conditions</a
                                >
                            </li>
                            <li>
                                <a href="{{ route('user.settings') }}"
                                    >Settings</a
                                >
                            </li>
                            <li><a href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
