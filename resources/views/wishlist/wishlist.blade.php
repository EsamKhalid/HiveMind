<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wishlist</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    @include('layouts.navbar')

    <header class="bg-gradient-to- pt-4 pb-8 shadow-md border">
        <a href="{{ route('account') }}" class="fas fa-arrow-left fa-2x pl-4"></a>
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold">Wishlist</h1>
            <p class="text-lg mt-2 text-gray-600">
                Here are your saved products.
            </p>
        </div>
    </header>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session("success") }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ session("error") }}
        </div>
    @endif

    <main>
        <div
            class="justify-between h-[90%] w-full mt-5 xl:w-1/3 xl:mt-0 transition-all duration-1000 flex flex-col ml-4">
            @if(count($wishlistItems) === 0)
                <div class="flex justify-center items-center h-full">
                    <div class="py-2 px-4 bg-white text-grey-800 rounded-lg shadow-md h-fit text-center w-[400px] m-5">
                        No items in wishlist
                    </div>
                </div>
            @else
                <div class="overflow-y-auto overflow-x-hidden h-[630px] mb-4 rounded-lg transition-all duration-1000">
                    <ul class="h-full">
                        @foreach($wishlistItems as $wishlistItem)
                            <div class="bg-white mx-2 rounded-lg flex justify-between text-center items-center p-2 mb-2 w-full">
                                <img class="size-[125px] min-w-[125px] rounded"
                                    src="{{ asset('Images/product images/' . $wishlistItem->product_name . '.png') }}" />
                                <p class="text-base xl:text-lg text-center h-fit">{{$wishlistItem->product_name}}</p>
                                <div class="flex justify-center items-center p-2">

                                    <form action="{{ route('basket.add') }}" method="post" class="ml-4">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $wishlistItem->product_id }}" />
                                        <button class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber"
                                            type="submit">Add to Basket</button>
                                    </form>
                                    <form action="{{ route('wishlist.remove') }}" method="post" class="ml-4">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $wishlistItem->product_id }}" />
                                        <button class="py-2 a px-4 bg-white text-grey-800 rounded-lg shadow-md hover:text-amber"
                                            type="submit">Remove</button>
                                    </form>

                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
                <div class="flex flex-col items-center w-full">
                    <div class="flex justify-center mt-auto w-full">
                        <button type="Checkout"
                            class="bg-yellow-400 text-white mt-5 py-4 px-8 rounded-lg shadow-lg hover:underline dark:bg-stone-900 dark:hover:text-amber w-1/3 font-bold">
                            @csrf
                            <a href="{{ route('wishlist.add') }}">Add to Bsket</a>
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </main>

    @include('layouts.footer')
</body>

</html>