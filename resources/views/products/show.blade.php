<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <title>{{ $product->product_name }} 🐝</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />

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

                    <button onclick="OPEN()" class="bg-amber w-1/2 p-2 mt-5">
                        Submit Review
                    </button>
                </div>
            </div>
        </div>

        <div
            id="REVIEW_MODAL"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-[1000] hidden"
        >
            <div class="bg-white p-5 rounded-lg w-[400px] shadow-md">
                <h2 class="text-2xl font-bold mb-4">Submit Your Review</h2>
                <form
                    action="{{ route('review.storeProductReview', $product->id) }}"
                    method="POST"
                >
                    @csrf
                    <div class="mb-4">
                        <label
                            for="name"
                            class="block text-sm font-medium text-gray-700"
                            >Name</label
                        >
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label
                            for="rating"
                            class="block text-sm font-medium text-gray-700"
                            >Rating</label
                        >
                        <select
                            name="rating"
                            id="rating"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            required
                        >
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label
                            for="review_title"
                            class="block text-sm font-medium text-gray-700"
                            >Review Title</label
                        >
                        <input
                            type="text"
                            name="review_title"
                            id="review_title"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label
                            for="review"
                            class="block text-sm font-medium text-gray-700"
                            >Review</label
                        >
                        <textarea
                            name="review"
                            id="review"
                            rows="4"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
                            required
                        ></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="button"
                            onclick="CLOSE()"
                            class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="bg-amber px-4 py-2 rounded-md"
                        >
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex justify-center mt-24 h-fit">
            <div class="bg-amber size-10 w-1/2 text-center">
                <div class="relative flex items-center justify-center py-2">
                    <h1 class="text-2xl font-bold">Reviews</h1>
                    <button
                        onclick="TOGGLE_REVIEW()"
                        class="absolute right-0 top-[0px] bg-gray-500 text-white px-4 py-2 rounded-md"
                    >
                        <i id="COLLAPSE_ICON" class="fa fa-chevron-down"></i>
                    </button>
                </div>
                <div id="REVIEWS_CONTAINER" class="space-y-4">
                    @foreach($reviews as $rev)
                    <div class="bg-white rounded-lg shadow-md p-4 text-center">
                        <div class="flex justify-center">
                            @for ($i = 0; $i < $rev->rating; $i++)
                            <div class="fa fa-star text-yellow-400"></div>
                            @endfor
                        </div>
                        <p class="text-lg font-semibold mt-2">
                            @if($rev->user) Name: {{ $rev->user->first_name }}
                            @endif
                        </p>
                        <p class="text-gray-700">{{ $rev->review_title }}</p>
                        <p class="text-gray-700">{{ $rev->review }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            function OPEN() {
                document
                    .getElementById("REVIEW_MODAL")
                    .classList.remove("hidden");
            }

            function CLOSE() {
                document.getElementById("REVIEW_MODAL").classList.add("hidden");
            }

            window.onclick = function (event) {
                const MODAL = document.getElementById("REVIEW_MODAL");
                if (event.target === MODAL) {
                    CLOSE();
                }
            };

            function TOGGLE_REVIEW() {
                const reviewsContainer =
                    document.getElementById("REVIEWS_CONTAINER");
                const collapseIcon = document.getElementById("COLLAPSE_ICON");

                if (reviewsContainer.classList.contains("hidden")) {
                    reviewsContainer.classList.remove("hidden");
                    collapseIcon.classList.remove("fa-chevron-up");
                    collapseIcon.classList.add("fa-chevron-down");
                } else {
                    reviewsContainer.classList.add("hidden");
                    collapseIcon.classList.remove("fa-chevron-down");
                    collapseIcon.classList.add("fa-chevron-up");
                }
            }
        </script>
    </body>
</html>
