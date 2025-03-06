<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Your account</title>
    </head>
    <body>
        @include('layouts.navbar')

        <main class="flex justify-center items-center min-h-screen">
            <div class="flex justify-center text-black">
                <form
                    action="{{ route('review.storeProductReview') }}"
                    method="post"
                    class="space-y-10 h-full"
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
                    <input type="text" name="review" />
                    <input type="submit" />
                    <a href="{{ route('orders') }}">Skip</a>
                </form>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
