<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $product->product_name }} 🐝</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
    </head>
    <body class="bg-yellow-50">
        @include('layouts.navbar')
        <a
            href="{{ route('products')  }}"
            class="fas fa-arrow-left fa-3x p-5 absolute top-16 left-0 dark:text-amber"
        ></a>
        <div class="flex justify-center">
            <div class=" flex justify-center mt-[10%] flex-col lg:flex-row">
                <div class="flex justify-center pr-5">
                    <img
                        class="w-[500px] h-[500px] lg:w-[500px] lg:h-[500px] size-full"
                        src="{{ asset('Images/product images/' . $product->product_name . '.png') }}"
                    />
                </div>
                <div class="inline-block justify-center size-[35vh] mt-10">
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
                        <button type="submit" class="bg-amber w-1/2 p-2">
                            Add to Basket
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>