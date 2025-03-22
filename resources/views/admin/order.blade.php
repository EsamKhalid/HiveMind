<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Order</title>
</head>

<body class="dark:bg-stone-900 bg-stone-200 transition:none transition-all duration-1000 w-screen">
    @include('layouts.sidebar')
    <header class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">Stock Order Page</h1>
            <p class="text-lg mt-2  text-stone-800 dark:text-yellow-200 transition-colours duration-1000">Reorder stock from suppliers here.</p>
        </div>
    </header>

    <main>
        <div class="flex justify-center m-4">
            <div class="card bg-yellow-50 dark:bg-stone-700 p-6 rounded-lg shadow-md text-center">
                <p class="text-4xl mb-6">Stock Order for: {{ $product->product_name }}</p>

                <form action="{{ route('admin.order') }}" method="post" id="stock-order-form" class="mt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />

                    <h1 class="text-3xl font-bold mb-6 dark:text-amber">Stock Order</h1>

                    <div class="flex flex-col items-center mb-4">
                        <label for="stock_quantity" class="block text-stone-600 dark:text-white mb-2">Stock Quantity</label>
                        <input type="number" name="stock_quantity" class="w-1/4 p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" required min="1" />
                    </div>

                    <div class="flex flex-col items-center mb-4">
                        <label for="lead_time" class="block text-stone-600 dark:text-white mb-2">Lead Time (in days)</label>
                        <input type="number" name="lead_time" class="w-1/4 p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" required min="0" />
                    </div>

                    <h1 class="text-3xl font-bold mb-6 dark:text-amber">Supplier Details</h1>

                    <div class="flex flex-col items-center mb-4">
                        <label for="supplier_id" class="block text-stone-600 dark:text-white mb-2">Select Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="w-1/4 p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" required>
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
        <div>
            @if(session()->has('error'))
            <!-- unsuccessful deletion-->
             {{ session()->get('error') }}
        </div>
        @elseif(session()->has('success'))
        <!-- successful deletion-->
        {{ session()->get('success') }}
        @endif
    </main>
</body>

</html>