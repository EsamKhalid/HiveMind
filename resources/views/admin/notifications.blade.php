<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Notifications</title>
</head>

<body class="bg-white dark:bg-stone-950 flex">
@include('layouts.sidebar')

    <div class=" mx-auto mb-auto flex-col w-[80%] mt-[4%]">
        <p class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md"> <i class="fa-solid fa-inbox text-7xl mr-4 my-auto"></i>Notifications</p>
   
        <!-- notifications -->
        <div>
            @forelse ( $notifications as $notification )
            @if($notification->type == 'userCreated')
            <div class="bg-purple-100 dark:bg-purple-100 border-t-4 border-indigo-400 dark:border-indigo-400 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                <div class="flex">
                    <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                    <div>
                        <p class="font-bold">
                            New User Registered
                        </p>
                        <p class="text-sm">
                            {{ $notification->first_name }} {{ $notification->last_name }} has signed up to HiveMind. ({{ $notification->time }}).
                        </p>
                    </div>
                </div>
            </div>
            @elseif($notification->type == 'userOrder')
            <div class="bg-green-100 dark:bg-green-100 border-t-4 border-emerald-800 dark:border-emerald-700 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
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
            @elseif($notification->type == 'guestOrder')
                <div class="bg-green-100 dark:bg-green-100 border-t-4 border-emerald-800 dark:border-emerald-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                New Order Placed 
                            </p>
                            <p class="text-sm">
                                New Order for @foreach ($notification->orderItems as $order_item) {{ $order_item->quantity }}x {{ $order_item->products->product_name }}, @endforeach for guest {{ $notification->first_name }} {{ $notification->last_name }} worth £{{ $notification->total_amount }} has been placed. ({{ $notification->time }}).
                            </p>
                        </div>
                    </div>
                </div>
            @elseif($notification->type == 'stockOrder')
            <div class="bg-yellow-100 dark:bg-yellow-100 border-t-4 border-yellow-800 dark:border-yellow-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
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
            @elseif($notification->type == 'userOrderUpdate')
            <div class="bg-blue-100 dark:bg-blue-100 border-t-4 border-blue-800 dark:border-blue-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
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
            @elseif($notification->type == 'guestOrderUpdate')
                <div class="bg-blue-100 dark:bg-blue-100 border-t-4 border-blue-800 dark:border-blue-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
                    <div class="flex">
                        <i class="fa-solid fa-warehouse text-2xl mr-4 my-auto"></i>
                        <div>
                            <p class="font-bold">
                                Order Status Updated
                            </p>
                            <p class="text-sm">
                                Order Status for @foreach ($notification->orderItems as $order_item) {{ $order_item->quantity }}x {{ $order_item->products->product_name }}, @endforeach for guest {{ $notification->first_name }} {{ $notification->last_name }} has been updated to {{ $notification->order_status }}. ({{ $notification->time }}).
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            @empty
            <div class="bg-pink-100 dark:bg-pink-100 border-t-4 border-pink-800 dark:border-pink-800 rounded-b text-gray-800 dark:text-gray-800 px-4 py-3 shadow-md my-5 mx-5">
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
    </div>
</body>


</html>