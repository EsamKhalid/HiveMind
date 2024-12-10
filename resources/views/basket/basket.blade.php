<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    <header></header>
    @include('layouts.navbar')
    <main class="flex-grow">
        <div class="flex justify-center m-4">
            <div class="inline-block">
                <p class="text-6xl">Basket</p>
                @if(count($basketItems) === 0)
                    <p>No items in basket</p>
                @else
                    <div class="inline-block">
                        @foreach($basketItems as $basketItem)
                            <div class="bg-amber p-4 mb-4 rounded">
                                <p>{{ $basketItem->product_name }}</p>
                                <p>Price: {{$basketItem->price}}</p>
                                <p>Quantity: {{$basketItem->quantity}}</p>
                                <form action="{{ route('basket.updateQuantity') }}" method="post" class="mb-2">
                                    @csrf
                                    <input type="number" name="quantity" required class="border p-1 rounded" />
                                    <input type="hidden" name="product_id" value="{{ $basketItem->product_id }}" />
                                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Update Quantity</button>
                                </form>
                                <form action="{{ route('basket.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $basketItem->product_id }}" />
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Remove</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </main>
    @include('layouts.footer')
</body>
</html>