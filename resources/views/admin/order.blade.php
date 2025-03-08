<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Order</title>
</head>

<body class="dark:bg-stone-900 transition-all duration-1000 w-screen">
    <header></header>
    @include('layouts.sidebar')

    <main>
        <div class="flex justify-center m-4">
            <div class="card bg-yellow-50 dark:bg-stone-700 p-6 rounded-lg shadow-md text-center">
                <p class="text-4xl mb-6">Stock Order for: {{ $product->product_name }}</p>

                <form action="{{ route('admin.order') }}" method="post" id="stock-order-form" class="mt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />

                    <h1 class="text-3xl font-bold mb-6 dark:text-amber">Stock Order</h1>

                    <div class="flex flex-col items-center mb-4">
                        <label for="stock_quantity" class="block text-gray-600 dark:text-white mb-2">Stock Quantity</label>
                        <input type="number" name="stock_quantity" class="w-1/4 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" required min="1" />
                    </div>

                    <div class="flex flex-col items-center mb-4">
                        <label for="lead_time" class="block text-gray-600 dark:text-white mb-2">Lead Time (in days)</label>
                        <input type="number" name="lead_time" class="w-1/4 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" required min="0" />
                    </div>

                    <h1 class="text-3xl font-bold mb-6 dark:text-amber">Supplier Details</h1>

                    <div class="flex flex-col items-center mb-4">
                        <label for="supplier_id" class="block text-gray-600 dark:text-white mb-2">Select Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="w-1/4 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" required>
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" name="{{ $supplier->supplier_name }}"
                                    email="{{ $supplier->supplier_email }}" phone="{{ $supplier->supplier_phone }}">
                                    {{ $supplier->supplier_name }} - {{ $supplier->supplier_email }} -
                                    {{ $supplier->supplier_phone }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:underline dark:bg-stone-900 dark:hover:text-amber">Record Stock Order</button>
                </form>

                <a href="{{ route('supplier.create') }}" class="text-lg font-bold text-blue-500 hover:underline dark:text-orange-300 mt-4 block">
                    Click to add new supplier
                </a>
            </div>
        </div>
    </main>
</body>

</html>