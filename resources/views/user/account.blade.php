<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Your Account</title>
</head>

<body class="bg-yellow-50">
    @include('layouts.navbar')

    <!-- greeting for customer when they log in, edit- added another line below name -->
    <section class="bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-100 py-16 shadow-inner">
        <div class="max-w-5xl mx-auto text-center space-y-4">
            <h1 class="text-6xl font-extrabold text-orange-950 drop-shadow-lg">
                Welcome, {{ ucfirst($user->first_name) }}!
            </h1>
            <p class="text-lg text-orange-800 font-medium">
                What would you like to do today?
            </p>
        </div>
    </section>

    <main class="max-w-6xl mx-auto py-20 px-4 grid md:grid-cols-2 gap-12">
        
        <!-- Shopping related buttons for customers to easily access once logged in -->
        <div class="space-y-6">
            <div class="bg-yellow-100 border border-yellow-300 p-8 rounded-2xl shadow-xl">
                <h2 class="text-2xl font-bold text-orange-900 mb-6">Actions</h2>
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('products') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        Continue Shopping
                    </a>
                    <a href="{{ route('basket.view') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        View Basket
                    </a>
                    @if($user->permission_level == "admin")
                    <a href="{{ route('admin.dashboard') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-4 rounded-lg text-center font-semibold shadow-md">
                        Go to Admin Portal
                    </a>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- section for user to view orders, account settings etc. // some features not yet implemented -->
        <div class="space-y-6">
            <div class="bg-yellow-100 border border-yellow-300 p-8 rounded-2xl shadow-xl">
                <h2 class="text-2xl font-bold text-orange-900 mb-6">Your Account</h2>
                <ul class="space-y-4 text-orange-950 font-medium">
                    <li>
                        <a href="{{ route('orders') }}"
                            class="flex items-center justify-between hover:text-yellow-600 transition duration-150">
                            View Orders <span>→</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.details') }}"
                            class="flex items-center justify-between hover:text-yellow-600 transition duration-150">
                            Account Details <span>→</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.settings') }}"
                            class="flex items-center justify-between hover:text-yellow-600 transition duration-150">
                            Settings <span>→</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}"
                            class="flex items-center justify-between hover:text-yellow-600 transition duration-150">
                            Terms & Conditions <span>→</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center justify-between hover:text-yellow-600 transition duration-150">
                            Log Out <span>→</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </main>

    @include('layouts.footer')
</body>

</html>
