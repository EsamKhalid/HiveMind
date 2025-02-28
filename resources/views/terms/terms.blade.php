<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Frequently Asked Questions</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>@include('layouts.navbar')</header>
        <div class="faqPage text-center">
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
        
            <div class=" p-6 rounded-lg  mt-8 text-black">
                <h2 class="text-3xl font-bold mb-4">Donation Questions</h2>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold">How do I make a donation?</h3>
                    <p class="text-lg">You can make a donation through The British Bee Charity <a href="https://www.paypal.com/donate/?hosted_button_id=VZZ8YQ994DXUE" 
                        class="text-blue-500 hover:underline">donation page</a>.</p>
                </div>
                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Is my donation tax-deductible?</h3>
                    <p class="text-lg">Yes, all donations to HiveMind are tax-deductible to the extent allowed by law.</p>
                </div>
            </div>
        
            <div class=" p-6 rounded-lg  mt-8 text-orange">
                <h2 class="text-3xl font-bold mb-4">Resources</h2>
                <ul>
                    <li class="mb-2">
                        <a href="https://www.projectapism.org/" class="text-black hover:text-blue
                        font-bold">Project Apis m.</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.nwf.org/" class="text-black hover:text-blue
                        font-bold">National Wildlife Federation</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://xerces.org/" class="text-black hover:text-blue
                        font-bold">The Xerces Society</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.pollinator.org/" class="text-black hover:text-blue
                        font-bold">Pollinator Partnership</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.beesfordevelopment.org/" class="text-black hover:text-blue 
                        font-bold">Bees for Development</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.planetbee.org/" class="text-black hover:text-blue
                        font-bold">Planet Bee Foundation</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://thebeeconservancy.org/" class="text-black hover:text-blue
                        font-bold">The Bee Conservancy</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://www.beeandbutterflyfund.org/" class="text-black hover:text-blue 
                        font-bold">The Bee & Butterfly Habitat Fund</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://karmahoneyproject.com/" class="text-black hover:text-blue
                        font-bold">Karma Honey Project</a>
                    </li>
                    <li class="mb-2">
                        <a href="https://britishbeecharity.com/" class="text-black hover:text-blue
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
