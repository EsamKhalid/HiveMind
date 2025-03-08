<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $product->product_name }}</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
    </head>
    <body class="bg-yellow-50">
        @include('layouts.navbar')
        <a
            href="{{ route('products') }}"
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
        <div class="flex justify-center mt-10 h-fit">
            <div class="bg-amber size-full w-1/2 text-center">
                <h1>Reviews</h1>
                <div class="inline-block justify-center">
                    @foreach($reviews as $review) @if($review->user)
                    <div class="bg-ghost-white rounded m-2 text-lg [&_p]:p-1.5">
                        @for ($i = 0; $i < $review->rating; $i++)
                        <div class="fa fa-star white"></div>
                        @endfor
                        <p>Name: {{$review->user->first_name}}</p>

                        @else
                        <p>Guest</p>
                        @endif
                        <p>{{ $review->review }}</p>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
