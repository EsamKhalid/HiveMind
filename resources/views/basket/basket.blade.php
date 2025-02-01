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
                    <div class="flex border w-full justify-center min-w-fit">
                        <div class="bg-white min-w-[20%] px-5">
                            <form
                                action="{{ route('checkout.saveAddress') }}"
                                method="post"
                                class="space-y-4"
                            >
                                @csrf
                                <div>
                                    <label
                                        for="street_address"
                                        class="block text-sm font-medium text-gray-700"
                                        >Street Address</label
                                    >
                                    <input
                                        type="text"
                                        name="street_address"
                                        id="street_address"
                                        required
                                        class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                    />
                                </div>
                                <div>
                                    <label
                                        for="city"
                                        class="block text-sm font-medium text-gray-700"
                                        >City</label
                                    >
                                    <input
                                        type="text"
                                        name="city"
                                        id="city"
                                        required
                                        class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                    />
                                </div>
                                <div>
                                    <label
                                        for="county"
                                        class="block text-sm font-medium text-gray-700"
                                        >County</label
                                    >
                                    <input
                                        type="text"
                                        name="county"
                                        id="county"
                                        required
                                        class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                    />
                                </div>
                                <div>
                                    <label
                                        for="country"
                                        class="block text-sm font-medium text-gray-700"
                                        >Country</label
                                    >
                                    <input
                                        type="text"
                                        name="country"
                                        id="country"
                                        required
                                        class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                    />
                                </div>
                                <div>
                                    <label
                                        for="post_code"
                                        class="block text-sm font-medium text-gray-700"
                                        >Post Code</label
                                    >
                                    <input
                                        type="text"
                                        name="post_code"
                                        id="post_code"
                                        required
                                        class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                    />
                                </div>
                                <input
                                    type="hidden"
                                    name="type"
                                    value="shipping"
                                />
                                <div>
                                    <button
                                        type="submit"
                                        class="w-full bg-amber text-white py-2 px-4 rounded-md hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber"
                                    >
                                        Save Address
                                    </button>
                                </div>
                                <!-- <div>
                                    <button
                                        type="submit"
                                        class="w-full bg-amber text-white py-2 px-4 rounded-md hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber"
                                    >
                                        Go To Confirmation
                                    </button>
                                </div> -->
                            </form>
                        </div>
                        <div class="bg-amber min-w-fit justify-between">
                            @if(count($basketItems) === 0)

                            <div
                                class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md h-fit text-center w-[400px] m-5"
                            >
                                No items in basket
                            </div>
                            @else
                            <ul>
                                @foreach($basketItems as $basketItem)
                                <div
                                    class="bg-white mt-2 mx-2 rounded flex justify-between text-center items-center p-2 [&_*]:pr-3"
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
