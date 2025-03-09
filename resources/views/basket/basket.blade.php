@php
    $user = Auth::user();

    if ($user) { 
        $address = \App\Models\Addresses::where('user_id', $user->id)->first();
    } else {
        $guestID = session()->get('guest_id');
        $guest = \App\Models\Guest::where('id', $guestID)->first();
        $address = \App\Models\Addresses::where('guest_id', $guestID)->first();
        }
@endphp

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
                    <div class="w-full flex justify-center">
                        @if($errors->any())
                        <h4 class="text-3xl">{{$errors->first()}}</h4>
                        @endif</div>
                    
                    <div class="flex justify-center">
                        
                        <div
                            class="flex justify-center bg-amber px-5 py-12 w-fit"
                        >

                        <div class="bg-white min-w-[450px] p-5 rounded">
                                <form
                                    action="{{
                                        route('checkout.storeGuest')
                                    }}"
                                    method="post"
                                    class="space-y-10 h-full"
                                >
                                    @csrf 
                                    @auth
                                    <div>
                                        <label
                                            for="first_name"
                                            class="block text-sm font-medium text-gray-700"
                                            >First Name</label
                                        >
                                        <input
                                            type="text"
                                            name="first_name"
                                            id="first_name"
                                            value="{{$user->first_name}}"
                                            readonly
                                            class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            for="last_name"
                                            class="block text-sm font-medium text-gray-700"
                                            >Last Name</label
                                        >
                                        <input
                                            type="text"
                                            name="last_name"
                                            id="last_name"
                                            value="{{$user->last_name}}"
                                            readonly
                                            class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            for="email_address"
                                            class="block text-sm font-medium text-gray-700"
                                            >Email Address</label
                                        >
                                        <input
                                            type="text"
                                            name="email_address"
                                            id="email_address"
                                            value="{{$user->email_address}}"
                                            readonly
                                            class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            for="phone_number"
                                            class="block text-sm font-medium text-gray-700"
                                            >Phone Number</label
                                        >
                                        <input
                                            type="text"
                                            name="phone_number"
                                            id="phone_number"
                                            value="{{$user->phone_number}}"
                                            readonly
                                            class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                        />
                                    </div>
                                    <input
                                        type="hidden"
                                        name="type"
                                        value="shipping"
                                    />
                                    <!-- <div>
                                        <button
                                            type="submit"
                                            class="w-full bg-amber text-white py-2 px-4 rounded-md hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber"
                                        >
                                            Save Address
                                        </button>
                                    </div> -->
                                    <!-- <div>
                                    <button
                                        type="submit"
                                        class="w-full bg-amber text-white py-2 px-4 rounded-md hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber"
                                    >
                                        Go To Confirmation
                                    </button>
                                </div> -->
                                </form>
                                @else
                                    <div>
                                        <label
                                            for="first_name"
                                            class="block text-sm font-medium text-gray-700"
                                            >First Name</label
                                        >
                                        <input
                                            type="text"
                                            name="first_name"
                                            id="first_name"
                                            value="{{$guest->first_name}}"
                                            required
                                            class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            for="last_name"
                                            class="block text-sm font-medium text-gray-700"
                                            >Last Name</label
                                        >
                                        <input
                                            type="text"
                                            name="last_name"
                                            id="last_name"
                                            value="{{$guest->last_name}}"
                                            required
                                            class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            for="email_address"
                                            class="block text-sm font-medium text-gray-700"
                                            >Email Address</label
                                        >
                                        <input
                                            type="text"
                                            name="email_address"
                                            id="email_address"
                                            value="{{$guest->email_address}}"
                                            required
                                            class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            for="phone_number"
                                            class="block text-sm font-medium text-gray-700"
                                            >Phone Number</label
                                        >
                                        <input
                                            type="text"
                                            name="phone_number"
                                            id="phone_number"
                                            value="{{$guest->phone_number}}"
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
                                            Save Details
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
                                @endauth
                            </div>

                            <div class="bg-white min-w-[450px] p-5 rounded">
                                <form
                                    action="{{
                                        route('checkout.storeAddress')
                                    }}"
                                    method="post"
                                    class="space-y-10 h-full"
                                >
                                    @csrf @if($address != null)
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
                                            value="{{$address->street_address}}"
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
                                            value="{{$address->city}}"
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
                                            value="{{$address->county}}"
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
                                            value="{{$address->country}}"
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
                                            value="{{$address->post_code}}"
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
                                @else
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
                                            value=""
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
                                            value=""
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
                                            value=""
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
                                            value=""
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
                                            value=""
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
                                @endif
                            </div>
                            <div class="min-w-fit justify-between h-[90%]">
                                @if(count($basketItems) === 0)

                                <div
                                    class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md h-fit text-center w-[400px] m-5"
                                >
                                    No items in basket
                                </div>
                                @else
                                <div
                                    class="overflow-y-auto h-[630px] mb-4 rounded"
                                >
                                    <ul class="h-full">
                                        @foreach($basketItems as $basketItem)
                                        <div
                                            class="bg-white mx-2 rounded flex justify-between text-center items-center p-2 [&_*]:pr-3 mb-2"
                                        >
                                            <img
                                                class="size-[125px] rounded"
                                                src="{{
                                                    asset(
                                                        '../Images/placeholder.avif'
                                                    )
                                                }}"
                                            />

                                            <p
                                                class="text-2xl text-center h-fit"
                                            >
                                                {{$basketItem->product_name}}
                                            </p>

                                            <div class="flex">
                                                <form
                                                    action="{{
                                                        route(
                                                            'basket.decreaseQuantity'
                                                        )
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
                                                        route(
                                                            'basket.increaseQuantity'
                                                        )
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
                                                action="{{
                                                    route('basket.remove')
                                                }}"
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
                                </div>
                                <div
                                    class="text-2xl text-grey-800 rounded w-full"
                                >
                                    <h2
                                        class="text-2xl text-center mb-2 p-2 mx-3 bg-white text-grey-800 rounded shadow-md"
                                    >
                                        Subtotal: {{$basket->total_amount}}
                                    </h2>
                                    <button
                                        type="Checkout"
                                        class="bg-white text-grey-800 py-2 mx-3 rounded-lg shadow-lg hover:text-amber w-full"
                                    >
                                        @csrf
                                        <a
                                            href="{{
                                                route('checkout.checkout')
                                            }}"
                                            >Checkout</a
                                        >
                                    </button>
                                </div>

                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <div
                            class="w-1/2 flex-col text-center justify-center"
                        ></div>
                    </div>
                </div>
            </div>

            <!--- CHECKOUT BUTTON - LAST MINUTE CODE SO I JUST TOOK THE SIGNUP BUTTON  -->
        </main>
        @include('layouts.footer')
    </body>
</html>