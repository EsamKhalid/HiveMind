<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard 🐝</title>
        <link rel="icon" href="/favicon.ico">
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar')
        <div
            id="notifications"
            class="mx-auto mb-auto flex-col w-[80%] mt-[4%]"
        >
            <p
                class="text-4xl lg:text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md"
            >
                <i class="fa-solid fa-inbox mr-4 my-auto"></i
                >NOTIFICATIONS
            </p>
            <div
                class="bg-yellow-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md my-5 mx-5"
            >
                <div class="flex">
                    <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                    <div>
                        <p class="font-bold">
                            An Update has been made to the inventory
                        </p>
                        <p class="text-sm">
                            New shipment for product x has been made
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
