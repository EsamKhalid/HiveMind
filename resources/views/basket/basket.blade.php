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
        function hideCheckoutButton(){
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

<body class="dark:bg-stone-950 transition-colors duration-1000 flex flex-col min-h-screen">
    @include('layouts.navbar')

    <main>
        <div class="flex justify-center m-4">
            <div class="card bg-yellow-50 dark:bg-stone-700 p-8 rounded-lg shadow-md text-center w-[80%] transition-colors duration-1000">
                <h1 class="text-6xl mb-6 dark:text-amber transition-colors duration-1000">Basket</h1>

                @if($errors->any())
                    <h4 class="text-3xl text-red-600">{{$errors->first()}}</h4>
                @endif

                <!--Main content container-->
                <div class="flex justify-between transition-all duration-1000 flex-col-reverse xl:flex-row">
                    <!--Address Form-->
                    <div class="bg-white p-5 rounded-lg w-full xl:w-1/4 hidden xl:flex xl:flex-col justify-between">
                        @include('layouts.addressForm')
                        <!--Address Form Total+Checkout Button-->

                    </div>
                    @if(count($basketItems) > 0)
                    <div class="xl:hidden justify-center w-[80%] rounded-lg mx-auto fixed left-0 right-0 bottom-0 bg-transparent z-10 h-fit mt-[10%] -mb-3">
                    <input type="checkbox" id="drawer-toggle" class="relative sr-only peer opacity-0"
                            onclick="hideCheckoutButton()" />
                        <label for="drawer-toggle"
                            class="z-10 flex flex-col absolute top-0 right-0 left-0 p-4 transition-[transform_300ms, colors_1s] ease-in-out bg-amber dark:bg-stone-90 rounded-lg peer-checked:top-[80%]">
                            <i class="fa-solid fa-chevron-up"></i>
                        </label>

                    <div id="checkoutbuttonbox"
                        class="pt-6 max-h-[80%] flex-col xl:hidden items-center bg-yellow-200 dark:bg-stone-800 peer-checked:peer-checked:translate-y-[100%] transition-[transform_300ms, color_1s] ease-in-out">
                        
                        <div
                            class="mobileViewAddressLine hidden xl:hidden justify-center mt-3 transition-[transform_300ms, colors_1s] ease-in-out ">
                        </div>
                       
                        <h3 class=" text-black dark:text-white ">Delivery Address:
                            <p class="text-black dark:text-white justify-center flex transition-colors duration-1000">{{$address->street_address}}</p>
                        </h3>
                        <div class=" mobileViewAddressLine hidden flex-col xl:hidden">

                        @include('layouts.addressForm')

                        </div>
                        <div class="flex justify-center">
                            <a onclick="toggleMobileAddressBox()" id="show-hide"
                                class="text-black bg-stone-500 hover:text-white cursor-pointer p-1 rounded-md m-2 transition-colors duration-1000">Show
                                Details</a>
                        </div>

                        <h2
                            class="text-xl text-center mb-2 p-2 mt-3 mx-auto bg-white text-grey-800 rounded shadow-md w-1/2">
                            Subtotal: £{{$basket->total_amount}}
                        </h2>
                        <div class="flex justify-center mt-auto w-full">
                            <button type="Checkout"
                                class="bg-amber text-black hover:text-white my-3 py-2 px-8 rounded-lg shadow-lg hover:underlinehover:text-white w-[80%] font-bold transition-colors duration-1000">
                                @csrf
                                <a href="{{ route('checkout.checkout') }}">Checkout</a>
                            </button>
                        </div>
                    </div>
                    </div>
                    @endif
                    <!--BASKET ITEMS-->
                    <div
                        class="justify-between h-[90%] w-full mt-5 xl:w-3/4 xl:mt-0 transition-all duration-1000 flex flex-col ">
                        @if(count($basketItems) === 0)
                            <div
                                class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md h-fit text-center w-full xl:w-[98%] ml-0 xl:ml-4">
                                No items in basket
                            </div>
                        @else
                            <div
                                class="overflow-y-auto overflow-x-hidden h-[630px] mb-4 rounded-lg transition-all duration-1000">
                                <ul class="h-full mb-6">
                                    @foreach($basketItems as $basketItem)
                                        <div
                                            class="bg-white mx-2 rounded-lg flex justify-between text-center items-center p-2 mb-2 w-full">
                                            <div class="flex">
                                            <img class="size-[125px] min-w-[125px] rounded mr-6"
                                                src="{{ asset('Images/product images/' . $basketItem->product_name . '.png') }}" />
                                           
                                            <div class="flex flex-col flex-shrink">
                                            <p class="text-base xl:text-lg text-center h-fit my-auto text-nowrap">{{$basketItem->product_name}}</p>
                                            <!--Quantity Controllers -->
                                            <div class="flex">
                                            <form action="{{ route('basket.decreaseQuantity') }}" method="post"
                                                    >
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $basketItem->product_id }}" />
                                                    <button
                                                        class="py-1 px-3 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber h-fit"
                                                        type="submit"><i class="fa-solid fa-minus text-sm"></i></button>
                                                </form>
                                                <p class="m-3 h-fit mt-1 text-sm">{{$basketItem->quantity}}</p>
                                                <!-- increase button -->
                                                <form action="{{ route('basket.increaseQuantity') }}" method="post"
                                                    class="flex">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $basketItem->product_id }}" />
                                                    <button
                                                        class="py-1 px-3 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber h-fit"
                                                        type="submit"><i class="fa-solid fa-plus text-sm"></i></button>
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
                                                        class="py-1 a px-3 mr-5 bg-white text-red-500 rounded-lg shadow-md hover:text-red-800"
                                                        type="submit"><i class="fa-solid fa-trash-can text-base"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                            <!--BASKET Total + Checkout Button-->
                            <div class="hidden xl:flex xl:flex-col justify-center items-center w-full">
                                <h2
                                    class="text-2xl text-center mb-2 p-2 mt-5 mx-3 bg-white text-grey-800 rounded shadow-md w-1/2">
                                    Subtotal: £{{$basket->total_amount}}
                                </h2>
                                <div class="flex justify-center mt-auto w-full">
                                    <button type="Checkout"
                                        class="bg-yellow-400 text-white mt-5 py-4 px-8 rounded-lg shadow-lg hover:underline dark:bg-stone-900 dark:hover:text-amber w-1/3 font-bold transition-colors duration-1000">
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
    <div class="hidden xl:block">
        @include('layouts.footer')
    </div>
</body>

</html>