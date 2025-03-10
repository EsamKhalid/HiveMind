<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar')
        <div
            id="notifications"
            class="mx-auto mb-auto flex-col w-[80%] mt-[4%]"
        >
            <p
                class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md"
            >
                <i class="fa-solid fa-desktop text-7xl mr-4 my-auto"></i
                >Dashboard
            </p>

            <!-- <div class="columns-2"> -->

                <!-- notifications -->
                <div>
                <p class="text-3xl pt-5 px-4"><i class="fa-solid fa-inbox mr-4 my-auto"></i>Notifications</p>
                @foreach ( $notifications as $notification )
                @if($notification->type == 'userCreated')
                <div class="bg-purple-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                New User Created
                            </p>
                            <p class="text-sm">
                                {{ $notification->first_name }} {{ $notification->last_name }} has signed up to HiveMind. ({{ $notification->created_at }}).
                            </p>
                        </div>
                    </div>
                </div>
                @elseif($notification->type == 'userOrder')
                <div class="bg-yellow-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                New Order Placed
                            </p>
                            <p class="text-sm">
                                New Order worth £{{ $notification->total_amount }} has been placed. ({{ $notification->created_at }}).
                            </p>
                        </div>
                    </div>
                </div>
                @elseif($notification->type == 'stockOrder')
                <div class="bg-yellow-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                New Stock Order
                            </p>
                            <p class="text-sm">
                                New Stock Order for {{ $notification->product_id }} has been placed. ({{ $notification->created_at }}).
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                </div>

                <!-- live reports -->
                <p class="text-3xl pt-5 px-4"><i class="fa-solid fa-chart-simple mr-4 my-auto"></i>Live reports</p>
                <div class="bg-green-100 dark:bg-green-100 border-t-4 border-green-800 dark:border-green-700 rounded-b text-green-900 dark:text-green-900 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                Inventory: Top Selling
                            </p>
                            <p class="text-sm">
                                HiveMind Lip Gloss
                            </p>
                        </div>
                    </div>
                </div>

            <!--</div> -->
        </div>
    </body>
</html>
