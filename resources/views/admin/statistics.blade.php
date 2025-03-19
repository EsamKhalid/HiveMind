<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar')

        <div class="flex justify-center overflow-x-auto">
            <p
                class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md my-10"
            >
                <i class="fa-solid fa-chart-line text-7xl mr-4 my-auto"></i>
                Statistics
            </p>
        </div>

        <div class="flex justify-center">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById("myChart");

            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: ["Registered", "Unregistered"],
                    datasets: [
                        {
                            label: "# of Users",
                            data: [{{$registeredUsers}}, {{$unregisteredUsers}}],
                            borderWidth: 1,
                        },
                    ],
                },
                options: {},
            });
        </script>
    </body>
</html>
