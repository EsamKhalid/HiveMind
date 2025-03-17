<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Your account</title>
    </head>
    <body>
        @include('layouts.navbar')

        <main class="flex justify-center min-h-screen bg-white dark:bg-stone-950 transition-colors duration-1000">
            <div
                class="bg-yellow-100 dark:bg-stone-600 border dark:border-none p-16 rounded-lg shadow-lg w-2/3 min-w-4/5 lg:max-w-6xl  mt-[10%] max-h-fit"
            >
                <!-- want to add customer's name when they log in -->
                <h1
                    class="text-6xl font-bold text-orange-950 dark:text-amber pt-10 mb-20 "
                >
                    Hi {{ ucfirst($user->first_name)}}
                </h1>

                <div class="flex justify-between flex-col lg:flex-row">
                    <!-- buttons for customer to easily access once logged in -->
                    <div class="flex flex-col space-y-7 lg:space-y-4 lg:mr-5 text-3xl lg:text-lg">
                        <button
                            class="bg-yellow-600 dark:bg-stone-500 text-white px-6 py-3 rounded-md hover:bg-yellow-700 dark:hover:bg-stone-700"
                        >
                            <a href="{{ route('products') }}"
                                >Continue shopping</a
                            >
                        </button>
                        <button
                            class="bg-yellow-600 dark:bg-stone-500 text-white px-6 py-3 rounded-md hover:bg-yellow-700 dark:hover:bg-stone-700"
                        >
                            <a href="{{ route('basket.view') }}">View basket</a>
                        </button>
                    

                    @if($user->permission_level == "admin")

                    <div class="flex flex-col space-y-7 lg:space-y-4 h-full">
                        <a
                            class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-700 h-fit mt-auto mb-14 lg:mb-0 text-center"
                            href="{{ route('admin.dashboard') }}"
                            >Go to Admin Portal</a
                        >
                    </div>
                    @endif
                    </div>
                    <!-- section for user to view orders, account settings etc. // some features not yet implemented -->
                    <div
                        class="border bg-yellow-50 p-6 rounded-lg shadow-md text-center "
                    >
                        <ul class="space-y-8 lg:space-y-4 text-orange-950 text-3xl lg:text-lg">
                            <li><a class="hover:bg-stone-300 px-10 py-2" href="{{ route('orders') }}">Orders</a></li>
                            <!-- these pages aren't implemented yet, redirects to products page for now -->
                            <li>
                                <a class="hover:bg-stone-300 px-10 py-2" href="{{ route('user.details') }}"
                                    >Details</a
                                >
                            </li>
                            <li>
                                <a class="hover:bg-stone-300 px-5 py-2" href="{{ route('terms') }}"
                                    >Terms & Conditions</a
                                >
                            </li>
                            <li>
                                <a class="hover:bg-stone-300 px-10 py-2" href="{{ route('user.settings') }}"
                                    >Settings</a
                                >
                            </li>
                            <li><a class="hover:bg-stone-300 px-10 py-2" href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
