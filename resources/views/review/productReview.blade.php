<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Your account</title>
    </head>
    <body>
        @include('layouts.navbar')
        <div class="flex justify-center">
            @if($errors->any())
            <h4 class="text-3xl">{{$errors->first()}}</h4>
            @endif
        </div>

        <main class="flex justify-center items-center min-h-screen">
            <div class="inline-grid border justify-center text-center">
                <div class="flex justify-center">
                    <p class="border size-fit text-3xl">
                        Review: {{$product->product_name}}
                    </p>
                </div>

                <div class="flex justify-center">
                    <img
                        class="size-[20vw]"
                        src="{{ asset('Images/product images/' . $product->product_name . '.png') }}"
                    />
                </div>

                <div class="flex justify-center">
                    <form
                        action="{{ route('review.storeProductReview', $id) }}"
                        method="POST"
                        class="h-full size-fit inline-grid justify-center"
                    >
                        @csrf
                        <div class="rating">
                            <input
                                type="radio"
                                id="star5"
                                name="rating"
                                value="5"
                            />
                            <label
                                class="star"
                                for="star5"
                                title="Awesome"
                                aria-hidden="true"
                            ></label>
                            <input
                                type="radio"
                                id="star4"
                                name="rating"
                                value="4"
                            />
                            <label
                                class="star"
                                for="star4"
                                title="Great"
                                aria-hidden="true"
                            ></label>
                            <input
                                type="radio"
                                id="star3"
                                name="rating"
                                value="3"
                            />
                            <label
                                class="star"
                                for="star3"
                                title="Very good"
                                aria-hidden="true"
                            ></label>
                            <input
                                type="radio"
                                id="star2"
                                name="rating"
                                value="2"
                            />
                            <label
                                class="star"
                                for="star2"
                                title="Good"
                                aria-hidden="true"
                            ></label>
                            <input
                                type="radio"
                                id="star1"
                                name="rating"
                                value="1"
                            />
                            <label
                                class="star"
                                for="star1"
                                title="Bad"
                                aria-hidden="true"
                            ></label>
                        </div>
                        <label for="review">Review</label>
                        <input type="text" name="review" />
                        <input type="submit" class="cursor-pointer" />
                        <a href="{{ route('orders') }}">Skip</a>
                    </form>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
