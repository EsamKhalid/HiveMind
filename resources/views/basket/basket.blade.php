<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header></header>
    @include('layouts.navbar')

    <main>

        <div class="flex m-4">
            <div class="w-[80%]">
                <p class="text-6xl">Basket</p>
                @if(count($basketItems) === 0)
                    <p>no items in basket</p>
                @else
                    <ul
                        class="bg-yellow-50 text-3xl text-grey-300 rounded-lg ml-5 mt-10 mr-5 mb-10 flex-wrap min-w[160px]  md:p-10 lg:relative]">
                        @foreach($basketItems as $basketItem)
                            <li class="bg-yellow-200 rounded-2xl mb-10 p-10 flex justify-between items-center xs:p-0 w-[100%]">
                                <div class="flex justify-between">
                                    <img src="https://via.placeholder.com/130" />
                                    <span class="item-img-text-link text-wrap ml-3 max-w-[50%] my-auto mx-[10%]">
                                        <p class="text-2xl font-bold leading-6 w-[100%]">{{ $basketItem->product_name }}</p>
                                        <p class="text-2xl leading-8 w-[100%]">Price: {{$basketItem->price}}</p>
                                        <p class="text-2xl leading-8 w-[100%]">Quantity: {{$basketItem->quantity}}</p>
                                    </span>



                                </div>
                                <div>
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
                            </li>

                        @endforeach
                @endif
                    <div class="flex justify-end">

                        <h2> Total Price: {{$basket->total_amount}} </h2>
                        <a></a>

                        @if(count($basketItems) === 0)
                            <p></p>
                        @else
                            <button type="Checkout"
                                class=" py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber focus:outline-none focus:ring-2 focus:ring-blue-500">
                                @csrf
                                <a href="{{ route('checkout.view') }}">Checkout</a>
                            </button>
                        @endif
                    </div>
            </div>

        </div>

        </div>


        <!--- CHECKOUT BUTTON - LAST MINUTE CODE SO I JUST TOOK THE SIGNUP BUTTON  -->


    </main>

    @include('layouts.footer')
</body>

</html>