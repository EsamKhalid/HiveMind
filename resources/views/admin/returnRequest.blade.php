<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Return Request - Admin</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-stone-200 min-h-screen dark:bg-stone-950">
        @include('layouts.sidebar')
        <header class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">Return Requests</h1>
                <p class="text-lg mt-2  text-stone-800 dark:text-yellow-200 transition-colours duration-1000">Manage all product return requests.</p>
            </div>
        </header>
        <a
            href="{{ route('admin.adminOrder') }}"
            class="fas fa-arrow-left fa-2x pl-4 pt-2"
        ></a>

        <div
            class="xl:w-[50%] lg:w-[70%] max-w-full mx-auto p-6 bg-white shadow-md rounded-lg mt-2 mb-12"
        >
            <h1 class="text-3xl font-bold mb-4">
                Return Request for Order #{{ $order->id }}
            </h1>
            <p class="text-gray-600">Review and process this return request.</p>

            <div class="mt-4 p-4 border rounded bg-gray-50">
                <h2 class="text-xl font-semibold mb-2">Order Details</h2>
                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                @if($order->user != null)
                <p>
                    <strong>User Email:</strong>
                    {{ $order->user->email_address }}
                </p>
                @else
                <p>
                    <strong>User Email:</strong>
                    {{ $order->guest->email_address }}
                </p>
                @endif
                <p><strong>Order Status:</strong> {{ $order->order_status }}</p>
                <p>
                    <strong>Order Date:</strong>
                    {{ $order->created_at->format('d M Y') }}
                </p>
            </div>

            <div class="mt-6 p-4 border rounded bg-gray-50">
                <h2 class="text-xl font-semibold mb-2">
                    Return Request Details
                </h2>
                <p>
                    <strong>Requested On:</strong>
                    {{ $returnRequest->created_at->format('d M Y') }}
                </p>
                <p>
                    <strong>Return Status:</strong>
                    {{ $returnRequest->return_status }}
                </p>
                <p>
                    <strong>Return Reason:</strong> {{ $returnRequest->reason }}
                </p>
                <p>
                    <strong>Comments:</strong>
                    {{ $returnRequest->comments ?? 'No comments provided' }}
                </p>
            </div>

            <div class="mt-6 p-4 border rounded bg-gray-50">
                <h2 class="text-xl font-semibold mb-2">Items to be Returned</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border p-2">Item</th>
                            <th class="border p-2">Quantity</th>
                            <th class="border p-2">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($returnRequest->returnItems as $returnItem)
                        <tr>
                            <td class="border p-2">
                                <a
                                    href="{{ route('products.show', $returnItem->orderItem->products->id) }}"
                                    class="underline"
                                >
                                    {{ $returnItem->orderItem->products->product_name }}
                                </a>
                            </td>
                            <td class="border p-2">
                                {{ $returnItem->orderItem->quantity }}
                            </td>
                            <td class="border p-2">
                                £{{ number_format($returnItem->orderItem->products->price * $returnItem->orderItem->quantity, 2) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex space-x-4">
                <form
                    action="{{ route('admin.return.approve', $returnRequest->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to approve this request?');"
                >
                    @csrf @method('PUT')
                    <button
                        type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                    >
                        Approve Return
                    </button>
                </form>

                <form
                    action="{{ route('admin.return.deny', $returnRequest->id) }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to deny this request?');"
                >
                    @csrf @method('PUT')
                    <button
                        type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    >
                        Deny Return
                    </button>
                </form>
            </div>
        </div>
    </body>
</html>
