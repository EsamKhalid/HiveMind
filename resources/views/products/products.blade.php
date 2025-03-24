<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <title>Products 🐝</title>
    </head>
    <body class="transition-none transition-all ease-in-out duration-1000 transform bg-yellow-50 dark:bg-stone-950 dark:text-yellow-200">
        <header>@include('layouts.navbar')</header>
        <main class="mb-auto h-screen
        "><div class="justify-center py-5">
            <p class="text-6xl text-center">Shop us</p>
        </div>

        <div class="flex justify-center">
            <div class="flex justify-center w-[80%]">
                <form
                    action="{{ route('products') }}"
                    method="GET"
                    class="w-full mr-3"
                >
                    <input
                        type="text"
                        name="search"
                        value="{{ request('product_name') }}"
                        class="w-full placeholder:text-yellow-500 dark:placeholder:text-stone-500 dark:text-yellow-900 rounded-lg dark:bg-amber border-2 dark:border-yellow-900 h-fit lg:h-12 text-sm lg:text-lg transition-colors duration-1000"
                        placeholder="search for a product"
                    />
                    <br />
                </form>
                <form action="{{ route('products') }}" method="GET" class="text-black ">
                    <select name="filter" onchange="this.form.submit()" class=" dark:text-yellow-900 rounded-lg dark:bg-amber border-2 dark:border-yellow-900 w-fit h-fit lg:h-12 text-sm lg:text-lg text-yellow-900 transition-colors duration-1000">
                        <option value="none"{{ request('filter') == 'none' ? 'selected' : '' }}>All Products</option>
                        <option value="Skincare" {{ request('filter') == 'Skincare' ? 'selected' : '' }}>Skincare</option>
                        <option value="Health" {{ request('filter') == 'Health' ? 'selected' : '' }}>Health</option>
                        <option value="Beauty" {{ request('filter') == 'Beauty' ? 'selected' : '' }}>Beauty</option>
                        <option value="Haircare" {{ request('filter') == 'Haircare' ? 'selected' : '' }}>Haircare</option>
                        <option value="Merchandise" {{ request('filter') == 'Merchandise' ? 'selected' : '' }}>Merchandise</option>
                    </select>
                </form>
            </div>
        </div>

        

        @if(count($products) === 0)
        <div class="flex justify-center mt-5 border-none"><h1 class="text-3xl">No Products Found</h1></div>
        

        @else

        <div class="mt-5">
            @if($search)
            <div class="flex justify-center">
                <div class="flex justify-between my-3 w-3/4">
                    <h1 class="text-center text-3xl">
                        Displaying {{ sizeof($products) }} Product(s)
                    </h1>
                </div>
            </div>

            @endif
            <div class="flex justify-center">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-0 mb-2 mx-auto w-[80%]">

                    @foreach($products as $product)
                    <a
                        href="{{route('products.show', $product->id)}}"
                        class="w-fit"
                        ><div class="h-auto hover:scale-110 transition-all duration-500 max-w-3/4 p-5">
                            <img
                            
                                class="w-[300px] dark:brightness-[70%] dark:hover:brightness-100 transition-all duration-500 dark:saturate-[80%] dark:hover:saturate-100 rounded-lg dark:border-yellow-100 dark:border-2"

                                src="{{ asset('Images/product images/' . $product->id . '.png') }}"
                            />
                             <h1 class="text-center text-xl mt-5">
                                {{strtoupper($product->product_name)}}
                            </h1>
                            <p class="text-center">{{ $product->stock_level == 0 ? 'This product is out of stock' : ' In Stock (' .  $product->stock_level .')'  }}</p>
                            <p class="text-center font-bold">£{{$product->price}}</p>
                        </div></a
                    >

                    @endforeach
                </div>
            </div>
        </div>
        @endif 
        </main>
    </body>
   
    @include('layouts.footer')
</html>