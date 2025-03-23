<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Your Account</title>
</head>


<body class="bg-yellow-50 dark:bg-stone-950  justify-center transition-none transition-colors duration-1000 ">
    @include('layouts.navbar')

    <!-- greeting for customer when they log in, edit- added another line below name -->
    <section class="bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-100 dark:from-stone-950 dark:via-stone-800 dark:to-stone-950 py-16 shadow-inner ">
        <div class="max-w-5xl mx-auto text-center space-y-4">
            <h1 class="text-6xl font-extrabold text-orange-950 dark:text-amber drop-shadow-lg">
                Welcome, {{ ucfirst($user->first_name) }}!
            </h1>
            <p class="text-lg text-orange-800 dark:text-yellow-300 font-medium">
                What would you like to do today?
            </p>
        </div>
    </section>


    <main class="w-full justify-center py-20 px-4 flex flex-col md:flex-row gap-12 dark:bg-stone-950">
        
        <!-- Shopping related buttons for customers to easily access once logged in -->
        <div class="space-y-6 max-w-2xl mr-0 md:mr-5">
            <div class="bg-yellow-100 border border-yellow-300 dark:bg-stone-800 dark:border-stone-900 p-8 rounded-2xl shadow-xl ">
                <h2 class="text-2xl font-bold text-orange-900 dark:text-white mb-6">Actions</h2>
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('products') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        Continue Shopping
                    </a>
                    <a href="{{ route('basket.view') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        View Basket
                    </a>
                    @if($user->permission_level == "admin")

                    <a href="{{ route('admin.dashboard') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-4 rounded-lg text-center font-semibold shadow-md">
                        Go to Admin Portal
                    </a>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- section for user to view orders, account settings etc. // some features not yet implemented -->
        <div class="space-y-6 max-w-2xl md:ml-5 ">
            <div class=" bg-yellow-100 border border-yellow-300 dark:bg-stone-800 dark:border-stone-900 p-8 rounded-2xl shadow-xl">
                <h2 class="text-2xl font-bold text-orange-900 dark:text-white mb-6">Your Account</h2>
                <ul class=" space-y-4 text-orange-950 font-medium dark:text-white">
                    <li>
                        <a href="{{ route('orders') }}"
                            class="flex items-center justify-between hover:text-yellow-600">
                            View Orders <span class="ml-3">→</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.details') }}"
                            class="flex items-center justify-between hover:text-yellow-600">
                            Account Details <span class="ml-3">→</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.settings') }}"
                            class="flex items-center justify-between hover:text-yellow-600">
                            Settings <span class="ml-3">→</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}"
                            class="flex items-center justify-between hover:text-yellow-600">
                            Terms & Conditions <span class="ml-3">→</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center justify-between hover:text-yellow-600">
                            Log Out <span class="ml-3">→</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </main>

    @include('layouts.footer')
</body>

</html>
