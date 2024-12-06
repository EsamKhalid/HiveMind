<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $product->product_name }}</title>
    </head>
    <body>
        @include('layouts.navbar')
        <a
            href="{{ route('products') }}"
            class="fas fa-arrow-left fa-4x p-5"
        ></a>
        <div class="flex justify-center">
            <div class="w-1/2 h-[50vh] flex justify-center">
                <div class="flex justify-center pr-5">
                    <img
                        class="size-full"
                        src="{{ asset('Images/product images/' . $product->product_name . '.png') }}"
                    />
                </div>
                <div class="inline-block justify-center size-[400px]">
                    <div class="flex justify-center">
                        <h1 class="text-5xl pb-4">
                            {{ $product->product_name }}
                        </h1>
                    </div>
                    <h1 class="text-3xl pb-4">£{{ $product->price }}</h1>
                    <p class="text-justify">
                        {{ $product->description }}
                    </p>
                    <button type="button" class="bg-amber w-full">
                        Add to Basket
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
