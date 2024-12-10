<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100">
        <header></header>
        @include('layouts.navbar')

        <main class="py-10">
            <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-8">
                <h1 class="text-4xl font-semibold text-gray-800 text-center mb-8">
                    Checkout
                </h1>

                <form action="{{ route('checkout.saveAddress') }}"
                    method="post"
                    class="space-y-5">
                    @csrf
                    <div>
                        <label for="street_address" class="block text-gray-700 font-medium mb-1">
                            Street Address
                        </label>
                        <input
                            type="text"
                            name="street_address"
                            class="w-full border border-gray-300 rounded-md p-2"
                            required
                        />
                    </div>
                    <div>
                        <label for="city" class="block text-gray-700 font-medium mb-1">
                            City
                        </label>
                        <input
                            type="text"
                            name="city"
                            class="w-full border border-gray-300 rounded-md p-2"
                            required
                        />
                    </div>
                    <div>
                        <label for="county" class="block text-gray-700 font-medium mb-1">
                            County
                        </label>
                        <input
                            type="text"
                            name="county"
                            class="w-full border border-gray-300 rounded-md p-2"
                            required
                        />
                    </div>
                    <div>
                        <label for="country" class="block text-gray-700 font-medium mb-1">
                            Country
                        </label>
                        <input
                            type="text"
                            name="country"
                            class="w-full border border-gray-300 rounded-md p-2"
                            required
                        />
                    </div>
                    <div>
                        <label for="post_code" class="block text-gray-700 font-medium mb-1">
                            Post Code
                        </label>
                        <input
                            type="text"
                            name="post_code"
                            class="w-full border border-gray-300 rounded-md p-2"
                            required
                        />
                    </div>
                    <input type="hidden" name="type" value="shipping" />

                    <div class="flex justify-center mt-8">
                        <button type="submit"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 px-6 rounded-md shadow-md transition duration-300">
                            Go To Confirmation
                        </button>
                    </div>
                </form>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
