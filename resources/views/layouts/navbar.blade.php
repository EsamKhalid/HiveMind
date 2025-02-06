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
                class="flex items-center hover:text-gray-200 duration-200"
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
                            class="hover:text-gray-200"
                            >Shop Us</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('about') }}"
                            class="hover:text-gray-200"
                            >About Us</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('contact') }}"
                            class="hover:text-gray-200"
                            >Contact Us</a
                        >
                    </li>
                </ul>

                <!-- search icon // trying to make it so that search bar appears when user clicks on icon (still a wip) -->
                <form action="{{ route('products') }}" method="get">
                    <div class="flex items-center space-x-4">
                        <!-- search bar -->
                        <input
                            type="text"
                            name="search"
                            placeholder="Search"
                            class="hidden md:block w-48 bg-white text-gray-800 placeholder-gray-500 rounded-full px-4 py-2 shadow-lg focus:outline-none focus:ring-2 focus:ring-yellow-700"
                        />

                        <!-- search icon -->
                        <button
                            type="submit"
                            class="text-white hover:text-gray-200"
                        >
                            <i class="fas fa-search fa-xl"></i>
                        </button>
                    </div>
                </form>
                @auth
                <a
                    href="{{ route('basket') }}"
                    class="fas fa-shopping-basket fa-xl hover:text-gray-200"
                ></a>
                @else
                <a
                    href="{{ route('login') }}"
                    class="fas fa-shopping-basket fa-xl hover:text-gray-200"
                ></a>
                @endauth @auth
                <a
                    href="{{ route('account') }}"
                    class="fas fa-user fa-xl hover:text-gray-200 transition"
                ></a>
                @else
                <a
                    href="{{ route('login') }}"
                    class="fas fa-user fa-xl hover:text-gray-200 transition"
                ></a>
                @endauth
            </div>
        </nav>
    </div>
</body>
