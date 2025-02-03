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

        <div class="inline-block mt-5">
            @if($search)
            <div class="flex justify-center">
                <div class="flex justify-between my-3 w-3/4 border">
                    <h1 class="text-center text-3xl">
                        Displaying {{ sizeof($products) }} Product(s)
                    </h1>
                </div>
            </div>

            @endif
            <div class="flex justify-center">
                <div class="grid grid-cols-5 gap-0 w-3/4">
                    @foreach($products as $product)
                    <a
                        href="{{route('products.show', $product->id)}}"
                        class="w-fit"
                        ><div class="size-full p-1">
                            <img
                                class="h-[100%]"
                                src="{{ asset('Images/product images/' . $product->product_name . '.png') }}"
                            />
                             <h1 class="text-center text-xl">
                                {{strtoupper($product->product_name)}}
                            </h1>
                            <p>£{{$product->price}}</p>
                        </div></a
                    >

                    @endforeach
                </div>
            </div>
        </div>
        @endif

</body>
</html>