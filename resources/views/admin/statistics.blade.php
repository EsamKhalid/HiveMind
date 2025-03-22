<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar')

        <header class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">Statistics <i class="fa-solid fa-chart-line text-4xl ml-2 my-auto"></i></h1>
                <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">See HiveMind Sales and Statistics below.</p>
            </div>
        </header>
        <div class="flex flex-col justify-center overflow-x-auto w-full p-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">User Statistics</h2>
                    <p class="text-stone-950 dark:text-white">"
                        Total Registered Users: {{ $data["registeredUsers"] }}
                    </p>
                    <p class="text-stone-950 dark:text-white">"
                        Total Unregistered Users:
                        {{ $data["unregisteredUsers"] }}
                    </p>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Order Statistics</h2>
                    <p class="text-stone-950 dark:text-white">"Total Orders: {{ $data["numberOfOrders"] }}</p>
                    <p class="text-stone-950 dark:text-white">"Average Order Value: £{{ $data["avgOrderValue"] }}</p>
                    <p class="text-stone-950 dark:text-white">"Returned Orders: {{ $data["noReturnedOrders"] }}</p>
                    <p class="text-stone-950 dark:text-white">"Return Rate: {{ $data["returnRate"] }}%</p>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Sales Statistics</h2>
                    <p class="text-stone-950 dark:text-white">"Total Revenue: £{{ $data["revenue"] }}</p>
                </div>
                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">
                        Inventory Statistics
                    </h2>
                    <p class="text-stone-950 dark:text-white">"Total Inventory Value: £{{ $data["inventoryValue"] }}</p>
                    <p class="text-stone-950 dark:text-white">"Total Inventory Items: {{ $data["inventoryItems"] }}</p>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">
                        Customer Support Statistics
                    </h2>
                    <p class="text-stone-950 dark:text-white">"Total Enquiries: {{ $data["noEnquiries"] }}</p>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">
                        Product Review Statistics
                    </h2>
                    <p class="text-stone-950 dark:text-white">"Total Product Reviews: {{ $data["noProdReviews"] }}</p>
                    <p class="text-stone-950 dark:text-white">"
                        Average Product Rating: {{ $data["avgProductRating"] }}
                    </p>
                </div>

                <div class="bg-white dark:bg-stone-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">
                        Site Review Statistics
                    </h2>
                    <p class="text-stone-950 dark:text-white">"Total Site Reviews: {{ $data["noSiteReviews"] }}</p>
                    <p class="text-stone-950 dark:text-white">"Average Site Rating: {{ $data["avgSiteRating"] }}</p>
                </div>
            </div>

            <div class="flex justify-center mt-10 w-fit mx-auto rounded-lg dark:bg-stone-800 p-3">
                <div class="text-center ">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white  ">User Distribution</h2>
                    <canvas id="userChart"></canvas>
                </div>
                <div class="text-cente">
                    <h2 class="text-2xl font-bold mb-4 text-stone-950 dark:text-white">Category Sales</h2>
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const data = @json($data);

                    const userCtx = document.getElementById("userChart").getContext('2d');
                    const categoryCtx = document.getElementById("categoryChart").getContext('2d');

                    new Chart(userCtx, {
                        type: "pie",
                        data: {
                            labels: ["Registered", "Unregistered"],
                            datasets: [
                                {
                                    label: "# of Users",
                                    data: [data.registeredUsers, data.unregisteredUsers],
                                    borderWidth: 1,
                                },
                            ],
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'User Distribution'
                                }
                            }
                        },
                    });

                    new Chart(categoryCtx, {
                        type: "pie",
                        data: {
                            labels: Object.keys(data.categorySales),
                            datasets: [
                                {
                                    label: "# of Sales",
                                    data: Object.values(data.categorySales),
                                    borderWidth: 1,
                                },
                            ],
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Category Sales'
                                }
                            }
                        },
                    });
                });
            </script>
        </div>

        @include('layouts.footer')
    </body>
</html>
