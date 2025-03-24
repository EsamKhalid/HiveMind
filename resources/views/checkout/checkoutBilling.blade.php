<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    @include('layouts.navbar')
    <body class="bg-stone-300 rounded-lg dark:bg-stone-800 transition-colors transition-all">
        <main class="bg-white dark:bg-stone-950">
            @if ($errors->any())
            <div
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 w-96"
            >
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flex justify-center m-4">
                <div class="inline-block">
                    <p class="text-6xl mb-5 dark:text-white">Payment Details</p>
                    <form
                        action="{{ route('checkout.storeBillingInformation') }}"
                        method="POST"
                        class="bg-stone-300 p-3 rounded-lg dark:bg-stone-800 transition-colors duration-1000"
                    >
                        @csrf
                        <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="name" class="xl:w-full mx-auto block text-center text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Name</label>
                                    <input type="text" name="name" id="name" placeholder="Name on card"
                                        required class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <input type="hidden" name="type" value="billing" />
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="address" class="xl:w-full mx-auto block text-center text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Billing Address</label>
                                    <input type="text" name="address" id="address" placeholder="Billing Address" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="card_number" class="xl:w-full mx-auto block text-center text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Card Number</label>
                                    <input type="text" name="card_number" id="card_number" placeholder="Card Number" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>

                                <div class="flex flex-row items-start w-[90%] mx-auto justify-between align-center">
                                    <div class="w-1/2">
                                    <label for="expiry_date" class=" mr-2 block text-black text-center dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Expiry Date</label>
                                    <input type="date" name="expiry_date" id="expiry_date" placeholder="Expiry date" required
                                        class="w-[90%] mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                    </div>
                                    <div class="w-1/2">
                                        <label for="cvv" class="mx-auto block text-black text-center dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">CVV</label>
                                    <input type="text" name="cvv" id="cvv" placeholder="CVV" required
                                        class="w-[90%] mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                    </div>
                                    </div>

                                <div class="flex justify-center mt-5">
                                    <button type="submit"
                                        class="bg-green-400 dark:bg-green-700 text-black py-2 px-6 rounded-md hover:text-white transition-colors duration-1000">Confirm Order</button>
                                </div>
                    </form>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body class="transition-none" >
</html>
