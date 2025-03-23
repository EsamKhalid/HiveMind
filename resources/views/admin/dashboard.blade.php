<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard 🐝</title>
    <link rel="icon" href="/favicon.ico">
</head>

<body class="transition-none bg-stone-200 dark:bg-stone-950 flex">
    @include('layouts.sidebar')
    <header class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">
                <i class="fa-solid fa-inbox text-yellow-500 text-4xl"></i> Admin Dashboard
            </h1>
            <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">
                Manage/track all admin-related activities from this dashboard
            </p>
        </div>
    </header>

    <div id="notifications" class="mx-auto mb-auto flex-col w-[90%] mt-[1%]">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- analytics -->
            <div>
                <h2 class="text-3xl font-bold mb-4 text-stone-950 dark:text-white">Analytics
                    <i class="fa-solid fa-chart-line ml-5 mr-1 text-xl md:text-xl 2xl:text-3xl"></i>
                </h2>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Statistics</h2>
                    <p class="text-stone-950 dark:text-white">View statistics about HiveMind.</p>
                    <br>
                    <a href="{{ route('admin.statistics') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        View statistics
                    </a>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Notifications
                        <i class="fa-solid fa-bell ml-5 mr-1 text-xl md:text-xl 2xl:text-3xl"></i>
                    </h2>
                    <p class="text-stone-950 dark:text-white">View all notifications about users, orders and inventory
                        updates.</p>
                    <br>
                    <a href="{{ route('admin.notifications') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        View notifications
                    </a>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Reports</h2>
                    <p class="text-stone-950 dark:text-white">View past annual reports.</p>
                    <br>
                    <a href="{{ route('admin.reports') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        View reports
                    </a>
                </div>

            </div>

            <!-- customer -->
            <div>
                <h2 class="text-3xl font-bold mb-4 text-stone-950 dark:text-white">Customer
                    <i class="fa-solid fa-user ml-5 mr-1 text-xl md:text-xl 2xl:text-3xl"></i>
                </h2>
                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Manage Users</h2>
                    <p class="text-stone-950 dark:text-white">View all users and their details.</p>
                    <br>
                    <a href="{{ route('admin.user-management') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        Manage users
                    </a>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">User Enquiries</h2>
                    <p class="text-stone-950 dark:text-white">View all user enquiries.</p>
                    <br>
                    <a href="{{ route('admin.userEnquiries') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        View user enquiries
                    </a>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Customer View</h2>
                    <p class="text-stone-950 dark:text-white">View the HiveMind website as a customer.</p>
                    <br>
                    <a href="{{ route('home') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        HiveMind
                    </a>
                </div>
            </div>

            <!-- inventory -->
            <div>
                <h2 class="text-3xl font-bold mb-4 text-stone-950 dark:text-white">Inventory
                    <i class="fa-solid fa-warehouse ml-5 mr-1 text-xl md:text-xl 2xl:text-3xl"></i>
                </h2>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Inventory</h2>
                    <p class="text-stone-950 dark:text-white">Manage the inventory for HiveMind.</p>
                    <br>
                    <a href="{{ route('admin.inventory') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        View inventory
                    </a>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md mb-4">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Orders & Returns</h2>
                    <p class="text-stone-950 dark:text-white">Manage all orders and return requests.</p>
                    <br>
                    <a href="{{ route('admin.adminOrder') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 transition duration-200 text-white px-6 py-3 rounded-lg text-center font-semibold shadow-md">
                        Manage orders
                    </a>
                </div>

            </div>

        </div>
    </div>

</body>

</html>