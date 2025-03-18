<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Return</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-stone-950 min-h-screen transition-colors duration-1000">
    @include('layouts.navbar')

    <header class="bg-white dark:bg-stone-900 shadow-md py-6 transition-colors duration-1000">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-3xl font-bold text-stone-950 dark:text-yellow-400 transition-colors duration-1000">Request a Return</h1>
        </div>
    </header>

    <main class="max-w-4xl mx-auto mt-6 mb-12 p-6 bg-white dark:bg-stone-800 shadow-lg rounded-lg transition-colors duration-1000">
        <form action="{{ route('orders.return.submit', $order->id) }}" method="POST" onsubmit="return validateForm();">
            @csrf

            <input type="hidden" name="return_date" value="{{ now()->format('Y-m-d') }}">

            <h2 class="text-xl font-semibold mb-4 text-stone-950 dark:text-yellow-400 transition-colors duration-1000">Select Items to Return</h2>
            @foreach ($order->orderItems as $item)
                <div class="mb-4">
                    <input type="checkbox" name="items[]" value="{{ $item->id }}" id="item-{{ $item->id }}" class="dark:bg-stone-700 dark:text-yellow-200">
                    <label for="item-{{ $item->id }}" class="ml-2 text-stone-950 dark:text-yellow-200 transition-colors duration-1000">
                        {{ $item->products->product_name }}
                        - Quantity: {{ $item->quantity }}
                        - Total Price: £{{ number_format($item->products->price * $item->quantity, 2) }}
                    </label>
                </div>
            @endforeach

            <h2 class="text-xl font-semibold mt-6 mb-4 text-stone-950 dark:text-yellow-400 transition-colors duration-1000">Reason for Return (Required)</h2>
            <select name="reason" required class="w-full p-2 border rounded dark:bg-stone-700 dark:text-yellow-200">
                <option value="" disabled selected hidden>Choose a response</option>
                <option value="Defective Item">Item is defective or does not work</option>
                <option value="Damaged Item & Box">The item and delivery box are both damaged</option>
                <option value="Wrong Item Sent">Wrong item was sent</option>
                <option value="Accidental Order">Accidental order</option>
                <option value="No longer needed">No longer needed</option>
                <option value="Missing parts">Missing parts or accessories</option>
                <option value="Not as Described">Description on website was not accurate</option>
                <option value="Performance Issue">Performance or quality not adequate</option>
                <option value="Other">Other</option>
            </select>

            <h2 class="font-semibold mt-6 mb-4 text-stone-950 dark:text-yellow-400 transition-colors duration-1000">Comments (Optional)</h2>
            <textarea name="comments" rows="4" class="w-full border border-gray-300 rounded p-2 dark:bg-stone-700 dark:text-yellow-200"></textarea>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded mt-6 mr-2 hover:bg-blue-600 transition-colors duration-1000">
                Request Return
            </button>
            <a href="{{ route('orders') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors duration-1000">
                Cancel
            </a>
        </form>
    </main>

    @include('layouts.footer')

    <script>
        function validateForm() {
            let checkboxes = document.querySelectorAll('input[name="items[]"]:checked');
            if (checkboxes.length === 0) {
                alert("Please select at least one item to return.");
                return false;
            }
            return true;
        }
    </script>

</body>

</html>