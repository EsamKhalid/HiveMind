<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
</head>

<body class="dark:bg-stone-900 transition-all duration-1000 flex flex-col min-h-screen">
    @include('layouts.navbar')

    <main>
        <div class="flex justify-center m-4">
            <div class="card bg-yellow-50 dark:bg-stone-700 p-6 rounded-lg shadow-md text-center w-3/4">
                <h1 class="text-6xl mb-6 dark:text-amber">Basket</h1>

                @if($errors->any())
                <h4 class="text-3xl text-red-600">{{$errors->first()}}</h4>
                @endif

                <div class="flex justify-between transition-all duration-1000">
                    <div class="bg-white min-w-[450px] p-5 rounded w-1/2 flex flex-col justify-between">
                        <form action="{{ route('checkout.storeAddress') }}" method="post" class="space-y-10 h-full flex flex-col justify-between">
                            @csrf
                            @if($address != null)
                            <div class="flex flex-col items-start mb-4">
                                <label for="street_address" class="block text-gray-600 dark:text-black mb-2">Street Address</label>
                                <input type="text" name="street_address" id="street_address" value="{{$address->street_address}}" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="city" class="block text-gray-600 dark:text-black mb-2">City</label>
                                <input type="text" name="city" id="city" value="{{$address->city}}" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="county" class="block text-gray-600 dark:text-black mb-2">County</label>
                                <input type="text" name="county" id="county" value="{{$address->county}}" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="country" class="block text-gray-600 dark:text-black mb-2">Country</label>
                                <input type="text" name="country" id="country" value="{{$address->country}}" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="post_code" class="block text-gray-600 dark:text-black mb-2">Post Code</label>
                                <input type="text" name="post_code" id="post_code" value="{{$address->post_code}}" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <input type="hidden" name="type" value="shipping" />
                            <div class="flex justify-center mt-auto">
                                <button type="submit" class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:underline dark:bg-stone-900 dark:hover:text-amber">Save Address</button>
                            </div>
                            @else
                            <div class="flex flex-col items-start mb-4">
                                <label for="street_address" class="block text-gray-600 dark:text-black mb-2">Street Address</label>
                                <input type="text" name="street_address" id="street_address" value="Street Address" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="city" class="block text-gray-600 dark:text-black mb-2">City</label>
                                <input type="text" name="city" id="city" value="City" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="county" class="block text-gray-600 dark:text-black mb-2">County</label>
                                <input type="text" name="county" id="county" value="County" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="country" class="block text-gray-600 dark:text-black mb-2">Country</label>
                                <input type="text" name="country" id="country" value="Country" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="post_code" class="block text-gray-600 dark:text-black mb-2">Post Code</label>
                                <input type="text" name="post_code" id="post_code" value="Post Code" required class="w-full p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" />
                            </div>
                            <input type="hidden" name="type" value="shipping" />
                            <div class="flex justify-center mt-auto">
                                <button type="submit" class="bg-yellow-400 text-white text-xl py-4 px-8 rounded-lg shadow-lg hover:underline dark:bg-stone-900 dark:hover:text-amber w-1/3 font-bold">Save Address</button>
                            </div>
                            @endif
                        </form>
                    </div>

                    <div class="min-w-fit justify-between h-[90%] w-1/2 transition-all duration-1000 flex flex-col justify-between">
                        @if(count($basketItems) === 0)
                        <div class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md h-fit text-center w-[400px] m-5">
                            No items in basket
                        </div>
                        @else
                        <div class="overflow-y-auto h-[630px] mb-4 rounded transition-all duration-1000">
                            <ul class="h-full">
                                @foreach($basketItems as $basketItem)
                                <div class="bg-white mx-2 rounded flex justify-between text-center items-center p-2 [&_*]:pr-3 mb-2">
                                    <img class="size-[125px] rounded" src="{{ asset('Images/product images/' . $basketItem->product_name . '.png') }}"/>
                                    <p class="text-2xl text-center h-fit">{{$basketItem->product_name}}</p>
                                    <div class="flex items-center">
                                        <form action="{{ route('basket.decreaseQuantity') }}" method="post" class="flex">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $basketItem->product_id }}" />
                                            <button class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber h-fit" type="submit">-</button>
                                        </form>
                                        <p class="m-4 h-fit mt-3">{{$basketItem->quantity}}</p>
                                        <form action="{{ route('basket.increaseQuantity') }}" method="post" class="flex">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $basketItem->product_id }}" />
                                            <button class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber h-fit" type="submit">+</button>
                                        </form>
                                        <form action="{{ route('basket.remove') }}" method="post" class="ml-4">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $basketItem->product_id }}" />
                                            <button class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber" type="submit">remove</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                        <div class="flex flex-col items-center w-full">
                            <h2 class="text-2xl text-center mb-2 p-2 mt-5 mx-3 bg-white text-grey-800 rounded shadow-md w-1/2">
                                Subtotal: £{{$basket->total_amount}}
                            </h2>
                            <div class="flex justify-center mt-auto w-full">
                                <button type="Checkout" class="bg-yellow-400 text-white mt-5 py-4 px-8 rounded-lg shadow-lg hover:underline dark:bg-stone-900 dark:hover:text-amber w-1/3 font-bold">
                                    @csrf
                                    <a href="{{ route('checkout.checkout') }}">Checkout</a>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>

</html>