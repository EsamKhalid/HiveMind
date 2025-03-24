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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <script>
        function toggleMobileAddressBox() {
            var elements = document.getElementsByClassName('mobileViewAddressLine');
            for (let element of elements) {
                if (element.classList.contains('hidden')) {
                    element.classList.remove('hidden');
                    element.classList.add('flex');
                    document.getElementById('show-hide').innerText = 'Hide Details'
                } else {
                    element.classList.add('hidden');
                    element.classList.remove('flex');
                    document.getElementById('show-hide').innerText = 'Show Details'
                }
            }
        }
        function hideCheckoutButton() {
            var elements = document.getElementsByClassName('mobileViewAddressLine');
            for (let element of elements) {
                if (!element.classList.contains('hidden')) {
                    element.classList.add('hidden');
                    element.classList.remove('flex');
                    document.getElementById('show-hide').innerText = 'Show Details'
                }
            }
        }

    </script>
</head>

<body class="transition-none dark:bg-stone-950 transition-colors duration-1000 flex flex-col min-h-screen">
    @include('layouts.navbar')

    <main>
        <div class="flex justify-center m-4">
            
            <div
                class="card bg-yellow-50 dark:bg-stone-900 rounded-lg text-center p-5 w-[80%] transition-colors duration-1000">
                <h1 class="text-6xl mb-6 dark:text-amber transition-colors duration-1000">Basket</h1>

                @if ($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4 text-center">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            
        </div>
        @endif

         @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
            @endif

                <!--Main content container-->
                <div class="flex justify-between transition-all duration-1000 flex-col-reverse lg:flex-row">
                    <!--Address Form container-->
                    @if(count($basketItems) > 0)
                        <div
                            class="lg:hidden justify-center w-[80%] rounded-lg mx-auto fixed left-0 right-0 bottom-0 bg-transparent z-10 h-fit mt-[10%] -mb-3 ">
                            <input type="checkbox" id="drawer-toggle" class="relative sr-only peer opacity-0"
                                onclick="hideCheckoutButton()" />
                            <label for="drawer-toggle"
                                class="z-10 flex flex-col absolute top-0 right-0 left-0 p-4 transition-all ease-in-out bg-amber dark:bg-stone-90 rounded-lg peer-checked:top-[75%]">
                                <i class="fa-solid fa-chevron-up"></i>
                            </label>

                            <div id="checkoutbuttonbox"
                                class="pt-6 max-h-[80%] flex-col lg:hidden items-center bg-yellow-200 dark:bg-stone-800 peer-checked:peer-checked:translate-y-[100%] transition-all ease-in-out border-amber border-2">

                                <div
                                    class="mobileViewAddressLine hidden lg:hidden justify-center mt-3 transition-all ease-in-out ">
                                </div>


                                <h2
                                    class="text-xl text-center mb-2 p-2 mt-3 mx-auto bg-white text-grey-800 rounded shadow-md w-1/2">
                                    Subtotal: £{{$basket->total_amount}}
                                </h2>
                                <div class="flex justify-center mt-auto w-full">
                                    <button type="Checkout"
                                        class="bg-amber text-black hover:text-white my-3 py-2 px-8 rounded-lg hover:underlinehover:text-white w-[80%] font-bold transition-colors duration-1000">
                                        @csrf
                                        <a href="{{ route('checkout.view') }}">Checkout</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!--BASKET ITEMS-->
                    <div class="justify-between h-[90%] w-full mt-5 lg:mt-0 transition-all duration-1000 flex flex-col">
                        @if(count($basketItems) === 0)
                            <div
                                class="py-2 a px-4 bg-white dark:bg-yellow-500 text-grey-800 rounded-lg shadow-md h-fit text-center w-full lg:w-[98%] ml-0 lg:ml-4">
                                No items in basket
                            </div>
                        @else
                            <div class="overflow-y-auto no-scrollbar overflow-x-hidden h-[50%] mb-4 rounded-lg transition-all duration-1000 w-full">
                                <ul class="h-full mb-6 w-full">
                                    @foreach($basketItems as $basketItem)
                                        <div
                                            class="bg-white dark:bg-stone-800 mx-auto rounded-lg flex justify-between sm:justify-between text-center items-center p-2 lg:mx-3 mb-2 w-[95%] lg:w-[98%] shadow-md z-10">
                                            <div class="flex">
                                                <img class="size-16 lg:size-[100px] min-w-[50px] lg:mr-5 rounded flex-grow flex-shrink-0 "
                                                    src="{{ asset('Images/product images/' . $basketItem->id . '.png') }}" />

                                                <div class="flex flex-col flex-shrink">
                                                    <a href={{route('products.show', $basketItem->id)}} class="text-xs sm:text-sm md:text-base lg:text-lg underline text-black dark:text-white hover:text-amber dark:hover:text-white text-center h-fit my-auto ">
                                                        {{$basketItem->product_name}}</a>
                                                    <!--Quantity Controllers -->
                                                    <div class="flex mt-1 mx-auto lg:ml-0 lg:mr-5 lg:mb-3 lg:mt-0">
                                                        <form action="{{ route('basket.decreaseQuantity') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $basketItem->product_id }}" />
                                                            <button
                                                                class="px-2 bg-white text-grey-800 rounded-md shadow-md hover:text-amber h-fit"
                                                                type="submit"><i class="fa-solid fa-minus text-xs sm:text-sm md:text-base lg:text-lg"></i></button>
                                                        </form>
                                                        <p class="m-3 h-fit mt-1 text-xs sm:text-sm md:text-base lg:text-lg text-black dark:text-white">{{$basketItem->quantity}}</p>
                                                        <!-- increase button -->
                                                        <form action="{{ route('basket.increaseQuantity') }}" method="post"
                                                            class="flex">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $basketItem->product_id }}" />
                                                            <button
                                                                class="px-2 bg-white text-grey-800 rounded-md shadow-md hover:text-amber h-fit"
                                                                type="submit"><i class="fa-solid fa-plus text-xs sm:text-sm md:text-base lg:text-lg"></i></button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="flex justify-center items-center p-2">
                                                <!-- decrease button -->

                                                <!-- delete button -->
                                                <form action="{{ route('basket.remove') }}" method="post" class="ml-4">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $basketItem->product_id }}" />
                                                    <button
                                                        class="px-2 mr-0 lg:mr-5 bg-white text-red-500 rounded-lg shadow-md hover:text-red-800"
                                                        type="submit"><i class="fa-solid fa-trash-can text-xs sm:text-sm md:text-base lg:text-lg"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                            <!--BASKET Total + Checkout Button-->
                            <div class="hidden lg:flex lg:flex-col justify-center items-center w-full border-2 lg:border-none">
                                <h2
                                    class="text-2xl text-center mb-2 p-2 mt-5 mx-3 lg:mx-auto bg-white text-grey-800 rounded shadow-md w-1/2">
                                    Subtotal: £{{$basket->total_amount}}
                                </h2>
                                <div class="flex justify-center mt-auto w-full">
                                    <button type="Checkout"
                                        class="bg-amber text-black mt-5 py-4 px-8 rounded-lg text-xl hover:underline dark:bg-amber-900 dark:text-stone-950 dark:hover:text-white w-1/3 font-bold transition-colors duration-1000">
                                        @csrf
                                        <a href="{{ route('checkout.view') }}">Checkout</a>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="hidden lg:flex">
        @include('layouts.footer')
    </div>
</body>

</html>