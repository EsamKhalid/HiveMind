<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $product->product_name }}</title>
    </head>
    <body>
        @include('layouts.navbar')
        <a
            href="{{ url()->previous() }}"
            class="fas fa-arrow-left fa-3x p-5 absolute top-0 left-0 dark:text-amber"
        ></a>
        <div class="flex justify-center">
            <div class="w-1/2 h-[50vh] flex justify-center">
                <div class="flex justify-center pr-5">
                    <img
                        class="size-full"
                        src="{{ asset('../Images/placeholder.avif') }}"
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

                    <form action="{{ route('basket.add') }}" method="post">
                        @csrf
                        <input
                            type="hidden"
                            name="product_id"
                            value="{{ $product->id }}"
                        />
                        <button type="submit" class="bg-amber w-full">
                            Add to Basket
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
