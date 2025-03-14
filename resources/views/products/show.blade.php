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
        }

        .img-magnifier-container:hover img,
        .img-magnifier-container:hover .img-magnifier-glass {
            cursor: none;
        }
    </style>
</head>

<body class="bg-yellow-50 dark:bg-stone-950">
    @include('layouts.navbar')
    <a href="{{ url()->previous() }}" class="fas fa-arrow-left fa-3x p-5 absolute top-16 left-0 dark:text-amber"></a>
    <div class="flex justify-center">
        <div class="flex justify-center mt-[10%] flex-col lg:flex-row px-5 pb-7 pt-5 dark:bg-stone-800 rounded-lg">
            <div class="mr-5">
                <div class="img-magnifier-container">
                    <img id="product-image"
                        class="w-[400px] h-[400px] lg:w-[500px] lg:h-[500px] size-full transition-all duration-500 rounded-lg"
                        src="{{ asset('Images/product images/' . $product->product_name . '.png') }}"
                        alt="{{ $product->product_name }}" />
                </div>
            </div>
            <div class="inline-block justify-center size-[35vh] mt-10 text-stone-800 dark:text-yellow-200">
                <div class="flex justify-left">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl text-left pb-4">
                        {{ $product->product_name }}
                    </h1>
                </div>
                <h1 class="text-3xl pb-4">£{{ $product->price }}</h1>
                <p class="text-left pb-4">
                    {{ $product->description }}
                </p>

                <form action="{{ route('basket.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    <button type="submit"
                        class="bg-yellow-400 text-white py-6 px-12 rounded-md hover:bg-yellow-500 dark:dark:bg-stone-700 dark:hover:text-amber transition-all duration-500">
                        Add to Basket
                    </button>
                </form>
            </div>
        </div>
    </div>

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