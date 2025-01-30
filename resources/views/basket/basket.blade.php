<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex flex-col min-h-screen">
        @include('layouts.navbar')

        <main>
            <div class="flex m-4">
                <div class="w-full">
                    <p class="text-6xl">Basket</p>
                    <div class="flex border w-full bg-red-50">
                        <div class="bg-white w-full"></div>
                        <div class="bg-amber w-[40%] min-w-fit justify-between">
                            @if(count($basketItems) === 0)
                            <p>no Items in basket</p>
                            @else
                            <ul>
                                @foreach($basketItems as $basketItem)
                                <div
                                    class="bg-white mt-2 mx-2 rounded flex justify-between text-center items-center p-2"
                                >
                                    <img
                                        class="size-[125px] rounded"
                                        src="{{
                                            asset('../Images/placeholder.avif')
                                        }}"
                                    />

                                    <p class="text-2xl text-cente h-fit">
                                        {{$basketItem->product_name}}
                                    </p>

                                    <div class="flex">
                                        <form
                                            action="{{
                                                route('basket.decreaseQuantity')
                                            }}"
                                            method="post"
                                            class="flex"
                                        >
                                            @csrf
                                            <input
                                                type="hidden"
                                                name="product_id"
                                                value="{{ $basketItem->product_id }}"
                                            />

                                            <button
                                                class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber h-fit"
                                                type="submit"
                                            >
                                                -
                                            </button>
                                        </form>
                                        <p class="m-4 h-fit mt-3">
                                            {{$basketItem->quantity}}
                                        </p>

                                        <form
                                            action="{{
                                                route('basket.increaseQuantity')
                                            }}"
                                            method="post"
                                            class="flex"
                                        >
                                            @csrf
                                            <input
                                                type="hidden"
                                                name="product_id"
                                                value="{{ $basketItem->product_id }}"
                                            />

                                            <button
                                                class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber h-fit"
                                                type="submit"
                                            >
                                                +
                                            </button>
                                        </form>
                                    </div>
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
                                        <button
                                            class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber"
                                            type="submit"
                                        >
                                            remove
                                        </button>
                                    </form>
                                </div>

                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <h2>Total Price: {{$basket->total_amount}}</h2>
                        <a></a>

                        @if(count($basketItems) === 0)
                        <p></p>
                        @else
                        <button
                            type="Checkout"
                            class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            @csrf
                            <a href="{{ route('checkout.view') }}">Checkout</a>
                        </button>
                        @endif
                    </div>
                </div>
            </div>

            <!--- CHECKOUT BUTTON - LAST MINUTE CODE SO I JUST TOOK THE SIGNUP BUTTON  -->
        </main>
        @include('layouts.footer')
    </body>
</html>
