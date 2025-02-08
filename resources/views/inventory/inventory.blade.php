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
        <div class="grid grid-cols-4 gap-10 bg-gray-200 p-6 rounded-lg shadow-md transition-all duration-300" id="INVENTORY">
        </div>
    </div>
</div>
    <script>

    // NOW CREATE THE GRID BASED ON THE INVENTORY CONTAINER DEFINED ABOVE

    const GRID = document.getElementById('INVENTORY');

    // HARD-CODED PRODUCT TYPES
    // THIS IS WHAT WILL BE CHANGED WHEN DB INTEGRATION WITH BACKEND IS FINALISED

    const PRODUCT_TYPES = 
    {
        BEAUTY:
        {
            ITEMS: [ 'Eye Shadow Palette', 'Lip Gloss', 'Nail Polish Set', 'Highligher and Blush (2 in 1)', 'Beauty Sponge', 'Honey Body Spray']
        }
    };

    function PRODUCT_GEN()
    {
        const PRODUCTS = [];
        let BOX_POS = 0;            // USED FOR DYNAMIC RESIZING IN ACCORDANCE WITH THE STYLING OF THE CLASSES

        Object.entries(PRODUCT_TYPES).foreach(([TYPE, CATEGORY]) =>
        {
            CATEGORY.ITEMS.foreach(ITEM) =>
            {
                PRODUCTS.push
                ({
                    TITLE: ITEM,
                    TYPE: TYPE,
                    POSITION: BOX_POS++;
                });
            }
        });
    }

    // ASSUME THAT THE AVAILABLE PRODUCTS ARE ALL

    let ALL_PRODUCTS = PRODUCT_GEN();
    
    function FILTER_PRODUCTS(FILTER_TYPE)
    {
        let FILTERED = ALL_PRODUCTS;
    }

    FILTER_PRODUCTS('ALL');

    </script>
</body>
</html>
