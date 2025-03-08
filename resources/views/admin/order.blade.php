<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header></header>
    @include('layouts.navbar')

    <main>
        <div class="flex justify-center m-4">
            <div class="inline-block">
                <p class="text-6xl">Stock Order for: {{ $product->product_name }}</p>

                <form action="{{ route('admin.order') }}" method="post">

                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />

                    <h1>Stock Order</h1>

                    <label for="stock_quantity">Stock Quantity</label>
                    <input type="number" name="stock_quantity" required|min:1 />
                    <br />

                    <label for="lead_time">Lead Time (in days)</label>
                    <input type="number" name="lead_time" required|min:0 />
                    <br />


                    <h1>Supplier Details</h1>

                    <label for="supplier_id">Select Supplier</label>
                    <select name="supplier_id" id="supplier_id" required>
                        <option value="">Select Supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" name="{{ $supplier->supplier_name }}"
                                email="{{ $supplier->supplier_email }}" phone="{{ $supplier->supplier_phone }}">
                                {{ $supplier->supplier_name }} - {{ $supplier->supplier_email }} -
                                {{ $supplier->supplier_phone }}
                            </option>
                        @endforeach
                    </select>
                    <br />

                    <button type="submit">Record Stock Order</button>
                </form>

                <a href="{{ route('supplier.create') }}">
                    Click to add new supplier
                </a>

            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>

</html>