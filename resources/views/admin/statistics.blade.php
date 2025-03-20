<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar')

        <div class="flex flex-col justify-center overflow-x-auto w-full p-10">
            <div class="text-center mb-10">
                <p
                    class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md"
                >
                    <i class="fa-solid fa-chart-line text-7xl mr-4 my-auto"></i>
                    Statistics
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">User Statistics</h2>
                    <p>
                        Total Registered Users: {{ $data["registeredUsers"] }}
                    </p>
                    <p>
                        Total Unregistered Users:
                        {{ $data["unregisteredUsers"] }}
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Order Statistics</h2>
                    <p>Total Orders: {{ $data["numberOfOrders"] }}</p>
                    <p>Average Order Value: £{{ $data["avgOrderValue"] }}</p>
                    <p>Returned Orders: {{ $data["noReturnedOrders"] }}</p>
                    <p>Return Rate: {{ $data["returnRate"] }}%</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">Sales Statistics</h2>
                    <p>Total Revenue: £{{ $data["revenue"] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">
                        Inventory Statistics
                    </h2>
                    <p>Total Inventory Value: £{{ $data["inventoryValue"] }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">
                        Customer Support Statistics
                    </h2>
                    <p>Total Enquiries: {{ $data["noEnquiries"] }}</p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">
                        Product Review Statistics
                    </h2>
                    <p>Total Product Reviews: {{ $data["noProdReviews"] }}</p>
                    <p>
                        Average Product Rating: {{ $data["avgProductRating"] }}
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-4">
                        Site Review Statistics
                    </h2>
                    <p>Total Site Reviews: {{ $data["noSiteReviews"] }}</p>
                    <p>Average Site Rating: {{ $data["avgSiteRating"] }}</p>
                </div>
            </div>

            <div class="flex justify-center mt-10">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const data = @json($data);

                    const ctx = document.getElementById("myChart").getContext('2d');

                    new Chart(ctx, {
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
                        options: {},
                    });
                });
            </script>
        </div>

        @include('layouts.footer')
    </body>
</html>
