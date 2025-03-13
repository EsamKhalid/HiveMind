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

<body class="bg-white dark:bg-stone-900 w-full">
@include('layouts.sidebar')
    <div class="relative text-center mt-24 h-48">
        <h2 class="absolute inset-0 w-full text-7xl lg:text-9xl font-bold text-gray-300 dark:text-yellow-400 dark:opacity-80 opacity-90 pointer-events-none">
            INVENTORY
        </h2>
        
    </div>
    <div class="h-fit mb-6 ml-[18%]">
                
            </div>
    <!-- THE FOLLOWING SERVES TO ACT AS A SEPERATE BAR FOR FILTERING BASED ON PRODUCT TYPE -->
    
    <div class="flex flex-row-reverse flex-grow lg:flex-col top-0 bg-stone-200 dark:bg-stone-950 z-8 py-4">
   
        <div class="containern max-w-[20%] mr-20 lg:mr-10 lg:max-w-none 2xl:mx-auto px-3 dark:rounded-lg">
        
            <div class="flex flex-col justify-end lg:flex-row lg:justify-center overflow gap-4 mb-6 py-2">
            
                <form class="w-fit"method="get" action="{{route('admin.inventory')}}">
                    <div>
                        <button
                            name="filter"
                            value="none"
                            class=" items-center gap-2 px-4 py-2 w-48 text-white rounded-lg transition-colors whitespace-nowrap bg-gray-800 hover:bg-gray-700 dark:bg-stone-400 dark:hover:bg-stone-300">
                            <i class="fas fa-th-large"></i> All
                        </button>   
                        
                        <button
                            name="filter"
                            value="beauty" 
                            class=" items-center gap-2 px-4 py-2 w-48 text-white rounded-lg transition-colors whitespace-nowrap bg-pink-600 hover:bg-pink-500">
                            <i class="fas fa-spa"></i> Beauty
                        </button>
                        <button
                            name="filter"
                            value="health"
                            class=" items-center gap-2 px-4 py-2 w-48 text-white rounded-lg transition-colors whitespace-nowrap bg-green-600 hover:bg-green-500">
                            <i class="fas fa-heartbeat"></i> Health
                        </button>
                        <button 
                            name="filter"
                            value="haircare"
                            class=" items-center gap-2 px-4 py-2 w-48 text-white rounded-lg transition-colors whitespace-nowrap bg-purple-600 hover:bg-purple-500">
                            <i class="fas fa-air-freshener"></i> Haircare
                        </button>
                        <button 
                            name="filter"
                            value="skincare"
                            class=" items-center gap-2 px-4 py-2 w-48 text-white rounded-lg transition-colors whitespace-nowrap bg-yellow-600 hover:bg-yellow-500">
                            <i class="fas fa-pump-soap"></i> Skincare
                        </button>
                        <button 
                            name="filter"
                            value="body"
                            class=" items-center gap-2 px-4 py-2 w-48 text-white rounded-lg transition-colors whitespace-nowrap bg-red-600 hover:bg-red-500">
                            <i class="fas fa-shower"></i> Body
                        </button>
                        <button 
                            name="filter"
                            value="merchandise"
                            class=" items-center gap-2 px-4 py-2 w-48 text-white rounded-lg transition-colors whitespace-nowrap bg-blue-600 hover:bg-blue-500">
                            <i class="fas fa-tshirt"></i> Merchandise
                        </button>
                        <button 
                            name="filter"
                            value="home"
                            class=" items-center gap-2 px-4 py-2 w-48 text-white rounded-lg transition-colors whitespace-nowrap bg-indigo-600 hover:bg-indigo-500">
                            <i class="fas fa-home"></i> Home
                        </button>    
                    </div>
                    <div class="flex mt-5">
                        <button 
                            name="stockLevel"
                            value="out_of_stock"
                            class=" items-center gap-2 mr-2 py-2 w-full text-white rounded-lg transition-colors whitespace-nowrap bg-red-600 hover:bg-red-500">
                            <i class="fas fa-x"></i> Out of Stock
                        </button>
                        <button 
                            name="stockLevel"
                            value="low_stock"
                            class=" items-center gap-2 mx-2 py-2 w-full text-white rounded-lg transition-colors whitespace-nowrap bg-orange-400 hover:bg-orange-300">
                            <i class="fas fa-long-arrow-alt-down"></i> Low Stock
                        </button>
                        <button 
                            name="stockLevel"
                            value="in_stock"
                            class=" items-center gap-2 ml-2 py-2 w-full text-white rounded-lg transition-colors whitespace-nowrap bg-green-500 hover:bg-green-400">
                            <i class="fas fa-check"></i> In Stock
                        </button>    
                    </div>
                    
                </form>
                
            </div>
            
            
        </div>

        <!-- CONTAINER USED FOR BEING ABLE TO DEFINE PRODUCTS TO THE INVENTORY BASED ON AN ID -->
        <!-- USES THE DEFINITION CITED FROM THE CONTROLLER TO BE ABLE TO FILTER ACCORDINGLY WITH THE CHAR DEFINED IN THE DB -->

        <!-- THANK YOU, BASANTA AND MUNEEB FOR THE IMPL. OF FOREACH -->

        <div class="container mx-auto px-4 pb-12 ">
            
            
            <div class=" bg-gray-200  dark:bg-stone-700 p-6 rounded-lg shadow-md transition-all duration-300">
                <form
                    action="{{ route('admin.inventory')}}"
                    method="GET"
                    class="w-full mr-3"
                >
                    <input
                        type="text"
                        name="search"
                        class="rounded w-full placeholder:text-stone-500 dark:text-stone-900"
                        placeholder="search for a product"
                    />
                    <br />
                </form>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 bg-gray-200  dark:bg-stone-700 p-6 rounded-lg shadow-md transition-all duration-300">
                @foreach($products as $product)
                    <div class="bg-white dark:bg-stone-300 rounded-lg shadow-md p-4 text-center transform transition-all duration-300">
                        <div class="absolute top-2 right-2">
                            <span class="text-xs flex items-center gap-1 text-gray-500">
                                <i class="fas {{ $TYPE_ICONS[$product->product_type] ?? 'fa-box' }}"></i>
                            </span>
                        </div>
                        <div class="my-3">
                            <div class="text-lg font-bold">{{ strtoupper($product->product_name) }}</div>
                            <div class="text-gray-700">£{{ $product->price }}</div>
                            <div class="text-sm {{ $product->stock_level > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock_level > 0 ? 'In Stock' : 'Out of Stock'}}
                                ({{$product->stock_level}})
                            </div>
                        </div>

                        <a
                         href={{ route("admin.show",$product->id)  }}>
                            <button type="submit" class="bg-amber w-full"> Record Stock Order </button>
                        </a>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
    <!--<script> 
        const PRODUCTS = @json($products);

        const TYPE_COLORS =
        {
            BEAUTY: 'bg-pink-100',
            HEALTH: 'bg-green-100',
            HAIRCARE: 'bg-purple-100',
            SKINCARE: 'bg-yellow-100',
            BODYCARE: 'bg-red-100',
            MERCH: 'bg-blue-100',
            HOME: 'bg-indigo-100'
        };

        const TYPE_ICONS =
        {
            BEAUTY: 'fa-spa',
            HEALTH: 'fa-heartbeat',
            HAIRCARE: 'fa-air-freshener',
            SKINCARE: 'fa-pump-soap',
            BODYCARE: 'fa-shower',
            MERCH: 'fa-tshirt',
            HOME: 'fa-home'
        };

        function GENERATE_CARD_HTML(PRODUCT) {
            // LOWER-CASE TO REFLECT DEFINEIN DB SCHEMA

            const { stock_level } = PRODUCT;

            const route = `/admin/inventory/order/${PRODUCT.id}`;

            const [STATUS, COLOUR] = stock_level === 0
                ? ['Out of Stock', 'text-red-400'] : stock_level < 6
                    ? ['Extremely Low', 'text-red-500'] : stock_level < 20
                        ? ['Running Low', 'text-amber-600']
                        : ['Sufficient Stock', 'text-green-600'];

            return `
            <div class="bg-white dark:bg-stone-900 rounded-lg shadow-md p-4 text-center transform transition-all duration-300">
                <div class="absolute top-2 right-2">
                    <span class="text-xs flex items-center gap-1 text-gray-500 dark:text-white">
                        <i class="fas ${TYPE_ICONS[PRODUCT.product_type]}"></i>
                    </span>
                </div>
                    <div class="mt-3">
                    <div class="text-lg dark:text-white font-bold">${PRODUCT.product_name.toUpperCase()}</div>
                    <div class="text-gray-700 dark:text-white">£${PRODUCT.price}</div>
                    <div class="text-sm ${COLOUR}">
                    ${STATUS}
                        </div>
                        <a href="${route}">
                            <button type="submit" class="bg-amber w-full"> Record Stock Order </button>
                        </a>
                    </div>
                </div>
            `;
        }


        function FILTER_PRODUCTS(FILTER_TYPE) {
            const GRID = document.getElementById('INVENTORY');
            let FILTERED_PRODUCTS = PRODUCTS;

            if (FILTER_TYPE !== 'ALL') {
                FILTERED_PRODUCTS = PRODUCTS.filter(PRODUCT => PRODUCT.product_type.trim().toUpperCase() === FILTER_TYPE);
            }


            const ITEMS_COUNT = FILTERED_PRODUCTS.length;
            const ROWS = Math.ceil(ITEMS_COUNT / 4);

            GRID.style.gridTemplateRows = `repeat(${ROWS}, minmax(0, 1fr))`;

            let GRID_HTML = '';
            FILTERED_PRODUCTS.forEach(PRODUCT => {
                GRID_HTML += GENERATE_CARD_HTML(PRODUCT);
            });

            GRID.style.transition = 'all 0.3s ease-in-out';
            GRID.innerHTML = GRID_HTML;
        }

        FILTER_PRODUCTS('ALL');
    </script> -->
</body>

</html>