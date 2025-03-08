<!DOCTYPE html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100 min-h-screen flex flex-col">
    <div class="overflow-hidden">
        <nav class="bg-yellow-500 p-4 flex justify-between items-center">
            <a href="#" class="flex items-center hover:text-gray-200 duration-200">
                <img
                    src="{{ asset('../Images/HiveMind Logo.png') }}"
                    alt="HiveMind Logo"
                    class="h-12 w-auto mr-3"
                />
            </a>
            @include('layouts.searchbar')
        </nav>
    </div>
</body>
