<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    <header></header>
    @include('layouts.navbar')

    <main class="flex-grow">
        <div class="flex justify-center m-4">
            <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
                <p class="text-6xl mb-8 text-center">Checkout</p>
                <form action="{{ route('checkout.saveAddress') }}" method="post" class="space-y-4">
                    @csrf
                    <div>
                        <label for="street_address" class="block text-sm font-medium text-gray-700">Street Address</label>
                        <input type="text" name="street_address" id="street_address" required class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"  />
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="city" id="city" required class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"  />
                    </div>
                    <div>
                        <label for="county" class="block text-sm font-medium text-gray-700">County</label>
                        <input type="text" name="county" id="county" required class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"  />
                    </div>
                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                        <input type="text" name="country" id="country" required class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm"  />
                    </div>
                    <div>
                        <label for="post_code" class="block text-sm font-medium text-gray-700">Post Code</label>
                        <input type="text" name="post_code" id="post_code" required class="mt-1 block w-full p-3 border border-black rounded-md shadow-sm focus:ring-amber focus:border-amber sm:text-sm" />
                    </div>
                    <input type="hidden" name="type" value="shipping" />
                    <div>
                        <button type="submit" class="w-full bg-amber text-white py-2 px-4 rounded-md hover:text-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber">Go To Confirmation</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>