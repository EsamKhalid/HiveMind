<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="dark:bg-stone-900">
        <header>@include('layouts.navbar')</header>
        <main class="mb-auto h-screen
        "><div class="justify-center py-5">
            <p class="text-6xl text-center dark:text-white">Shop us</p>
        </div>

        <div class="flex justify-center">
            <div class="flex justify-center w-[75vw] border">
                <form
                    action="{{ route('products') }}"
                    method="GET"
                    class="w-full mr-3"
                >
                    <input
                        type="text"
                        name="search"
                        value="{{ request('product_name') }}"
                        class="rounded w-full"
                    />
                    <br />
                </form>
                <form action="{{ route('products') }}" method="GET">
                    <select name="filter" onchange="this.form.submit()">
                        <option value="none"{{ request('filter') == 'none' ? 'selected' : '' }}>None</option>
                        <option value="Skincare" {{ request('filter') == 'Skincare' ? 'selected' : '' }}>Skincare</option>
                        <option value="Health" {{ request('filter') == 'Health' ? 'selected' : '' }}>Health</option>
                        <option value="Beauty" {{ request('filter') == 'Beauty' ? 'selected' : '' }}>Beauty</option>
                        <option value="Haircare" {{ request('filter') == 'Haircare' ? 'selected' : '' }}>Haircare</option>
                        <option value="Merchandise" {{ request('filter') == 'Merchandise' ? 'selected' : '' }}>Merchandise  </option>
                    </select>
                </form>
            </div>
        </div>

        

        @if(count($products) === 0)
        <div class="flex justify-center mt-5"><h1 class="text-3xl dark:text-white">No Products Found</h1></div>
        

        @else

        <div class="inline-block mt-5">
            @if($search)
            <div class="flex justify-center">
                <div class="flex justify-between my-3 w-3/4 border">
                    <h1 class="text-center text-3xl dark:text-white">
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
                                class="h-[60%] dark:brightness-75 dark:hover:brightness-90"
                                src="{{
                                    asset('../Images/placeholder.avif')
                                }}"
                            />
                             <h1 class="text-center text-xl dark:text-white">
                                {{strtoupper($product->product_name)}}
                            </h1>
                            <p class="dark:text-white">£{{$product->price}}</p>
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
