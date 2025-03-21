<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wishlist</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-stone-100 dark:bg-stone-950 min-h-screen transition-colours duration-1000">
    @include('layouts.navbar')

    <header
        class="bg-stone-100 dark:bg-stone-900 pt-4 pb-8 shadow-md dark:shadow-sm dark:shadow-stone-800 transition-colours duration-1000 mb-5">
        <a href="{{ route('account') }}" class="fas fa-arrow-left fa-2x pl-4 dark:text-amber"></a>
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">
                Wishlist</h1>
            <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">
                Here are your saved products.
            </p>
        </div>
    </header>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <main class="flex justify-center p-5">
        <div class="h-[80%] mt-5 transition-all duration-1000 flex flex-col items-center p-5 w-full lg:w-[80%]">
            @if (count($wishlistItems) === 0)
                <div class="flex justify-center items-center h-full">
                    <div
                        class="py-2 px-4 bg-white text-stone-800 dark:text-yellow-200 dark:bg-stone-600 rounded-lg shadow-md h-fit text-center w-[400px] m-5">
                        <p class="">No items in wishlist</p>
                    </div>
                </div>
            @else
                <div
                    class="overflow-y-auto overflow-x-hidden h-[630px] mb-4 rounded-lg transition-all duration-1000 w-full">
                    <ul class="h-full w-full">
                        @foreach ($wishlistItems as $wishlistItem)
                            <li
                                class="bg-white rounded-lg flex bg-white text-stone-800 dark:text-amber dark:bg-stone-800 text-center items-center p-2 mb-2 w-full">
                                <div class="flex justify-start items-center p-2 w-1/3">
                                    <img class="size-[60px] min-w-[60px] md:size-[125px] lg:min-w-[125px] rounded "
                                        src="{{ asset('Images/product images/' . $wishlistItem->product_name . '.png') }}" />
                                </div>
                                <div class="flex flex-col md:flex-row w-2/3">
                                    <p class="text-base lg:text-lg text-center h-fit w-1/2 pl-5">
                                        {{ $wishlistItem->product_name }}</p>
                                    <div class="flex justify-start  items-center p-2 pl-5 w-fit">
                                        <form action="{{ route('basket.add') }}" method="post" class="ml-4">
                                            @csrf
                                            <input type="hidden" name="product_id"
                                                value="{{ $wishlistItem->product_id }}" />
                                            <button
                                                class="hidden md:block py-2 a px-4 bg-white text-grey-800 text-sm rounded-lg text-nowrap shadow-md dark:text-amber dark:bg-stone-700 dark:hover:underline hover:underline"
                                                type="submit">Add to Basket</button>
                                                <button
                                                class="block md:hidden py-2 a px-2 lg:py-1 lg:px-4 bg-white text-grey-800 text-sm rounded-lg text-nowrap shadow-md dark:text-amber dark:bg-stone-700 dark:hover:underline hover:underline"
                                                type="submit"><i class="fa-solid fa-shopping-basket fa-sm"></i></button>
                                        </form>
                                        <form action="{{ route('wishlist.remove') }}" method="post" class="ml-4">
                                            @csrf
                                            <input type="hidden" name="product_id"
                                                value="{{ $wishlistItem->product_id }}" />
                                            <button
                                                class="hidden md:block py-2 a px-4 bg-white text-grey-800 text-sm rounded-lg shadow-md dark:text-amber dark:bg-stone-700 dark:hover:underline hover:underline"
                                                type="submit">Remove</button>
                                                <button
                                                class="block md:hidden py-2 a px-4 bg-white text-grey-800 text-sm rounded-lg shadow-md dark:text-amber dark:bg-stone-700 dark:hover:underline hover:underline"
                                                type="submit"><i class="fa-solid fa-x "></i></button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex justify-center mt-4 w-full">
                    <button type="Checkout"
                        class="bg-yellow-400 text-white mt-5 py-4 px-8 rounded-lg shadow-lg hover:underline dark:bg-stone-900 dark:hover:text-amber dark:text-amber w-fit font-bold sm:text-sm">
                        @csrf
                        <a href="{{ route('wishlist.add') }}">Add to Basket</a>
                    </button>
                </div>
            @endif
        </div>
    </main>

    @include('layouts.footer')
</body>

</html>
