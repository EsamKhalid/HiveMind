<!DOCTYPE html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>

    <!-- TFW YOU TRY TO BE SMART AND ADD THIS TO ANOTHER CSS FILE --->
     <!-- BUT VITE SAYS NUH UH AND BREAKS EVERYTHING --->

    <style>
        .search-input 
        {
            width: 0;
            padding: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }
        
        .search-input.active 
        {
            width: 12rem;
            padding: 0.5rem 1rem;
            visibility: visible;
        }
        
        .navbar 
        {
            background-color: #FFC107;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="overflow-hidden">
        <nav class="navbar">
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
                    placeholder="Search"
                    class="search-input bg-white text-gray-800 placeholder-gray-500 rounded-full shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-700"
                />
                <button
                    type="button"
                    onclick="TOGGLE_SEARCH()"
                    class="text-white hover:text-gray-200"
                >
                    <i class="fas fa-search fa-xl"></i>
                </button>
            </div>
        </nav>
    </div>
    <script>

        function TOGGLE_SEARCH() 
        {
            const SEARCH = document.querySelector('.search-input');
            SEARCH.classList.toggle('active');

            if (SEARCH.classList.contains('active')) 
            {
                SEARCH.focus();
            }
        }

    </script>
</body>