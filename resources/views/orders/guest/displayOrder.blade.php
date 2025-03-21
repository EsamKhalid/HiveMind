<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Your account</title>
    </head>
    <body class="bg-stone-100 dark:bg-stone-950 min-h-screen transition-colours duration-1000">
        @include('layouts.navbar')
        <div class="flex justify-center">
            @if($errors->any())
            <h4 class="text-3xl">{{$errors->first()}}</h4>
            @endif
        </div>
        <header class="bg-stone-200 dark:bg-stone-900 pt-4 pb-8 shadow-md dark:shadow-sm dark:shadow-stone-800 transition-colours duration-1000">
            <a
                href="{{ url()->previous()}}"
                class="fas fa-arrow-left fa-2x pl-4 dark:text-amber"
            ></a>
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">My Orders</h1>
                <p class="text-lg mt-2  text-stone-800 dark:text-yellow-200 transition-colours duration-1000">
                    Here are your recent purchases.
                </p>
            </div>
        </header>
        <main class="flex justify-center items-center max-h-screen">
            <div class="bg-stone-200 dark:bg-stone-800 shadow-md rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg text-stone-950 dark:text-yellow-200">

                        <div>
                            <p class="mb-2">
                                <strong>Confirmation Number: </strong>
                                {{ $order->confirmation_number }}
                            </p>
                            <p class="mb-2">
                                <strong>Order Date:</strong>
                                {{ $order->order_date }}
                            </p>
                            <p class="mb-2">
                                <strong>Status:</strong>
                                <!-- <span
                                    class="px-2 py-1 rounded-full
                                    {{ $order->order_status === 'Delivered' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $order->order_status }}
                                </span> -->
                                <span class="px-2 py-1 rounded-full 
                                    @if ($order->order_status === 'Delivered' || $order->order_status === 'Return Approved') 
                                        bg-green-100 text-green-700 
                                    @elseif ($order->order_status === 'Shipped') 
                                        bg-blue-100 text-blue-700 
                                    @elseif ($order->order_status === 'Processing')
                                        bg-cyan-100 text-cyan-700     
                                    @elseif ($order->order_status === 'Return Requested') 
                                        bg-orange-100 text-orange-700 
                                    @elseif ($order->order_status === 'Return Denied') 
                                        bg-red-100 text-red-700 
                                    @else 
                                        bg-yellow-100 text-yellow-700
                                    @endif">
                                        {{ $order->order_status }}
                                </span>

                            </p>
                            <p class="mb-2">
                                <strong>Total Amount:</strong>
                                £{{ number_format($order->total_amount, 2) }}
                            </p>

                            <h4 class="text-xl font-semibold mt-4 mb-2">
                                Order Items:
                            </h4>
                            <ul>
                                @foreach ($order->orderItems as $item)
                                <li class="mb-2">

                                    <a href="{{ route('products.show', $item->products->id) }}" class="hover:underline font-semibold">
                                        {{ $item->products->product_name }}
                                    </a>
                                    @if ($item->returnItem && $item->order->order_status === 'Return Approved')
                                        <span class="bg-stone-100 text-green-600 ml-1 p-1 rounded font-bold"> (Returned)</span>
                                    @endif
                                    <br/>
                                    <!--Description: {{ $item->products->description }}<br/>-->
                                    Quantity: {{ $item->quantity }}<br/>

                                    Price: £{{ number_format($item->products->price, 2) }}
                                    <br />
                                    <br />
                                    <a
                                        class="rounded text-stone-950 dark:text-white bg-cyan-500 hover:underline p-1"
                                        href="{{
                                            route('review.productReview', $item->products->id)
                                        }}"
                                        >Review</a
                                    >
                                </li>
                                @endforeach
                            </ul>
                            @if ($order->order_status === 'Delivered')

                                <a href="{{ route('orders.return', $order->id) }}" 
                                    class="bg-blue-400 text-white px-4 py-2 mt-4 mr-[50%] rounded block text-center hover:bg-blue-500 transition-colors">
                                    Return Items
                                </a>
                            @elseif ($order->order_status === 'Return Requested')
                                <form action="{{ route('orders.cancelReturn', $order->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to cancel the return request?');">
                                    @csrf
                                    <button type="submit" 
                                        class="bg-red-500 text-white px-4 py-2 mt-4 rounded hover:bg-red-600 transition-colors">
                                        Cancel Return
                                    </button>
                                </form>
                            @elseif ($order->order_status === 'Return Approved')
                            @elseif ($order->order_status === 'Return Denied')
                                <p class="bg-stone-100 text-red-400 mt-4 p-2 rounded font-semibold">Please contact customer support if unsatisfied with the return request outcome (+353-123-4567, admin@hivemind.com).</p>

                            @else
                            <button
                                class="bg-stone-400 text-white px-4 py-2 mt-4 rounded cursor-not-allowed"
                                title="Cannot request return until order is delivered"
                                disabled
                            >
                                Return Items
                            </button>
                            @endif @if (in_array($order->order_status,
                            ['Pending', 'Processing']))
                            <form
                                action="{{ route('orders.cancel', $order->id) }}"
                                method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Are you sure you want to cancel this order? This action cannot be undone.');"
                            >
                                @csrf @method('DELETE')
                                <button
                                    type="submit"
                                    class="bg-red-500 text-white px-4 py-2 mt-2 rounded hover:bg-red-600 transition-colors"
                                >
                                    Cancel Order
                                </button>

                            @endif
                            @if (in_array($order->order_status, ['pending', 'Processing', 'Shipped']))
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to cancel this order? This action cannot be undone and a small fee may still be charged.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="bg-red-500 text-white px-4 py-2 mt-2 rounded hover:bg-red-600 transition-colors">
                                        Cancel Order
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
