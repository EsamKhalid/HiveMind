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
        <h2 class="relative text-4xl font-bold text-gray-800 translate-y-10">INVENTORY</h2>
    </div>

    @if(count($products) === 0)
        <div class="flex justify-center mt-5"><h1 class="text-3xl">No Products Found</h1></div>
    @else
        <div class="container mx-auto mt-10">
            <ul class="space-y-10">
            @foreach($products as $product)
                <li class="text-sm">
                                Product:{{strtoupper($product->product_name)}}

                                Type:{{strtoupper($product -> product_type)}}

                                Price: £{{strtoupper($product->price)}}

                                Stock:{{strtoupper($product->stock_level)}}
                </li>
            @endforeach
            </ul>
        </div>
    @endif

</body>
</html>