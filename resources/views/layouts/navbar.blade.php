<!DOCTYPE html>
<body>
    <div class="overflow-hidden">
        <!-- navbar -->
        <nav
            class="navbar flex justify-between items-center bg-amber text-white px-6 py-4"
        >
            <!-- logo section -->
            <a
                href="{{ route('home') }}"
                class="flex items-center hover:text-gray-200 transition duration-200"
            >
                <img
                    src="{{ asset('../Images/HiveMind Logo.png') }}"
                    alt="HiveMind Logo"
                    class="h-12 w-auto mr-3"
                />
                <h1 class="text-2xl font-bold">HiveMind</h1>
            </a>

            <!-- icons section -->
            <div class="flex space-x-4 items-center">
                <!-- navigation links -->
                <!-- links are next to icons -->
                <ul class="hidden md:flex space-x-8 text-lg">
                    <li>
                        <a
                            href="{{ route('products') }}"
                            class="hover:text-gray-200 transition"
                            >Shop Us</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('about') }}"
                            class="hover:text-gray-200 transition"
                            >About Us</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('contact') }}"
                            class="hover:text-gray-200 transition"
                            >Contact Us</a
                        >
                    </li>
                </ul>

                <a
                    href="{{ route('basket') }}"
                    class="fas fa-shopping-basket fa-xl hover:text-gray-200 transition"
                ></a>
                <a
                    href="{{ route('login') }}"
                    class="fas fa-user fa-xl hover:text-gray-200 transition"
                ></a>
            </div>
        </nav>

        <!-- bottom diagonal stripes -->
        <div class="cdwa-right h-[13px] w-screen"></div>
    </div>
</body>
