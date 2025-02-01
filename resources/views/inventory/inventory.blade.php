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

    <div class="relative text-center mt-4">
        <h2 class="absolute inset-0 text-9xl font-bold text-gray-300 opacity-20"> 
            INVENTORY
        </h2>
        <h2 class="relative text-4xl font-bold text-gray-800 translate-y-10">INVENTORY</h2>
    </div>

    <div class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-4 gap-10 bg-gray-200 p-6 rounded-lg shadow-md max-w-fit mx-auto" id="INVENTORY">
            </div>
        </div>
    </div>

    <script>
        
        // THE FOLLOWING WOULD DO EXACTLY AS IT WOULD IN HTML
        // THOUGH, I THOUGHT IT'D BE SIMPLER TO JUST MAKE A SCRIPT FOR IT INSTEAD

        // REMOVING THE REDUNDANT OVER-DECLARATION OF CARDS

        const GRID = document.getElementById('INVENTORY');
        const ITEMS = "w-24 h-24 bg-yellow-200 rounded-lg flex items-center justify-center shadow hover:bg-orange-400 transition-colors duration-300";
        const ICONS = "fas fa-box text-white-100 text-2xl";
        
        for (let INDEX = 0; INDEX < 8; INDEX++) 
        {
            GRID.innerHTML += 
            `
                <div class="${ITEMS}">
                    <i class="${ICONS}"></i>
                </div>
            `;
        }
    </script>
</body>
</html>
