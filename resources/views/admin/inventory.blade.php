<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</head>
<body>
    @include('layouts.navbar')

    <div class="relative text-center mt-4">
        <h2 class="absolute inset-0 text-9xl font-bold text-gray-300 opacity-20"> 
            INVENTORY
        </h2>
        <h2 class="relative text-4xl font-bold text-gray-800 translate-y-10">INVENTORY</h2>
    </div>

    @if(count($products) === 0)
        <div class="flex justify-center mt-5"><h1 class="text-3xl">No Products Found</h1></div>
    @else
            <div class="flex justify-center">
                <div class="grid grid-cols-5 gap-0 w-3/4">
                    @foreach($products as $product)
                        ><div class="size-full p-1">

                            <p class = "text-center text-xl">
                                {{strtoupper($product->product_name)}}
                            </p>

                            <p class = "text-center text-xl">
                                Type:{{strtoupper($product -> product_type)}}
                            </p>

                            <p class="text-center text-x1">
                                Price: £{{strtoupper($product->price)}}
                            </p>

                    @endforeach
                </div>
            </div>
        </div>
    @endif

</body>
</html>