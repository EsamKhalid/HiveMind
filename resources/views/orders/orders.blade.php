<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    @include('layouts.navbar') 

    <header class="bg-gradient-to- py-8 shadow-md">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold">My Orders</h1>
            <p class="text-lg mt-2 text-gray-600">Here are your recent purchases.</p>
        </div>
    </header>
    
    <!--  // the actual code, object based 
    <section class="max-w-7xl mx-auto p-6">
        @if ($orders->isEmpty())
            <div class="text-center mt-10">
                <p class="text-gray-600 text-lg">You have no orders yet.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($orders as $order)
                    <div class="bg-white shadow-lg rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg">
                        <div class="mb-4">
                            <h3 class="text-2xl font-bold text-blue-600">Product: {{ $order['product_name'] }}</h3>
                        </div>
                        <div class="text-gray-700">
                            <p class="mb-2"><strong>Order ID:</strong> {{ $order->order_id }}</p>
                            <p class="mb-2"><strong>Description:</strong> {{ $order->description }}</p>
                            <p class="mb-2"><strong>Price:</strong> £{{ number_format($order->price, 2) }}</p>
                            <p class="mb-2"><strong>Order Date:</strong> {{ $order->order_date }}</p>
                            <p class="mb-2"><strong>Status:</strong> <span class="px-2 py-1 rounded-full bg-green-100 text-green-700">{{ $order->order_status }}</span></p>
                            <p class="mb-2"><strong>Total Amount:</strong> £{{ number_format($order->total_amount, 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section> -->
    
    
    <section class="max-w-7xl mx-auto p-6">
        @if (empty($orders))
            <div class="text-center mt-10">
                <p class="text-gray-600 text-lg">You have no orders yet.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($orders as $order)
                    <div class="bg-white shadow-md rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg">
                        <div class="mb-4">
                            <h3 class="text-2xl font-bold text-blue-600">Product: {{ $order['product_name'] }}</h3>
                        </div>
                        <div class="text-gray-700">
                            <p class="mb-2"><strong>Order ID:</strong> {{ $order['order_id'] }}</p>
                            <p class="mb-2"><strong>Description:</strong> {{ $order['description'] }}</p>
                            <p class="mb-2"><strong>Price:</strong> £{{ number_format($order['price'], 2) }}</p>
                            <p class="mb-2"><strong>Order Date:</strong> {{ $order['order_date'] }}</p>
                            <p class="mb-2"><strong>Status:</strong> <span class="px-2 py-1 rounded-full bg-green-100 text-green-700">{{ $order['order_status'] }}</span></p>
                            <p class="mb-2"><strong>Total Amount:</strong> £{{ number_format($order['total_amount'], 2) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif       
    </section> 
</body>
</html>
