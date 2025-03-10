<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $product->product_name }} 🐝</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
    </head>
    <body class="bg-yellow-50 dark:bg-stone-950">
        @include('layouts.navbar')
        <a
            href="{{ route('products')  }}"
            class="fas fa-arrow-left fa-3x p-5 absolute top-16 left-0 dark:text-amber"
        ></a>
        <div class="flex justify-center">
            <div class=" flex justify-center mt-[10%] flex-col lg:flex-row px-5 pb-7 pt-5 dark:bg-stone-800 rounded-lg">
                <div class="flex justify-center pr-5">
                    <img
                        id="product-image"
                        class="w-[400px] h-[400px] lg:w-[500px] lg:h-[500px] size-full hover:scale-105 transition-all duration-500 dark:brightness-[80%] dark:hover:brightness-90 rounded-lg" 
                        src="{{ asset('Images/product images/' . $product->product_name . '.png') }}"
                    />
                </div>
                <div class="inline-block justify-center size-[35vh] mt-10 text-stone-800 dark:text-yellow-200">
                    <div class="flex justify-left">
                        <h1 class="text-5xl text-left pb-4">
                            {{ $product->product_name }}
                        </h1>
                    </div>
                    <h1 class="text-3xl pb-4">£{{ $product->price }}</h1>
                    <p class="text-left pb-4">
                        {{ $product->description }}
                    </p>

                    <form action="{{ route('basket.add') }}" method="post">
                        @csrf
                        <input
                            type="hidden"
                            name="product_id"
                            value="{{ $product->id }}"
                        />
                        <button type="submit" class="bg-yellow-400 text-white py-6 px-12 rounded-md hover:bg-yellow-500 dark:dark:bg-stone-700 dark:hover:text-amber transition-all duration-500">
                            Add to Basket
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>