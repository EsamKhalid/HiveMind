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

        <header class="bg-gradient-to- py-8 shadow-md border">
            <a
                href="{{ route('account') }}"
                class="fas fa-arrow-left fa-4x p-5"
            ></a>
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold">My Orders</h1>
                <p class="text-lg mt-2 text-gray-600">
                    Here are your recent purchases.
                </p>
            </div>
        </header>

        <main>
            <section class="max-w-7xl mx-auto p-6">
                @if ($orders->isEmpty())
                <div class="text-center mt-10">
                    <p class="text-gray-600 text-lg">You have no orders yet.</p>
                </div>
                @else
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                    @foreach ($orders as $order)
                    <div
                        class="bg-white shadow-md rounded-lg p-6 transition-transform hover:scale-105 hover:shadow-lg"
                    >
                        <div class="mb-4">
                            <h3 class="text-2xl font-bold text-grey-800">
                                Order #{{ $order->id }}
                            </h3>
                        </div>
                        <div class="text-gray-700">
                            <p class="mb-2">
                                <strong>Order Date:</strong>
                                {{ $order->order_date }}
                            </p>
                            <p class="mb-2">
                                <strong>Status:</strong>
                                <span
                                    class="px-2 py-1 rounded-full
                                {{ $order->order_status === 'Delivered' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}"
                                >
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
                                    <strong
                                        >{{ $item->products->product_name }}</strong
                                    ><br />
                                    Description:
                                    {{ $item->products->description




                                    }}<br />
                                    Quantity: {{ $item->quantity }}<br />
                                    Price: £{{ number_format($item->products->price, 2) }}
                                </li>
                                @endforeach
                            </ul>
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
