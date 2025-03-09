<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My Orders</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 min-h-screen">
        @include('layouts.navbar')

        <header class="bg-gradient-to- pt-4 pb-8 shadow-md border">
            <a
                href="{{ route('account') }}"
                class="fas fa-arrow-left fa-2x pl-4"
            ></a>
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold">My Orders</h1>
                <p class="text-lg mt-2 text-gray-600">
                    Here are your recent purchases.
                </p>
            </div>
        </header>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                  {{ session('error') }}
            </div>
        @endif

        <main>
            <section class="max-w-7xl mx-auto p-6">
                @if ($orders->isEmpty())
                <div class="text-center mt-10">
                    <p class="text-gray-600 text-lg">You have no orders yet.</p>
                </div>
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($orders as $index => $order)
                    <div class="bg-white shadow-md rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg">
                        <div class="mb-4">
                            <h3 class="text-2xl font-bold text-grey-800">
                                Order #{{ $index + 1 }}
                            </h3>
                        </div>
                        <div class="text-gray-700">
                            <p class="mb-2">
                                <strong>Order ID: </strong>
                                {{ $order->id }}
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
                                    <a href="{{ route('products.show', $item->products->id) }}" class="underline font-semibold">
                                        {{ $item->products->product_name }}
                                    </a>
                                    @if ($item->returnItem && $item->order->order_status === 'Return Approved')
                                        <span class="bg-gray-100 text-green-600 ml-1 p-1 rounded font-bold"> (Returned)</span>
                                    @endif
                                    <br/>
                                    <!--Description: {{ $item->products->description }}<br/>-->
                                    Quantity: {{ $item->quantity }}<br/>
                                    Price: £{{ number_format($item->products->price, 2) }}
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
                                <p class="bg-gray-100 text-red-400 mt-4 p-2 rounded font-semibold">Please contact customer support if unsatisfied with the return request outcome (+353-123-4567, admin@hivemind.com).</p>
                            @else
                                <button class="bg-gray-400 text-white px-4 py-2 mt-4 rounded cursor-not-allowed" 
                                        title="Cannot request return until order is delivered" 
                                        disabled>
                                    Return Items
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
                    @endforeach
                </div>
                @endif
            </section>
        </main>

        @include('layouts.footer')
    </body>
</html>
