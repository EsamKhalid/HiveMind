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
    @include('layouts.inventory')
    <div class="relative text-center mt-24 h-48">
        <h2 class="absolute inset-0 w-full text-9xl font-bold text-gray-300 opacity-70 pointer-events-none">
            INVENTORY
        </h2>
    </div>

     <!-- THE FOLLOWING SERVES TO ACT AS A SEPERATE BAR FOR FILTERING BASED ON PRODUCT TYPE -->

    <div class="sticky top-0 bg-white z-10 py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-center overflow-x-auto gap-4 mb-6 py-2">
                <button onclick="FILTER_PRODUCTS('ALL')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-gray-800 hover:bg-gray-700">
                    <i class="fas fa-th-large"></i> All
                </button>
                <button onclick="FILTER_PRODUCTS('BEAUTY')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-pink-600 hover:bg-pink-500">
                    <i class="fas fa-spa"></i> Beauty
                </button>
                <button onclick="FILTER_PRODUCTS('HEALTH')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-green-600 hover:bg-green-500">
                    <i class="fas fa-heartbeat"></i> Health
                </button>
                <button onclick="FILTER_PRODUCTS('HAIRCARE')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-purple-600 hover:bg-purple-500">
                    <i class="fas fa-air-freshener"></i> Hair
                </button>
                <button onclick="FILTER_PRODUCTS('SKINCARE')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-yellow-600 hover:bg-yellow-500">
                    <i class="fas fa-pump-soap"></i> Skin
                </button>
                <button onclick="FILTER_PRODUCTS('BODYCARE')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-red-600 hover:bg-red-500">
                    <i class="fas fa-shower"></i> Body
                </button>
                <button onclick="FILTER_PRODUCTS('MERCHANDISE')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-blue-600 hover:bg-blue-500">
                    <i class="fas fa-tshirt"></i> Merchandise
                </button>
                <button onclick="FILTER_PRODUCTS('HOME')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-indigo-600 hover:bg-indigo-500">
                    <i class="fas fa-home"></i> Home
                </button>
            </div>
        </div>

         <!-- CONTAINER USED FOR BEING ABLE TO DEFINE PRODUCTS TO THE INVENTORY BASED ON AN ID -->
        <!-- USES THE DEFINITION CITED FROM THE CONTROLLER TO BE ABLE TO FILTER ACCORDINGLY WITH THE CHAR DEFINED IN THE DB -->

        <!-- THANK YOU, BASANTA AND MUNEEB FOR THE IMPL. OF FOREACH -->

        <div class="container mx-auto px-4 pb-12">
            <div class="grid grid-cols-4 gap-10 bg-gray-200 p-6 rounded-lg shadow-md transition-all duration-300" id="INVENTORY">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md p-4 text-center transform transition-all duration-300">
                        <div class="absolute top-2 right-2">
                            <span class="text-xs flex items-center gap-1 text-gray-500">
                            <i class="fas {{ $TYPE_ICONS[$product->product_type] ?? 'fa-box' }}"></i>
                            </span>
                        </div>
                        <div class="mt-3">
                            <div class="text-lg font-bold">{{ strtoupper($product->product_name) }}</div>
                            <div class="text-gray-700">£{{ $product->price }}</div>
                            <div class="text-sm {{ $product->stock_level > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->stock_level > 0 ? 'In Stock' : 'Out of Stock' }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
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

        function GENERATE_CARD_HTML(PRODUCT) 
        {
            // LOWER-CASE TO REFLECT DEFINE IN DB SCHEMA

            const { stock_level } = PRODUCT;

            const [STATUS, COLOUR] = stock_level === 0 
            ? ['Out of Stock', 'text-red-600'] : stock_level < 20 
            ? ['Running Low', 'text-amber-600'] : ['Sufficient Stock', 'text-green-600'];

        return `
            <div class="bg-white rounded-lg shadow-md p-4 text-center transform transition-all duration-300">
                <div class="absolute top-2 right-2">
                    <span class="text-xs flex items-center gap-1 text-gray-500">
                        <i class="fas ${TYPE_ICONS[PRODUCT.product_type]}"></i>
                    </span>
                </div>
                    <div class="mt-3">
                    <div class="text-lg font-bold">${PRODUCT.product_name.toUpperCase()}</div>
                    <div class="text-gray-700">£${PRODUCT.price}</div>
                    <div class="text-sm ${COLOUR}">
                    ${STATUS}
                        </div>
                    </div>
                </div>
            `;
        }


        function FILTER_PRODUCTS(FILTER_TYPE) 
        {
            const GRID = document.getElementById('INVENTORY');
            let FILTERED_PRODUCTS = PRODUCTS;

            if (FILTER_TYPE !== 'ALL') 
            {
                FILTERED_PRODUCTS = PRODUCTS.filter(PRODUCT => PRODUCT.product_type.trim().toUpperCase() === FILTER_TYPE);
            }


            const ITEMS_COUNT = FILTERED_PRODUCTS.length;
            const ROWS = Math.ceil(ITEMS_COUNT / 4);

            GRID.style.gridTemplateRows = `repeat(${ROWS}, minmax(0, 1fr))`;

            let GRID_HTML = '';
            FILTERED_PRODUCTS.forEach(PRODUCT => 
            {
                GRID_HTML += GENERATE_CARD_HTML(PRODUCT);
            });

            GRID.style.transition = 'all 0.3s ease-in-out';
            GRID.innerHTML = GRID_HTML;
        }

        FILTER_PRODUCTS('ALL');
    </script>
</body>
</html>
