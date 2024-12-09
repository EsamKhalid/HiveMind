<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header></header>
        @include('layouts.navbar')

        <main>
            <div class="flex justify-center m-4">
                <div class="inline-block">
                    <p class="text-6xl">Basket</p>
                    @if(count($basketItems) === 0)
                    <p>no items in basket</p>
                    @else
                    <div class="inline-block">
                        @foreach($basketItems as $basketItem)
                        <div class="bg-amber">
                            <p>{{ $basketItem->product_name }}</p>
                            <p>Price: {{$basketItem->price}}</p>
                            <p>quantity: {{$basketItem->quantity}}</p>
                            <form
                                action="{{ route('basket.updateQuantity') }}"
                                method="post"
                            >
                                @csrf
                                <input type="text" name="quantity" required />
                                <input
                                    type="hidden"
                                    name="product_id"
                                    value="{{ $basketItem->product_id }}"
                                />
                                <br />
                                <button type="submit">Update quantity</button>
                                <br />
                            </form>
                            <form
                                action="{{ route('basket.remove') }}"
                                method="post"
                            >
                                @csrf
                                <input
                                    type="hidden"
                                    name="product_id"
                                    value="{{ $basketItem->product_id }}"
                                />
                                <button type="submit">remove</button>
                            </form>
                        </div>
                        <br />
                        @endforeach @endif
                    </div>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
