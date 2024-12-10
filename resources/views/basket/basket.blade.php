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
                                <form action="{{ route('basket.updateQuantity') }}" method="post">
                                    @csrf
                                    <input type="text" name="quantity" required />
                                    <input type="hidden" name="product_id" value="{{ $basketItem->product_id }}" />
                                    <br />
                                    <button type="submit">Update quantity</button>
                                    <br />
                                </form>
                                <form action="{{ route('basket.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $basketItem->product_id }}" />
                                    <button type="submit">remove</button>
                                </form>
                            </div>
                            <br />
                        @endforeach @endif
                </div>
            </div>
        </div>


        <!--- CHECKOUT BUTTON - LAST MINUTE CODE SO I JUST TOOK THE SIGNUP BUTTON  -->

        <button type="Checkout"
            class="w-full py-2 px-4 bg-yellow-400 text-white rounded-lg shadow-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-blue-500">

            @csrf
            

            <a href="{{ route('checkout.view') }}" class="bg-ghost-white rounded-lg text-4xl p-1 h-fit w-full m-4">Checkout</a>

            
        </button>
    </main>

    @include('layouts.footer')
</body>

</html>