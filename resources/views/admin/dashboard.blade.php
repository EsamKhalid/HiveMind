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
                                {{ $notification->first_name }} {{ $notification->last_name }} has signed up to HiveMind. ({{ $notification->time }}).
                            </p>
                        </div>
                    </div>
                </div>
                @elseif($notification->type == 'userOrder')
                <div class="bg-green-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                New Order Placed 
                            </p>
                            <p class="text-sm">
                                New Order for @foreach ($notification->orderItems as $order_item) {{ $order_item->quantity }}x {{ $order_item->products->product_name }}, @endforeach for {{ $notification->first_name }} {{ $notification->last_name }} worth £{{ $notification->total_amount }} has been placed. ({{ $notification->time }}).
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
                                New Stock Order for {{ $notification->stock_quantity }}x {{ $notification->product_name }} has been placed. ({{ $notification->time }}).
                            </p>
                        </div>
                    </div>
                </div>
                @elseif($notification->type == 'orderUpdate')
                <div class="bg-green-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                Order Status Updated
                            </p>
                            <p class="text-sm">
                                Order Status for @foreach ($notification->orderItems as $order_item) {{ $order_item->quantity }}x {{ $order_item->products->product_name }}, @endforeach for {{ $notification->first_name }} {{ $notification->last_name }} has been updated to {{ $notification->order_status }}. ({{ $notification->time }}).
                            </p>
                        </div>
                    </div>
                </div>
                @else
                <div class="bg-green-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md my-5 mx-5">
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
                @endif
                @endforeach
                </div>

                <!-- live reports -->
                <div>
                <p class="text-3xl pt-5 px-4"><i class="fa-solid fa-chart-simple mr-4 my-auto"></i>Live reports</p>
                @foreach ( $live_reports as $live_report )
                @if($live_report->type == 'noStock')
                <div class="bg-red-100 dark:bg-green-100 border-t-4 border-green-800 dark:border-green-700 rounded-b text-green-900 dark:text-green-900 px-4 py-3 shadow-md my-5 mx-5">
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
                <div class="bg-yellow-100 dark:bg-green-100 border-t-4 border-green-800 dark:border-green-700 rounded-b text-green-900 dark:text-green-900 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                               Stock Low: {{ $live_report->product_name }}
                            </p>
                            <p class="text-sm">
                                {{ $live_report->product_name }} is low of stock. {{ $live_report->stock_level }} left.
                            </p>
                        </div>
                    </div>
                </div>
                @else
                <div class="bg-green-100 dark:bg-red-100 border-t-4 border-yellow-800 dark:border-red-700 rounded-b text-yellow-900 dark:text-red-900 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                No Live Reports
                            </p>
                            <p class="text-sm">
                                There are no live reports available at this time.
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                </div>

            <!--</div> -->
        </div>
    </body>
</html>
