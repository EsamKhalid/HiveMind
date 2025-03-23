<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Settings</title>
</head>
<body class="bg-yellow-50 dark:bg-stone-950">
    @include('layouts.navbar')

    <main>
        <a href="{{ route('account') }}"
            class="fas fa-arrow-left fa-3x pl-4 pt-2 dark:text-amber transition-colors ease-in-out duration-1000"></a>

        <div class="xl:w-[40%] lg:w-[50%] md:w-[60%] max-w-full mx-auto mt-2 mb-20 p-8 bg-white dark:bg-stone-700 rounded-lg shadow-md transition-colors ease-in-out duration-1000">
            <h1 class="text-4xl font-semibold text-stone-950 dark:text-yellow-400 mb-6 transition-colors ease-in-out duration-1000">Your Settings</h1>

            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-semibold text-stone-700 hover:text-yellow-500 transition duration-150 dark:text-yellow-300  mb-2">Notifications</h2>
                    <p class="text-gray-700 dark:text-stone-300 mb-4">How do you want to receive your notifications?</p>

                    <div class="space-y-3">
                        <label class="flex items-center space-x-3">
                            <input type="checkbox" class="w-5 h-5 text-yellow-500 focus:ring-yellow-400 border-gray-400 rounded">
                            <span class="text-lg dark:text-yellow-300">SMS</span>
                        </label>
                        <label class="flex items-center space-x-3">
                            <input type="checkbox" class="w-5 h-5 text-yellow-500 focus:ring-yellow-400 border-gray-400 rounded">
                            <span class="text-lg dark:text-yellow-300">E-mail</span>
                        </label>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="flex items-center">
                        <input type="checkbox" id="terms" name="terms_conditions" value="1" class=" text-yellow-500 focus:ring-yellow-400 border-gray-400 rounded mr-2">
                        <span class="text-stone-800 dark:text-stone-200">I agree to the <a href="{{ route('terms') }}" class="text-yellow-600 font-semibold hover:underline">Terms & Conditions</a>.</span>
                    </label>
                </div>

                <div class="mt-6 space-y-2 text-sm">
                    <p class="text-stone-800 dark:text-stone-200">Have any questions? Read our <a href="{{ route('faq') }}" class="text-yellow-600 font-semibold hover:underline">FAQs</a> or <a href="{{ route('contact.view') }}" class="text-yellow-600 font-semibold hover:underline">Contact Us</a>.</p>
                </div>

                <h2 class="text-2xl font-semibold text-stone-700 dark:text-yellow-300 mb-2">
                    <a href="{{ route('settings.security') }}"
                        class="flex items-center justify-between hover:text-yellow-500 transition duration-150">
                            Security Settings <span>→</span>
                    </a>
                </h2>
            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
