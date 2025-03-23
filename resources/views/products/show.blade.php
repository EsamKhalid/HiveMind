<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $product->product_name }} 🐝</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <style>
        * {
            box-sizing: border-box;
        }

        .img-magnifier-container {
            position: relative;
        }

        .img-magnifier-glass {
            position: absolute;
            border: 3px solid #fbbf24;
            cursor: none;
            width: 40%;
            height: 40%;
            pointer-events: none;
            border-radius: 8px;
            z-index: 6;
        }

        .img-magnifier-container:hover img,
        .img-magnifier-container:hover .img-magnifier-glass {
            cursor: none;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>

<body class="bg-yellow-50 dark:bg-stone-950">
    @include('layouts.navbar')
    <a href="{{ url()->previous() }}" class="fas fa-arrow-left fa-3x p-5 absolute top-16 left-0 dark:text-amber"></a>

    <div class="flex justify-center p-3">
        <div class="flex flex-col lg:flex-row justify-center mt-[10%] px-5 pb-7 pt-5 dark:bg-stone-800 rounded-lg">
            <div class="mr-5">
                <div class="img-magnifier-container">
                    <img id="product-image"
                        class="w-[400px] h-[400px] lg:w-[500px] lg:h-[500px] size-full transition-all duration-500 dark:brightness-[80%] dark:hover:brightness-90 rounded-lg"

                        src="{{ asset('Images/product images/' . $product->product_name . '.png') }}"
                        alt="{{ $product->product_name }}" />
                </div>

                
            </div>
            <div class="inline-block justify-center size-[35vh] my-10 text-stone-800 dark:text-yellow-200">
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
                        <button type="submit" class="bg-yellow-400 text-black dark:text-white py-6 px-12 rounded-md hover:bg-yellow-500 dark:dark:bg-stone-700 dark:hover:text-amber transition-all duration-500 w-full">
                            Add to Basket
                        </button>
                    </form>

                    <form action="{{ route('wishlist.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    <button
                        class="w-full bg-yellow-400 text-black mt-4 py-6 px-12 rounded-md hover:bg-yellow-500 dark:dark:bg-stone-700 dark:hover:text-amber transition-all duration-500">
                        Add to Wishlist
                    </button>

                </form>

                <form action="{{route('review.productReview', $product->id)}}" method="get">
                    <button class="bg-amber text-black dark:text-white hover:text-white dark:hover:text-amber dark:dark:bg-stone-700 w-full mt-5 rounded-md transition-all duration-500 p-5">
                        Submit Review
                    </button>
                </form>

                    

                </div>
        </div>
    </div>
    
       
                
     
    </div>
    <div class="flex justify-center mt-24 h-fit">
        <div class="bg-amber size-10 w-1/2 text-center">
            <div class="relative flex items-center justify-center py-2">
                <h1 class="text-2xl font-bold">Reviews</h1>
                <button onclick="TOGGLE_REVIEW()"
                    class="absolute right-0 top-[0px] bg-gray-500 text-white px-4 py-2 rounded-md">
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
                        <p class="text-stone-700">{{ $rev->review_title }}</p>
                        <p class="text-stone-700">{{ $rev->review }}</p>
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

        </script>
        <script>
        function magnify(imgID, zoom) {
            var img, glass, w, h, bw;
            img = document.getElementById(imgID);
            // Function to initialize or update magnifier
            function initializeMagnifier() {
                // Remove existing glass if it exists
                if (glass) {
                    glass.remove();
                }
                // Create new magnifier glass
                glass = document.createElement("DIV");
                glass.setAttribute("class", "img-magnifier-glass");
                img.parentElement.insertBefore(glass, img);
                // Set background properties
                glass.style.backgroundImage = "url('" + img.src + "')";
                glass.style.backgroundRepeat = "no-repeat";
                // Update these values based on current image size
                bw = 3;
                w = glass.offsetWidth / 2;
                h = glass.offsetHeight / 2;
                // Update background size based on current image dimensions
                glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
            }
            // Initial setup
            initializeMagnifier();

            // Move magnifier function
            function moveMagnifier(e) {
                var pos, x, y;
                e.preventDefault();
                
                pos = getCursorPos(e);
                x = pos.x;
                y = pos.y;
                
                // Keep magnifier within image bounds
                if (x > img.width - w) {
                    x = img.width - w;
                }
                if (x < w) {
                    x = w;
                }
                if (y > img.height - h) {
                    y = img.height - h;
                }
                if (y < h) {
                    y = h;
                }

                glass.style.left = (x - w) + "px";
                glass.style.top = (y - h) + "px";
                glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
            }

            function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                a = img.getBoundingClientRect();
                x = e.pageX - a.left - window.pageXOffset;
                y = e.pageY - a.top - window.pageYOffset;
                return { x: x, y: y };
            }

            // Event listeners
            function addEventListeners() {
                glass.addEventListener("mousemove", moveMagnifier);
                img.addEventListener("mousemove", moveMagnifier);
                glass.addEventListener("touchmove", moveMagnifier);
                img.addEventListener("touchmove", moveMagnifier);
                img.addEventListener("mouseenter", () => glass.style.display = "block");
                img.addEventListener("mouseleave", () => glass.style.display = "none");
            }

            addEventListeners();
            // Handle resize
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    initializeMagnifier();
                    addEventListeners(); // Re-attach event listeners to new glass
                }, 250);
            });
        }
        // Initialize magnifier
        magnify("product-image", 1.25);
    </script>
    </body>
</html>

