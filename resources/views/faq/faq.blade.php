<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Frequently Asked Questions 🐝</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="transition-all ease-in-out duration-1000 transform bg-yellow-50 dark:bg-stone-950 dark:text-white">
        <header>@include('layouts.navbar')</header>
        <main>
        <div class="faqPage">
            <h2 class="text-5xl font-semibold text-yellow-950 dark:text-yellow-200 tracking-tight sm:text-7xl text-center py-6"> Frequently Asked Questions </h2>
            <br/>
            <div class="text-center">
                <div class="p-6 rounded-lg">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">General Questions</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">What is HiveMind?</h3>
                                <p class="text-lg">HiveMind is an organization dedicated to saving bees and promoting sustainable beekeeping practices.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">How can I support HiveMind?</h3>
                                <p class="text-lg">You can support HiveMind by donating, volunteering, or spreading awareness about our cause.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Donation Questions</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">How do I make a donation?</h3>
                                <p class="text-lg">You can make a donation through The British Bee Charity <a href="https://www.paypal.com/donate/?hosted_button_id=VZZ8YQ994DXUE" class="text-blue-500 hover:underline">donation page</a>.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Is my donation tax-deductible?</h3>
                                <p class="text-lg">Yes, all donations to HiveMind are tax-deductible to the extent allowed by law.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Donation Links</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <ul class="list-disc list-inside text-left">
                                <li class="mb-2">
                                    <a href="https://www.projectapism.org/" class="hover:text-blue-500">Project Apis m.</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.nwf.org/" class="hover:text-blue-500">National Wildlife Federation</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://xerces.org/" class="hover:text-blue-500">The Xerces Society</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.pollinator.org/" class="hover:text-blue-500">Pollinator Partnership</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.beesfordevelopment.org/" class="hover:text-blue-500">Bees for Development</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.planetbee.org/" class="hover:text-blue-500">Planet Bee Foundation</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://thebeeconservancy.org/" class="hover:text-blue-500">The Bee Conservancy</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.beeandbutterflyfund.org/" class="hover:text-blue-500">The Bee & Butterfly Habitat Fund</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://karmahoneyproject.com/" class="hover:text-blue-500">Karma Honey Project</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://britishbeecharity.com/" class="hover:text-blue-500">The British Bee Charity</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Cancellation Policy</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">How can I cancel my order?</h3>
                                <p class="text-lg">You may cancel your order within 24 hours of purchase. </p>
                                <p class="text-lg"> Please press the cancel order button on the <a href="{{ route('orders') }}" class="text-blue-500 hover:underline">orders</a> page to request a cancellation.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">What if my order has already been shipped?</h3>
                                <p class="text-lg">If your order has already been shipped, you may need to follow our returns policy to return the product for a refund.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Delivery Policy</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">How long does delivery take?</h3>
                                <p class="text-lg">We aim to deliver your products within 5-7 working days. </p>
                                <p class="text-lg"> Please note that delivery times may vary depending on your location and the availability of the products.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Are there additional charges for delivery?</h3>
                                <p class="text-lg">Additional charges may apply for delivery outside of the UK.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Returns Policy</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold">What is our returns policy?</h3>
                                <p class="text-lg">If you are not satisfied with your purchase, you may return the product within 14 days. Please check our returns guide below for more information.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold">How do I return a product?</h3>
                                <p class="text-lg">Please press the cancel order button on the <a href="{{ route('orders') }}" class="text-blue-500 hover:underline">orders</a> page to proceed with the return.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
            @include('layouts.footer')
    </body>
</html>