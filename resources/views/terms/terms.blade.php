<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Frequently Asked Questions</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class='bg-yellow-50'>
        <header>@include('layouts.navbar')</header>
        <div class="faqPage text-center bg-yellow-50">
            <h2 class="text-5xl font-semibold tracking-tight sm:text-7xl text-center py-6"> Terms and Conditions </h2>
            <br/>
            <div class=" p-6 rounded-lg text-black">
                <h2 class="text-3xl font-bold mb-4">Legal Infomation</h2>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold">What is HiveMind?</h3>
                    <p class="text-lg">HiveMind is an organization dedicated to saving bees and promoting sustainable beekeeping practices.</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold">How can I support HiveMind?</h3>
                    <p class="text-lg">You can support HiveMind by donating, volunteering, or spreading awareness about our cause.</p>
                </div>
            </div>
        
            <div class="p-6 rounded-lg mt-8 text-black">
                <h2 class="text-3xl font-bold mb-4">Donations</h2>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold">How to Make a Donation</h3>
                    <p class="text-lg">You can make a donation through The British Bee Charity <a href="https://www.paypal.com/donate/?hosted_button_id=VZZ8YQ994DXUE" class="text-blue-500 hover:underline text-center">donation page</a>.</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Tax-Deductible Donations</h3>
                    <p class="text-lg">Yes, all donations to HiveMind are tax-deductible to the extent allowed by law. </p>
                    <p class="text-lg">Please consult with your tax advisor for more information.</p>
                </div>
            </div>
        
            <div class="p-6 rounded-lg mt-8 text-black">
                <h2 class="text-3xl font-bold mb-4">Use of Content</h2>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Intellectual Property Rights</h3>
                    <p class="text-lg">Unless otherwise stated, HiveMind and/or its licensors own the intellectual property rights for all material on HiveMind. </p>
                    <p class="text-lg">All intellectual property rights are reserved. You may view and/or print pages from <a href="hivemind.test"> Hivemind. </a></p> 
                    <p class="text-lg">Your own personal use subject to restrictions set in these terms and conditions.</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Restrictions</h3>
                    <p class="text-lg">You must not:
                        <ul class="list-disc list-inside">
                            <li>Republish material from <a href="{{ route('home') }}" class="text-lg text-blue-500 hover:underline">HiveMind</a></li>
                            <li>Sell, rent or sub-license material from <a href="{{ route('home') }}" class="text-lg text-blue-500 hover:underline">HiveMind</a></li>
                            <li>Reproduce, duplicate or copy material from <a href="{{ route('home') }}" class="text-lg text-blue-500 hover:underline">HiveMind</a></li>
                            <li>Redistribute content from <a href="{{ route('home') }}" class="text-lg text-blue-500 hover:underline">HiveMind </a>(unless content is specifically made for redistribution).</li>
                        </ul>
                    </p>
                </div>
            </div>

            <div class="p-6 rounded-lg mt-8 text-black">
                <h2 class="text-3xl font-bold mb-4">Donation Links</h2>
                <ul>
                    <li class="mb-2">
                        <a href="https://www.projectapism.org/" class="text-black hover:text-blue-500
                        font-bold">Project Apis m.</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.nwf.org/" class="text-black hover:text-blue-500 
                        font-bold">National Wildlife Federation</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://xerces.org/" class="text-black hover:text-blue-500 
                        font-bold">The Xerces Society</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.pollinator.org/" class="text-black hover:text-blue-500 
                        font-bold">Pollinator Partnership</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.beesfordevelopment.org/" class="text-black hover:text-blue-500 
                        font-bold">Bees for Development</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.planetbee.org/" class="text-black hover:text-blue-500 
                        font-bold">Planet Bee Foundation</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://thebeeconservancy.org/" class="text-black hover:text-blue-500 
                        font-bold">The Bee Conservancy</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.beeandbutterflyfund.org/" class="text-black hover:text-blue-500 
                        font-bold">The Bee & Butterfly Habitat Fund</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://karmahoneyproject.com/" class="text-black hover:text-blue-500 
                        font-bold">Karma Honey Project</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://britishbeecharity.com/" class="text-black hover:text-blue-500 
                        font-bold">The British Bee Charity</a>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <br/>
            <br/>
            @include('layouts.footer')
        </div>
    </body>
</html>
