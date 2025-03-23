<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Notifications</title>
</head>

<body class="bg-stone-200 dark:bg-stone-950 flex">
    @include('layouts.sidebar')

    <header class="bg-gradient-to- bg-white dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000"><i
                    class="fa-solid fa-inbox text-yellow-500 text-4xl"></i> Notifications</h1>
            <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">Track notifications and live reports.</p>
        </div>
    </header>

    <div id="notifications" class="mx-auto mb-auto flex-col w-[80%] mt-[1%]">

        <!-- <div class="columns-2"> -->

        <!-- notifications -->
        <div>
            <p class="text-3xl pt-5 px-4 text-stone-950 dark:text-white"><i
                    class="fa-solid fa-inbox mr-4 my-auto"></i>Notifications</p>
            @forelse ( $notifications as $notification )
                @if ($notification->type == 'userCreated')
                    <div
                        class="bg-purple-100 dark:bg-purple-300 border-t-4 border-indigo-400 dark:border-indigo-400 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                        <div class="flex">
                            <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                            <div>
                                <p class="font-bold">
                                    New User Registered
                                </p>
                                <p class="text-sm">
                                    {{ $notification->first_name }} {{ $notification->last_name }} has signed up to
                                    HiveMind. ({{ $notification->time }}).
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($notification->type == 'userOrder')
                    <div
                        class="bg-green-100 dark:bg-green-300 border-t-4 border-emerald-800 dark:border-emerald-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                        <div class="flex">
                            <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                            <div>
                                <p class="font-bold">
                                    New Order Placed
                                </p>
                                <p class="text-sm">
                                    New Order for @foreach ($notification->orderItems as $order_item)
                                        {{ $order_item->quantity }}x {{ $order_item->products->product_name }},
                                    @endforeach for {{ $notification->first_name }}
                                    {{ $notification->last_name }} worth £{{ $notification->total_amount }} has been
                                    placed. ({{ $notification->time }}).
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($notification->type == 'guestOrder')
                    <div
                        class="bg-green-100 dark:bg-green-300 border-t-4 border-emerald-800 dark:border-emerald-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                        <div class="flex">
                            <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                            <div>
                                <p class="font-bold">
                                    New Order Placed
                                </p>
                                <p class="text-sm">
                                    New Order for @foreach ($notification->orderItems as $order_item)
                                        {{ $order_item->quantity }}x {{ $order_item->products->product_name }},
                                    @endforeach for guest {{ $notification->first_name }}
                                    {{ $notification->last_name }} worth £{{ $notification->total_amount }} has been
                                    placed. ({{ $notification->time }}).
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($notification->type == 'stockOrder')
                    <div
                        class="bg-yellow-100 dark:bg-yellow-300 border-t-4 border-yellow-800 dark:border-yellow-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                        <div class="flex">
                            <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                            <div>
                                <p class="font-bold">
                                    New Stock Order
                                </p>
                                <p class="text-sm">
                                    New Stock Order for {{ $notification->stock_quantity }}x
                                    {{ $notification->product_name }} has been placed. ({{ $notification->time }}).
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($notification->type == 'userOrderUpdate')
                    <div
                        class="bg-blue-100 dark:bg-blue-300 border-t-4 border-blue-800 dark:border-blue-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                        <div class="flex">
                            <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                            <div>
                                <p class="font-bold">
                                    Order Status Updated
                                </p>
                                <p class="text-sm">
                                    Order Status for @foreach ($notification->orderItems as $order_item)
                                        {{ $order_item->quantity }}x {{ $order_item->products->product_name }},
                                    @endforeach for {{ $notification->first_name }}
                                    {{ $notification->last_name }} has been updated to
                                    {{ $notification->order_status }}. ({{ $notification->time }}).
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($notification->type == 'guestOrderUpdate')
                    <div
                        class="bg-blue-100 dark:bg-blue-300 border-t-4 border-blue-800 dark:border-blue-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                        <div class="flex">
                            <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                            <div>
                                <p class="font-bold">
                                    Order Status Updated
                                </p>
                                <p class="text-sm">
                                    Order Status for @foreach ($notification->orderItems as $order_item)
                                        {{ $order_item->quantity }}x {{ $order_item->products->product_name }},
                                    @endforeach for guest {{ $notification->first_name }}
                                    {{ $notification->last_name }} has been updated to
                                    {{ $notification->order_status }}. ({{ $notification->time }}).
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div
                    class="bg-pink-100 dark:bg-pink-100 border-t-4 border-pink-800 dark:border-pink-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                No Notifications
                            </p>
                            <p class="text-sm">
                                There are no notifications at this time.
                            </p>
                        </div>
                    </div>
                </div>

            @endforelse
        </div>

        <!-- live reports -->
        <div>
            <p class="text-3xl pt-5 px-4 text-stone-950 dark:text-white"><i
                    class="fa-solid fa-chart-simple mr-4 my-auto  "></i>Live reports</p>
            <div
                class="bg-red-100 dark:bg-red-300 border-t-4 border-red-800 dark:border-red-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                <div class="flex">
                    <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                    <div>
                        <p class="font-bold">
                            Recent Signups: {{ $statistics['usersToday'] }}
                        </p>
                        <p class="text-sm">
                            There has been {{ $statistics['usersToday'] }} signups in the last 24 hours.
                        </p>
                    </div>
                </div>
            </div>
            <div
                class="bg-red-100 dark:bg-red-300 border-t-4 border-red-800 dark:border-red-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                <div class="flex">
                    <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                    <div>
                        <p class="font-bold">
                            Recent Orders: {{ $statistics['ordersToday'] }}
                        </p>
                        <p class="text-sm">
                            There has been {{ $statistics['ordersToday'] }} orders placed in the last 24 hours.
                        </p>
                    </div>
                </div>
            </div>
            @forelse ($live_reports as $live_report)
                @if ($live_report->type == 'noStock')
                    <div
                        class="bg-red-100 dark:bg-red-300 border-t-4 border-red-800 dark:border-red-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                        <div class="flex">
                            <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                            <div>
                                <p class="font-bold">
                                    Out of Stock: {{ $live_report->product_name }}
                                </p>
                                <p class="text-sm">
                                    {{ $live_report->product_name }} is out of stock. Please restock.
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($live_report->type == 'lowStock')
                    <div
                        class="bg-orange-100 dark:bg-orange-300 border-t-4 border-orange-800 dark:border-orange-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                        <div class="flex">
                            <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                            <div>
                                <p class="font-bold">
                                    Stock Low: {{ $live_report->product_name }}
                                </p>
                                <p class="text-sm">
                                    {{ $live_report->product_name }} is low in stock. {{ $live_report->stock_level }}
                                    left.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div
                    class="bg-pink-100 dark:bg-pink-300 border-t-4 border-pink-800 dark:border-pink-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                No Products low on stock!
                            </p>
                            <p class="text-sm">
                                There are no products low on stock at this time.
                            </p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!--</div> -->
    </div>
</body>


</html>
