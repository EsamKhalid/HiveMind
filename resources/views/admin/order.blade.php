<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Reorder</title>
</head>

<body class="transition-none dark:bg-stone-900 transition-all duration-1000 w-">
    <header></header>
    @include('layouts.sidebar')
    <main>
        <div class="flex justify-center m-4">
            <div class="card bg-yellow-50 dark:bg-stone-700 p-6 rounded-lg shadow-md text-center w-1/2">
                <h1 class="text-4xl font-bold mb-6 dark:text-amber text-wrap">Stock Reorder for: {{$product->product_name}}</h1>

                <form action="{{ route('admin.order') }}"  method="post" id="reorder-form" class="mt-4">
                    @csrf
                    @method('PATCH')
                    <div class="flex flex-col items-center mb-4">
                        <label for="product_id" class="block text-gray-600 dark:text-white mb-2 hidden">Product Type</label>
                        <input type="text" name="product_id" class="w-1/2 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300 hidden" value="{{$product->id}}"/> 
                    </div>
                    <div class="flex flex-col items-center mb-4">
                        <label for="stock_quantity" class="block text-gray-600 dark:text-white mb-2">Quantity</label>
                        <input type="text" name="stock_quantity" class="w-1/2 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" required />
                    </div>
                    
                    <div class="flex flex-col items-center mb-4">
                        <label for="supplier_id" class="block text-gray-600 dark:text-white mb-2">Supplier</label>
                        <select name="supplier_id" class="w-1/2 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300">
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id}}">{{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col items-center mb-4">
                        <label for="lead_time" class="block text-gray-600 dark:text-white mb-2">Lead Time</label>
                        <input type="tel" name="lead_time" class="w-1/2 p-3 mb-4 border border-gray-300 rounded dark:bg-stone-300" required />
                    </div>
                    <a class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:underline dark:bg-stone-900 dark:hover:text-amber" href="{{ route('supplier.create') }}">Add Supplier</a>
                    <button type="submit" class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:underline dark:bg-stone-900 dark:hover:text-amber">Reorder</button>
                </form>
    
                <a href="{{ route('admin.inventory') }}" class="text-lg font-bold text-blue-500 hover:underline dark:text-orange-300 mt-4 block">
                    Back to Inventory
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