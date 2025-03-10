<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Terms and Conditions</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="transition-all ease-in-out duration-1000 transform bg-yellow-50 dark:bg-stone-950 dark:text-white">
        <header>@include('layouts.navbar')</header>
        <div class="faqPage">
            <h2 class="text-5xl font-semibold text-yellow-950 dark:text-yellow-200 tracking-tight sm:text-7xl text-center py-6"> Terms and Conditions </h2>
            <br/>
            <div class="text-center">
                <div class="p-6 rounded-lg mt-8 ">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Legal Information</h2>
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
                <div class="p-6 rounded-lg mt-8 ">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Use of Content</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Intellectual Property Rights</h3>
                                <p class="text-lg">Unless otherwise stated, HiveMind owns the intellectual property rights for all material on HiveMind.</p>
                                <p class="text-lg">All intellectual property rights are reserved.</p>
                                <p class="text-lg">You may view and/or print pages from <a href="{{ route('home') }}" class="text-lg text-blue-500 dark:text-amber hover:underline">HiveMind</a> for your own personal use subject to restrictions set in these terms and conditions.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg mt-8 ">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Restrictions</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <ul class="list-disc list-inside text-left">
                                <li>It is not permitted to republish material from <a href="{{ route('home') }}" class="text-lg text-blue-500 dark:text-amber hover:underline">HiveMind</a></li>
                                <li>Do not sell, rent or sub-license material from <a href="{{ route('home') }}" class="text-lg text-blue-500 dark:text-amber hover:underline">HiveMind</a></li>
                                <li>Do not reproduce, duplicate or copy material from <a href="{{ route('home') }}" class="text-lg text-blue-500 dark:text-amber hover:underline">HiveMind</a></li>
                                <li>Do not redistribute content from <a href="{{ route('home') }}" class="text-lg text-blue-500 dark:text-amber hover:underline">HiveMind</a> (unless authorised).</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg mt-8 ">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Buying Goods from HiveMind</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Purchasing Products</h3>
                                <p class="text-lg">When you purchase products from HiveMind, you are supporting our mission to save bees and promote sustainable beekeeping practices.</p>
                                <p class="text-lg">All proceeds go towards our charitable activities.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Delivery</h3>
                                <p class="text-lg">We aim to deliver your products within 5-7 working days.</p>
                                <p class="text-lg">Please note that delivery times may vary depending on your location and the availability of the products.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Additional Charges</h3>
                                <p class="text-lg">Additional charges may apply for delivery outside of the UK.</p>
                                <p class="text-lg">Please check our delivery policy for more information.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Returns</h3>
                                <p class="text-lg">If you are not satisfied with your purchase, you may return the product within 14 days.</p>
                                <p class="text-lg">Please check our returns policy for more information.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Cancelling Orders</h3>
                                <p class="text-lg">You may cancel your order within 24 hours of purchase.</p>
                                <p class="text-lg">Please check our cancellation policy for more information.</p>
                            </div>
                            <div class="mb-4">
                                <h3 class="text-xl font-semibold text-yellow-600 dark:text-yellow-200">Contact Us</h3>
                                <p class="text-lg">If you have any questions or concerns, please contact us using our <a href="{{ route('contact') }}" class="text-lg text-blue-500 dark:text-amber hover:underline">contact form</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 rounded-lg mt-8 ">
                    <h2 class="text-3xl font-bold text-yellow-800 dark:text-yellow-400 mb-4">Donation Links</h2>
                    <div class="flex justify-center">
                        <div class="p-4 rounded-lg shadow-md bg-stone-100 dark:bg-stone-800 dark:shadow-stone-900 w-[80%] sm:w-1/2 md:w-1/3">
                            <ul class="list-disc list-inside text-left">
                                <li class="mb-2">
                                    <a href="https://www.projectapism.org/" class="text-blue-500 dark:text-amber hover:underline">Project Apis m.</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.nwf.org/" class="text-blue-500 dark:text-amber hover:underline">National Wildlife Federation</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://xerces.org/" class="text-blue-500 dark:text-amber hover:underline">The Xerces Society</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.pollinator.org/" class="text-blue-500 dark:text-amber hover:underline">Pollinator Partnership</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.beesfordevelopment.org/" class="text-blue-500 dark:text-amber hover:underline">Bees for Development</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.planetbee.org/" class="text-blue-500 dark:text-amber hover:underline">Planet Bee Foundation</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://thebeeconservancy.org/" class="text-blue-500 dark:text-amber hover:underline">The Bee Conservancy</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://www.beeandbutterflyfund.org/" class="text-blue-500 dark:text-amber hover:underline">The Bee & Butterfly Habitat Fund</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://karmahoneyproject.com/" class="text-blue-500 dark:text-amber hover:underline">Karma Honey Project</a>
                                </li>
                                <li class="mb-2">
                                    <a href="https://britishbeecharity.com/" class="text-blue-500 dark:text-amber hover:underline">The British Bee Charity</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <br/>
            <br/>
            @include('layouts.footer')
        </div>
    </body>
</html>
