<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $product->product_name }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <body>
        @include('layouts.navbar')
        <a href="{{ url()->previous() }}" 
        class="fas fa-arrow-left fa-3x p-5">
        </a>
        <div class="flex justify-center">
            <div class="w-1/2 h-[50vh] flex justify-center">
                <div class="flex justify-center pr-5">
                    <img class="size-full" src="{{ asset('Images/product images/' . $product->product_name . '.png') }}" alt="{{ $product->product_name }}" />
                </div>
                <div class="inline-block justify-center size-[400px]">
                    <div class="flex justify-center">
                        <h1 class="text-5xl pb-4">{{ $product->product_name }}</h1>
                    </div>
                    <h1 class="text-3xl pb-4">£{{ $product->price }}</h1>
                    <p class="text-justify">{{ $product->description }}</p>

                    <form action="{{ route('basket.add') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <button type="submit" class="bg-amber w-full py-2 text-black font-medium rounded hover:bg-amber-600 transition">Add to Basket</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-10">
            <div class="w-1/2">
                <h2 class="text-3xl mb-5">Reviews</h2>
                
                @auth
                    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
                        <h3 class="text-2xl font-semibold mb-4">Write a Review</h3>
                        <form id="reviewForm" action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="mb-4">
                                <label for="review" class="block text-sm font-medium text-gray-700">Review</label>
                                <textarea name="review" id="review" rows="3" class="mt-1 block w-full border rounded-md p-2" required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                                <div class="flex items-center mt-1">
                                    <select name="rating" id="rating" class="block w-full border rounded-md p-2" required>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Stars</option>
                                        <option value="3">3 Stars</option>
                                        <option value="4">4 Stars</option>
                                        <option value="5">5 Stars</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-amber-500 text-black py-2 px-4 rounded font-medium hover:bg-amber-600 transition">
                                Submit Review
                            </button>
                        </form>
                    </div>
                @else
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg mb-8">
                        <p class="text-gray-600">
                            No reviews yet? <a href="{{ route('login') }}" class="text-blue-500">B(ee) the first</a> to leave a review.
                        </p>
                    </div>
                @endauth
                
                @if($reviews->isEmpty())
                    @foreach($reviews as $review)
                        <div class="border-t pt-3 mb-3">
                            <div class="flex items-center justify-between">
                                <p class="font-semibold">{{$review->comment}}</p>
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            <i class="fas fa-star text-yellow-500"></i> 
                                        @else
                                            <i class="far fa-star text-yellow-500"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-1">{{ $review->created_at->format('M d, Y') }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </body>
</html>
