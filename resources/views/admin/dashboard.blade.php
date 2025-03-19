<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard 🐝</title>
        <link rel="icon" href="/favicon.ico">
    </head>

    <body class="transition-none bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar')
        <header class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000"><i
                                class="fa-solid fa-inbox text-yellow-500 text-4xl"></i> Admin Dashboard</h1>
                <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">Manage/Track all admin-related activities from this dashboard</p>
            </div>
        </header>
        <div
            id="notifications"
            class="mx-auto mb-auto flex-col w-[80%] mt-[1%]"
        >
            <div
                class="bg-yellow-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md"
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
