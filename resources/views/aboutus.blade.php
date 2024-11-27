<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About Us</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navbar')
        <br>
        <div class="aboutUsPage">
            <h2 class="text-5xl font-semibold tracking-tight text-black sm:text-7xl text-center margin-top: 1rem">About Hivemind</h2>
            <br>
            <p class="text-2xl text-center font-style: italic">
                By purchasing our products, you are supporting our mission to save the bees.
            </p>
            <br>
            <div class="flex justify-center">
                <img src="/Images/beekeeperfamily.jpeg" alt="beekeeper and son"></img>
            </div>
            <br>
            <div class="text-center">
                <p class="list-inside text-2xl list-disc font-style: italic">
                    Hivemind is a community driven by a committment to bees and the environment.<br>
                    We are dedicated to raising awareness about the conservation of bees and habitat preservation.<br>
                    Our products are made with natural ingredients and are cruelty free.<br>
                    <!--<img src="/Images/beedaisy.jpeg" alt="bee on a daisy"></img>-->
                </ul>
            </div>
        </div>
    </body>
</html>