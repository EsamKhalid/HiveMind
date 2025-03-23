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
    <a href="{{ route('account') }}"
        class="fas fa-arrow-left fa-3x pl-4 pt-2 dark:text-amber"></a>
    <main class="xl:w-[50%] lg:w-[70%] max-w-full mx-auto mt-2 mb-20 p-8 bg-yellow-50 dark:bg-stone-800 rounded-lg shadow-lg transition-none transition-colors duration-1000">
        <div class="mb-6 text-center">
            <h1 class="font-bold text-3xl mb-6 text-stone-950 dark:text-yellow-400">Your Settings</h1>
            <div>
                <h2 class="font-bold text-2xl text-stone-950 dark:text-yellow-400">Notifications</h2>
                <p class="text-stone-950 dark:text-yellow-200"> How do you want to receive your notifications?</p>

                <p class="text-xl text-center text-stone-950 dark:text-yellow-200">Text <label class = "switch">
                        <input type = "checkbox">
                        <span class = "slider round"></span>
                    </label> </p>
                <p class= "text-xl text-center text-stone-950 dark:text-yellow-200">E-mail <label class = "switch">
                        <input type = "checkbox">
                        <span class = "slider round"></span>
                    </label> </p>
            </div>

            <div class="mb-6 text-center text-stone-950 dark:text-yellow-200">
                <form method="POST" action="{{ route('update.settings') }}">
                    @csrf
                    <label for="terms"> I agree to the
                        <a href="{{ route('terms') }}"class="text-blue-500 hover:underline mr-2">Terms & Conditions</a>
                    </label>
                    <input type="checkbox" id="terms" name="terms_conditions" value="1" class="mr-2" required>
            </div>
            <div class="text-center text-stone-950 dark:text-yellow-200">
                <h2 class="text-2xl mb-3 font-bold text-stone-950 dark:text-yellow-400"> Have any questions? </h2>
                <p> Read our <a href="{{ route(name: 'faq') }}"class="text-blue-500 hover:underline">
                        FAQs</a>
                    or if you would like<a href="{{ route(name: 'contact.view') }}"
                        class="text-blue-500 hover:underline"> Contact Us</a>.</p>
                <div class="mt-8">
                    <h2 class="text-2xl mb-3 font-bold text-stone-950 dark:text-yellow-400"> Edit your security settings </h2>
                    <a href="{{ route('settings.security') }}" class="py-2 hover:underline">Edit My Security Details</a></p>
                </div>    
            </div>
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>
