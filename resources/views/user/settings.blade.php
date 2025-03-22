<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Settings</title>

        <style>
            p {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        @include('layouts.navbar')
        <a
                href="{{ route('account') }}"
                class="fas fa-arrow-left fa-2x pl-4"
        ></a>
        <main class="xl:w-[50%] lg:w-[70%] max-w-full mx-auto mt-2 mb-20 p-8 bg-white rounded-lg shadow-md">
        <div>
            <h1 class="text-4xl font-bold">Your Settings</h1>
        <br>
            <div>
                <h2 class="text-2xl">Notifications</h2>
                <p> How do you want to receive your notifications?</p>

                <p class="text-2xl"> SMS<label class = "switch">
                    <input type = "checkbox">
                    <span class = "slider round"></span>
                </label> </p>
                <p class= "text-2xl">E-mail<label class = "switch">
                    <input type = "checkbox">
                    <span class = "slider round"></span>
                </label> </p>
            </div>

        <br>
        <form method="POST" action="{{ route('update.settings') }}">
            @csrf
        <input type="checkbox" id="terms" name="terms_conditions" value="1" class="mr-2" required>
        <label for="terms"> I agree to the 
            <a href="{{ route('terms') }}"class="text-blue-500 hover:underline">Terms & Conditions</a>.
        </label>
        
        <br>
        <br>
            <p> Have any questions? Read our <a href="{{ route(name:'faq') }}"class="text-blue-500 hover:underline"> FAQs</a>
             or if you would like<a href="{{ route(name:'contact.view') }}" class="text-blue-500 hover:underline"> Contact Us</a>.</p>
        </div>
        <p class="text-9xl text-red-500">settings</p>
        <div class="custom-diagonal-white-right-static"></div>

        <a href="{{ route('settings.security') }}" class="block underline py-2 px-4 hover:bg-stone-200">Security Settings</a>
        </main>
    </body>
</html>