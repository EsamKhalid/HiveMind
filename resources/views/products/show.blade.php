<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $product->product_name }}</title>
    </head>
    <body class="bg-yellow-50">
        @include('layouts.navbar')
        <a
            href="{{ url()->previous() }}"
            class="fas fa-arrow-left fa-3x p-5"
        ></a>
        <div class="flex justify-center">
            <div class="w-[50] h-[50vh] flex justify-center">
                <div class="flex justify-center pr-5">
                    <img
                        class="size-full"
                        src="{{ asset('Images/product images/' . $product->product_name . '.png') }}"
                    />
                </div>
                <div class="inline-block justify-center size-[35vh]">
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