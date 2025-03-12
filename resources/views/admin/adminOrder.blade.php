<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin - User Orders</title>
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
                <h1 class="text-4xl font-extrabold">User Orders</h1>
                <p class="text-lg mt-2 text-gray-600">Manage all user orders and returns.</p>
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
                    <p class="text-gray-600 text-lg">No orders found.</p>
                </div>
                @else

                <div class="flex justify-center">
                    <form action="{{ route('admin.orders.processAll') }}" method="POST" onsubmit="return confirm('Are you sure you want to process all orders (excluding returns and your own orders) to the next stage?');">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-purple-500 text-white px-8 py-3 mb-8 rounded-lg hover:bg-purple-700 transition">
                            Process All Orders
                        </button>
                    </form>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($orders as $order)
                    <div class="bg-white shadow-md rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg">
                        <h3 class="mb-4 text-2xl font-bold text-grey-800">Order ID #{{ $order->id }}</h3>
                        @if ($order->user == null)
                        <p class="mb-2"><strong>Guest:</strong> {{ $order->guest->email_address }}</p>
                        @else
                        <p class="mb-2"><strong>User:</strong> {{ $order->user->email_address }}</p>
                        @endif
                        
                        <p class="mb-2"><strong>Order Date:</strong> {{ $order->order_date }}</p>
                        <p class="mb-2"><strong>Status:</strong> 
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
                        <p class="mb-2"><strong>Total Amount:</strong> £{{ number_format($order->total_amount, 2) }}</p>

                        <h4 class="text-xl font-semibold mt-4 mb-2">Order Items:</h4>
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
                                Quantity: {{ $item->quantity }}<br/>
                                Price: £{{ number_format($item->products->price, 2) }}
                            </li>
                            @endforeach
                        </ul>

                        @if($order->user != null)
                        @if ($order->user->id !== auth()->user()->id)
                            @if ($order->order_status === 'pending')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" onsubmit="return confirm('Mark this order as Processing?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Processing">
                                    <button type="submit" class="bg-cyan-500 text-white px-4 py-2 mt-4 rounded hover:bg-cyan-600">Mark as Processing</button>
                                </form>
                            @elseif ($order->order_status === 'Processing')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" onsubmit="return confirm('Mark this order as Shipped?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Shipped">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded hover:bg-blue-600">Mark as Shipped</button>
                                </form>
                            @elseif ($order->order_status === 'Shipped')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" onsubmit="return confirm('Mark this order as Delivered?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Delivered">
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4 rounded hover:bg-green-600">Mark as Delivered</button>
                                </form>
                            @elseif ($order->order_status === 'Delivered')
                                <button title="No return request available." class="bg-gray-400 text-white px-4 py-2 mt-4 rounded cursor-not-allowed" disabled>
                                    View Return Request
                                </button>
                            @elseif ($order->order_status === 'Return Requested')
                                <a href="{{ route('admin.returnRequest', $order->id) }}" class="bg-orange-400 text-white px-4 py-2 mt-4 hover:bg-orange-600 rounded block text-center">
                                    View Return Request
                                </a>
                            @endif
                        @else
                            <p class="bg-red-100 text-red-500 mt-4 p-2 rounded font-semibold">You cannot process your own order.</p>
                        @endif
                        @else
                         @if ($order->order_status === 'pending')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" onsubmit="return confirm('Mark this order as Processing?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Processing">
                                    <button type="submit" class="bg-cyan-500 text-white px-4 py-2 mt-4 rounded hover:bg-cyan-600">Mark as Processing</button>
                                </form>
                            @elseif ($order->order_status === 'Processing')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" onsubmit="return confirm('Mark this order as Shipped?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Shipped">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded hover:bg-blue-600">Mark as Shipped</button>
                                </form>
                            @elseif ($order->order_status === 'Shipped')
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" onsubmit="return confirm('Mark this order as Delivered?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Delivered">
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4 rounded hover:bg-green-600">Mark as Delivered</button>
                                </form>
                            @elseif ($order->order_status === 'Delivered')
                                <button title="No return request available." class="bg-gray-400 text-white px-4 py-2 mt-4 rounded cursor-not-allowed" disabled>
                                    View Return Request
                                </button>
                            @elseif ($order->order_status === 'Return Requested')
                                <a href="{{ route('admin.returnRequest', $order->id) }}" class="bg-orange-400 text-white px-4 py-2 mt-4 hover:bg-orange-600 rounded block text-center">
                                    View Return Request
                                </a>
                            @endif
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </section>
        </main>
        @include('layouts.footer')
    </body>
</html>
