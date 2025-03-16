<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supplier</title>
</head>

<body class="transition-none dark:bg-stone-900 transition-all duration-1000 w-">
    <header></header>
    @include('layouts.sidebar')
    <main>
        <div class="flex justify-center m-4">
            <div class="card bg-yellow-50 dark:bg-stone-700 p-6 rounded-lg shadow-md text-center w-1/2">
                <h1 class="text-4xl font-bold mb-6 dark:text-amber text-wrap">Add Supplier</h1>

                <form action="{{ route('supplier.create') }}" method="post" id="add-supplier-form" class="mt-4">
                    @csrf

                    <div class="flex flex-col items-center mb-4">
                        <label for="supplier_name" class="block text-gray-600 dark:text-white mb-2">Supplier Name</label>
                        <input type="text" name="supplier_name" class="w-1/2 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" required />
                    </div>

                    <div class="flex flex-col items-center mb-4">
                        <label for="supplier_email" class="block text-gray-600 dark:text-white mb-2">Supplier Email</label>
                        <input type="email" name="supplier_email" class="w-1/2 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" required />
                    </div>

                    <div class="flex flex-col items-center mb-4">
                        <label for="supplier_phone" class="block text-gray-600 dark:text-white mb-2">Supplier Phone</label>
                        <input type="tel" name="supplier_phone" class="w-1/2 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" required />
                    </div>

                    <button type="submit" class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:underline dark:bg-stone-900 dark:hover:text-amber" onclick="{{ route('admin.order') }}">Add Supplier</button>
                </form>

                <a href="{{ route('admin.inventory') }}" class="text-lg font-bold text-blue-500 hover:underline dark:text-orange-300 mt-4 block">
                    Navigate to Inventory
                </a>
                <a href="{{ route('admin.order') }}" class="text-lg font-bold text-blue-500 hover:underline dark:text-orange-300 mt-4 block">
                    Back to Stock Order
                </a>
            </div>
        </div>
    </main>
</body>

</html>