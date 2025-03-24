<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory 🐝</title>
    <link rel="icon" href="/favicon.ico">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</head>

<body class="transition-none bg-stone-200 dark:bg-stone-900 w-full">
    @include('layouts.sidebar')
    <header class="bg-gradient-to- bg-white dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000"><i class="fa-solid fa-warehouse text-yellow-500 text-4xl"></i> Inventory</h1>
            <p class="text-lg mt-2  text-stone-800 dark:text-yellow-200 transition-colours duration-1000">Manage all products in our Warehouses.</p>
        </div>
    </header>
    <p class="text-white dark:text-amber mx-auto text-4xl mb-3">{{ $category != 'none' ? ucfirst($category) : '' }}</p>
    <div
        class="flex flex-row-reverse justify-start align-middle lg:flex-col top-0 bg-stone-200 dark:bg-stone-950 z-8 py-4">
        
        <div class="container w-1/5 mr-0 lg:max-w-none lg:mx-auto pr-3 dark:rounded-lg">
            <div class="flex flex-col justify-end lg:flex-row lg:justify-center overflow gap-4 mb-6 py-2">
                <form class="w-fit" method="get" action="{{route('admin.inventory')}}">
                    <div class="block lg:hidden">
                        <select name="filter"
                        onchange="this.form.submit()"
                            class="px-4 py-2 w-full lg:w-auto text-white dark:text-black rounded-lg bg-stone-700 hover:bg-stone-800 dark:bg-yellow-400 dark:hover:bg-yellow-300">
                            <option value="none">All</option>
                            <option value="beauty">Beauty</option>
                            <option value="health"> Health</option>
                            <option value="haircare">Haircare</option>
                            <option value="skincare">Skincare</option>

                            <option value="merchandise"> Merchandise</option>

                        </select>
                    </div>
                    <div class="space-y-2 lg:space-y-0 space-x-2 hidden justify-evenly lg:flex-row lg:flex w-4/5">
                        <button name="filter" value="none"
                            class=" items-center gap-2 px-4 py-2 w-24 lg:w-fit text-white rounded-lg transition-colors whitespace-nowrap bg-stone-800 hover:bg-stone-700 dark:bg-stone-400 dark:hover:bg-stone-300">
                            <i class="fas fa-th-large"></i> All
                        </button>

                        <button name="filter" value="beauty"
                            class=" items-center gap-2 px-4 py-2 w-24 lg:w-fit text-white rounded-lg transition-colors whitespace-nowrap bg-pink-600 hover:bg-pink-500">
                            <i class="fas fa-spa"></i> Beauty
                        </button>
                        <button name="filter" value="health"
                            class=" items-center gap-2 px-4 py-2 w-24 lg:w-fit text-white rounded-lg transition-colors whitespace-nowrap bg-green-600 hover:bg-green-500">
                            <i class="fas fa-heartbeat"></i> Health
                        </button>
                        <button name="filter" value="haircare"
                            class=" items-center gap-2 px-4 py-2 w-24 lg:w-fit text-white rounded-lg transition-colors whitespace-nowrap bg-purple-600 hover:bg-purple-500">
                            <i class="fas fa-air-freshener"></i> Haircare
                        </button>
                        <button name="filter" value="skincare"
                            class=" items-center gap-2 px-4 py-2 w-24 lg:w-fit text-white rounded-lg transition-colors whitespace-nowrap bg-yellow-600 hover:bg-yellow-500">
                            <i class="fas fa-pump-soap"></i> Skincare
                        </button>

                        <button name="filter" value="merchandise"
                            class=" items-center gap-2 px-4 py-2 w-24 lg:w-fit text-white rounded-lg transition-colors whitespace-nowrap bg-blue-600 hover:bg-blue-500">
                            <i class="fas fa-tshirt"></i> Merchandise
                        </button>

                    </div>
                    <div class="flex flex-col-reverse lg:flex-row mt-3 space-y-2 lg:space-y-0">
                        <button name="stockLevel" value="out_of_stock"
                            class="flex items-center gap-2 lg:mr-2 py-2 w-10 lg:w-full mt-2 lg:mt-0 text-white rounded-lg transition-colors whitespace-nowrap bg-red-600 hover:bg-red-500">
                            <i class="fas fa-x mx-auto lg:ml-5 lg:mr-0"></i> <p class="hidden lg:flex">Out of Stock</p>
                        </button>
                        <button name="stockLevel" value="low_stock"
                            class="flex items-center gap-2 lg:mx-2 py-2 w-10 lg:w-full text-white rounded-lg transition-colors whitespace-nowrap bg-orange-400 hover:bg-orange-300">
                            <i class="fas fa-long-arrow-alt-down mx-auto lg:ml-5 lg:mr-0"></i> <p class="hidden lg:flex">Low Stock</p>
                        </button>
                        <button name="stockLevel" value="in_stock"
                            class="flex items-center  gap-2 lg:ml-2 py-2 w-10 lg:w-full text-white rounded-lg transition-colors whitespace-nowrap bg-green-500 hover:bg-green-400">
                            <i class="fas fa-check mx-auto lg:ml-5 lg:mr-0"></i> <p class="hidden lg:flex">In Stock</p>
                        </button>
                    </div>
                </form>
                <a href="{{ route('admin.inventory.create') }}" class="w-full lg:w-auto">
                    <button class="px-4 py-2 w-full lg:w-auto text-white rounded-lg transition-colors whitespace-nowrap bg-yellow-600 hover:bg-yellow-500">
                        <i class="fas fa-plus"></i> Add New Product
                    </button>
                </a>
            </div>
        </div>

        <div class="container mx-auto pb-12 w-fit flex-grow">
            <div class=" bg-stone-200 dark:bg-stone-700 p-6 rounded-lg shadow-md transition-all duration-300 w-[90%] lg:w-full mx-5">
                <form action="{{ route('admin.inventory')}}" method="GET" class="w-full mr-3">
                    <input type="text" name="search"
                        class="rounded w-full placeholder:text-stone-500 dark:text-stone-900"
                        placeholder="Search for a product" />
                    <br />
                </form>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-10 bg-stone-200  dark:bg-stone-700 p-6 rounded-lg shadow-md transition-all duration-300 w-full">
                    @foreach($products as $product)

                        <div
                            class="bg-white dark:bg-stone-300 max-w-60 min-w-40 {{ ($product->stock_level == 0 ? 'border-t-red-500' : ($product->stock_level < 35 ? 'border-t-amber' : 'border-t-green-500')) }} border-t-8 rounded-lg shadow-md p-4 text-center transform transition-all duration-300">
                            <div class="absolute top-2 right-2">
                                <span class="text-xs flex items-center gap-1 text-stone-500">
                                    <i class="fas {{ $TYPE_ICONS[$product->product_type] ?? 'fa-box' }}"></i>
                                </span>
                            </div>
                            <div class="my-3">
                                <div class="text-lg font-bold">{{ strtoupper($product->product_name) }}</div>
                                <div class="text-stone-700">£{{ $product->price }}</div>
                                <div
                                    class="text-sm {{ ($product->stock_level == 0 ? 'text-red-700' : ($product->stock_level < 35 ? 'text-yellow-700' : 'text-green-700')) }}">
                                    {{ ($product->stock_level == 0 ? 'OUT OF STOCK' : ($product->stock_level < 35 ? 'LOW STOCK' : 'IN STOCK')) }}
                                    ({{$product->stock_level}})
                                </div>
                            </div>
                            <a href="{{ route('admin.show', $product->id)  }}">
                                <button type="submit" class="bg-amber w-full rounded"> Record Stock Order </button>
                            </a>
                            
                            <a href="{{route('admin.inventoryEdit', $product->id)}}">
                                <button type="submit" class="bg-amber w-full rounded mt-2"> Edit Product </button>
                            </a>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</body>

</html>