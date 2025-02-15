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
    <!-- FOR THE TIME BEING, THIS INCLUDES HARD CODED PRODUCT TYPES USED FOR THE MEANS OF TESTING -->

    <!-- FULL DB INTEGRATION WILL COME SOON ONCE I GET THE GO AHEAD FROM EVERYONE ELSE -->

    <!-- FILTER PRODUCTS WILL AIM TO TAKE IN A CHAR ARGUMENT REPRESENTING THE TYPE -->

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
                <button onclick="FILTER_PRODUCTS('MERCH')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-blue-600 hover:bg-blue-500">
                    <i class="fas fa-tshirt"></i> Merch
                </button>
                <button onclick="FILTER_PRODUCTS('HOME')" class="flex items-center gap-2 px-4 py-2 text-white rounded-lg transition-colors whitespace-nowrap bg-indigo-600 hover:bg-indigo-500">
                    <i class="fas fa-home"></i> Home
                </button>
            </div>
        </div>

        <!-- CONTAINER USED FOR BEING ABLE TO DEFINE PRODUCTS TO THE INVENTORY BASED ON AN ID -->
        <!-- THIS WILL BE USED FOR DYNAMIC INSERTIONS -->

        <div class="container mx-auto px-4 pb-12">
            <div class="grid grid-cols-4 gap-10 bg-gray-200 p-6 rounded-lg shadow-md transition-all duration-300" id="INVENTORY"></div>
        </div>
    </div>
    <script>

        // NOW CREATE THE GRID BASED ON THE INVENTORY CONTAINER DEFINED ABOVE

        const GRID = document.getElementById('INVENTORY');

        // COLOURS FOR THE PRODUCT LABELS

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

        // WHAT IT SAYS ON THE TIN

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

        // FUNCTION TO GENERATE RANDOM INFORMATION PERTAINING TOWARDS THE PRODUCTS
        // AND THE RESPECTIVE INFORMATIOPN DEFINED IN THEIR ARRAY

        // THIS WILL BE REPLACED WITH THE DB INTEG. AT SOME POINT

        function PRODUCT_GEN() 
        {
            const PRODUCTS = [];
            let POS = 0;

            Object.entries(PRODUCT_TYPES).forEach(([TYPE, CATEGORY]) => 
            {
                CATEGORY.ITEMS.forEach(ITEM => 
                {
                    PRODUCTS.push({
                        TITLE: ITEM,
                        PRICE: `$${(Math.random() * 50 + 10).toFixed(2)}`,
                        STOCK: Math.random() > 0.2 ? 'In Stock' : 'Out of Stock',
                        SIZES: CATEGORY.SIZES[ITEM],
                        TYPE: TYPE,
                        POSITION: POS++
                    });
                });
            });

            return PRODUCTS;
        }

        function GENERATE_CARD_HTML(PRODUCT) 
        {
            const ELEMENTS = 
            [
                `<div class="bg-white rounded-lg shadow-md p-4 text-center transform transition-all duration-300">`,
                    `<div class="absolute top-2 right-2">`,
                        `<span class="text-xs flex items-center gap-1 text-gray-500">`,
                            `<i class="fas ${TYPE_ICONS[PRODUCT.TYPE]}"></i>`,
                        `</span>`,
                    `</div>`,
                    `<div class="mt-3">`,
                        `<div class="text-lg font-bold">${PRODUCT.TITLE}</div>`,
                        `<div class="text-gray-700">${PRODUCT.PRICE}</div>`,
                        `<div class="text-sm ${PRODUCT.STOCK === 'In Stock' ? 'text-green-600' : 'text-red-600'}">${PRODUCT.STOCK}</div>`,
                        `<div class="text-sm text-gray-600">Sizes: ${PRODUCT.SIZES.join(', ')}</div>`,
                    `</div>`,
                `</div>`
            ];

            return ELEMENTS.join('');
        }

        // ASSUME THAT THE AVAILABLE PRODUCTS ARE ALL

        let ALL_PRODUCTS = PRODUCT_GEN();

        // HANDLES THE FILTERING OF PRODUCTS BASED ON THE SELECTED CATEGORY
        // IT UPDATES THE GRID TO DISPLAY ONLY THE RELEVANT PRODUCTS

        function FILTER_PRODUCTS(FILTER_TYPE) 
        {
            let FILTERED_PRODUCTS = ALL_PRODUCTS;

            if (FILTER_TYPE !== 'ALL') 
            {
                FILTERED_PRODUCTS = ALL_PRODUCTS.filter(PRODUCT => PRODUCT.TYPE === FILTER_TYPE);
            }

            const ITEMS_COUNT = FILTERED_PRODUCTS.length;
            const ROWS = Math.ceil(ITEMS_COUNT / 4);

            // REPEAT FOR EVERY SUBSEQUENT ROW
            // THIS REPEAT OF ELEMENTS IS ENTIRELY DEPENDANT ON HOW MANY ELEMENTS ARE THERE

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