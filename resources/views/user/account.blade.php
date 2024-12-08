<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header></header>
        @include('layouts.navbar')

        <main>
            <div class="flex justify-center m-4">
                <p class="text-6xl">Your Account</p>
            </div>

            <div class="flex justify-center">
                <div class="inline-block">
                    <div class="flex justify-center">
                        <div
                            class="flex justify-center w-fit h-[50vh] bg-amber"
                        >
                            <div class="flex justify-center w-full m-4">
                                <div class="flex">
                                    <a
                                        href="{{ route('logout') }}"
                                        class="bg-ghost-white rounded-lg text-4xl p-1 h-fit w-full m-4"
                                        >Logout</a
                                    >
                                    <a
                                        href="{{ route('orders') }}"
                                        class="bg-ghost-white rounded-lg text-4xl p-1 h-fit w-full m-4"
                                        >Orders</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cdwa-right h-[13px]"></div>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
