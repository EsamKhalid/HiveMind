<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Your account</title>
    </head>
    <body
        class="rounded-lg dark:bg-stone-950 transition-none transition-all duration-1000"
    >
        @include('layouts.navbar')
        <div>
            @if ($errors->any())
            <div
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 w-96"
            >
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

        <main class="flex justify-center items-center min-h-screen">
            <div
                class="flex flex-col justify-center items-center text-center w-full max-w-lg p-4 dark:text-white"
            >
                <div class="mb-4">
                    <p class="text-3xl">Review: {{$product->product_name}}</p>
                </div>

                <div class="flex justify-center">
                    <img
                        class="w-1/2"
                        src="{{ asset('Images/product images/' . $product->id . '.png') }}"
                    />
                </div>

                <form
                    action="{{ route('review.storeProductReview', $id) }}"
                    method="POST"
                    class="w-full space-y-4 text-center"
                >
                    @csrf
                    <div class="flex justify-center">
                        <div class="rating space-x-2">
                            <input
                                type="radio"
                                id="star5"
                                name="rating"
                                value="5"
                                required
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
                    </div>

                    <label for="title" class="block text-center w-full"
                        >Review Title (Optional)</label
                    >
                    <input
                        type="text"
                        name="title"
                        class="w-full p-2 border rounded dark:text-black"
                    />
                    <label for="review" class="block text-center w-full"
                        >Review (Optional)</label
                    >
                    <textarea
                        name="review"
                        placeholder="Review Text (max 500 characters)"
                        class="w-full p-3 border border-stone-300 rounded dark:text-black"
                        rows="4"
                    ></textarea>
                    <button
                        type="submit"
                        class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:bg-yellow-500 w-full"
                    >
                        Submit
                    </button>
                </form>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
