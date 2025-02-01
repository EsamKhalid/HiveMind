<!DOCTYPE html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="overflow-hidden">
        <nav class="bg-yellow-500 p-4 flex justify-between items-center">
            <a href="#" class="flex items-center hover:text-gray-200 duration-200">

                <!-- MAJORITY OF THIS FUNCTIONALITY IS TAKEN FROM OTHER LAYOUT FILES --->

                <img
                    src="{{ asset('../Images/HiveMind Logo.png') }}"
                    alt="HiveMind Logo"
                    class="h-12 w-auto mr-3"
                />
            </a>

            <div class="flex items-center space-x-4">
                <input
                    type="text"
                    name="search"
                    id="SEARCH-IO"
                    placeholder="Search"
                    class="w-0 p-0 opacity-0 transition-all duration-300 ease-in-out bg-white text-gray-800 rounded-full shadow-lg focus:outline-none"
                />

                <button
                    type="button"
                    onclick="TOGGLE_SEARCH()"
                    class="text-red-700 hover:text-red-500">
                    <i class="fas fa-search fa-xl"></i>
                </button>
            </div>
        </nav>
    </div>
    <script>    
    function TOGGLE_SEARCH() 
    {
        const SEARCH_IO = document.getElementById('SEARCH-IO');
        const HIDDEN = SEARCH_IO.classList.toggle('w-48');
        
        SEARCH_IO.classList.toggle('w-0', !HIDDEN);
        SEARCH_IO.classList.toggle('p-0', !HIDDEN);
        SEARCH_IO.classList.toggle('opacity-0', !HIDDEN);
        SEARCH_IO.classList.toggle('p-2', HIDDEN);
        SEARCH_IO.classList.toggle('opacity-100', HIDDEN);
        
        if (HIDDEN) SEARCH_IO.focus();
    }
</script>
</body>
