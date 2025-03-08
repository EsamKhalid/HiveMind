<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header></header>
    @include('layouts.sidebar')

    <main>
        <div class="flex justify-center m-4">
            <div class="inline-block">

                <form action="{{ route('supplier.create') }}" method="post">

                    @csrf
                    <h1>Add Supplier</h1>

                    <label for="supplier_name">Supplier Name</label>
                    <input type="text" name="supplier_name" required />
                    <br />

                    <label for="supplier_email">Supplier Email</label>
                    <input type="email" name="supplier_email" required />
                    <br />

                    <label for="supplier_phone">Supplier Phone</label>
                    <input type="tel" name="supplier_phone" required />
                    <br />

                    <button type="submit">Add Supplier</button>
                </form>

                <a href="{{ route('admin.inventory') }}">
                    Navigate to Inventory
                </a>


            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>

</html>