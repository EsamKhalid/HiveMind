<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About Us</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="transition-all ease-in-out duration-1000 transform">
        <header>@include('layouts.navbar')</header>
        <div class="aboutUsPage">
            <h2
                class="text-5xl font-semibold tracking-tight text-black sm:text-7xl text-center margin-top: 1rem"
            >
                About HiveMind
            </h2>
            <br />
            <p class="text-2xl text-center font-style: italic">
                By purchasing our products, you are supporting
                <u>our mission</u> to save the bees.
            </p>
            <br />
            <div class="flex justify-center">
                <img
                    src="/Images/beekeeperfamily.jpeg"
                    alt="beekeeper and son"
                />
            </div>
            <br />
            <div class="text-center">
                <div class="community-statement text-xl">
                    Hivemind is a community driven by a commitment to Bees and
                    the Earth.<br />
                    We are dedicated to raising awareness about the conservation
                    of bees through our products.<br />
                    Our products are made with natural ingredients and are
                    cruelty free.<br />
                    Over 80% of the profits earned by Hivemind are donated for
                    the welfare of the bees<br /><br />
                    <div class="flex justify-center">
                        <img src="/Images/beedaisy.jpg" alt="bee on a daisy" />
                    </div>
                </div>
                <br />
            </div>
            <div class="flex justify-center">
                <div class="=BeeCharityFacts">
                    <p class="text-3xl text-center">
                        <strong>Bee & Charity Facts:</strong>
                    </p>
                    <br />
                    <div class="text-2xl">
                        <ul class="list-inside text-xl list-disc">
                            <p>Some bee-autiful facts about bees include:</p>
                            <li>
                                Our Honeybees are responsible for pollinating
                                <strong>
                                    over 80% of all flowering plants!
                                </strong>
                            </li>
                            <li>
                                These bees pollinate
                                <strong>
                                    more than 130 types of fruits and
                                    vegetables.</strong
                                >
                            </li>
                            <li>
                                <strong
                                    >Approximately 75% of the world's crops rely
                                    on pollinators.</strong
                                >
                            </li>
                            <li>
                                A single bee colony can pollinate
                                <strong>
                                    300 million flowers in a single day!</strong
                                >
                            </li>
                            <li>
                                In North America alone, native bees provide
                                <strong> over $1.5 billion each year </strong>
                                from pollinating crops.
                            </li>
                            <li>
                                <strong
                                    >1 in every 3 bites of food we eat </strong
                                >is directly dependent on bee polination.
                            </li>
                            <br />
                            <p>
                                What challenges do bees face and how can we
                                help?
                            </p>
                            <li>
                                <strong
                                    >Over 700 of the native U.S. bee species </strong
                                >are on the decline.
                            </li>
                            <li>
                                The population of these bees
                                <strong> plunged 90% </strong> before being
                                placed on the endangered species list
                            </li>
                            <li>
                                Honeybees and wild bees share threats from
                                <strong
                                    >toxic pesticides, habitat loss and climate
                                    change.</strong
                                >
                            </li>
                            <!-- https://impactful.ninja/best-charities-that-save-the-bees/#:~:text=These%20Are%20the%209%20Best%20Charities%20That%20Help,7%20The%20Bee%20Conservancy%3A%20Save%20The%20Bees%20 -->
                            <!-- https://www.worldwildlife.org/stories/why-bees-are-climate-heroes -->
                            <br />
                            <p>How can you help?</p>
                            <li>Plant a bee-friendly garden.</li>
                            <li>
                                Support <strong> local beekeepers </strong> by
                                buying <strong>local honey.</strong>
                            </li>
                            <li>Support <strong> organic </strong> farming.</li>
                            <li>
                                Spread awareness about the importance of bees.
                            </li>
                            <li>Donate to bee charities. See more below!</li>
                            <br />
                            <p>
                                For more information,
                                <u>visit the following charities:</u>
                            </p>
                            <!-- https://impactful.ninja/best-charities-that-save-the-bees/#:~:text=These%20Are%20the%209%20Best%20Charities%20That%20Help,7%20The%20Bee%20Conservancy%3A%20Save%20The%20Bees%20 -->
                            <a
                                href="https://www.projectapism.org/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >Project Apis m.</a
                            ><br />
                            <a
                                href="https://www.nwf.org/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >National Wildlife Federation</a
                            ><br />
                            <a
                                href="https://xerces.org/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >The Xerces Society</a
                            ><br />
                            <a
                                href="https://www.pollinator.org/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >Pollinator Partnership</a
                            ><br />
                            <a
                                href="https://www.beesfordevelopment.org/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >Bees for Development</a
                            ><br />
                            <a
                                href="https://www.planetbee.org/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >Planet Bee Foundation</a
                            ><br />
                            <a
                                href="https://thebeeconservancy.org/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >The Bee Conservancy</a
                            ><br />
                            <a
                                href="https://www.beeandbutterflyfund.org/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >The Bee & Butterfly Habitat Fund</a
                            ><br />
                            <a
                                href="https://karmahoneyproject.com/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >Karma Honey Project</a
                            ><br />
                            <a
                                href="https://britishbeecharity.com/"
                                class="bg-ghost-white text-black hover:bg-ghost-white hover:text-amber font-bold"
                                >The British Bee Charity</a
                            ><br />
                        </ul>
                    </div>
                    <br />
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </body>
</html>
