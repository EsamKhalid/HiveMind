<!DOCTYPE html>
<head>
    <script >
    (function() {
            // Check for saved theme or system preference and apply it
            const currentTheme = localStorage.getItem("theme");
            const deviceTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
            if (currentTheme === "dark" || (!currentTheme && deviceTheme)) {
                document.documentElement.classList.add("dark");
            } else {
                document.documentElement.classList.remove("dark");
            }
        })();

function toggleTheme(){
    var currentTheme = localStorage.getItem("theme");

    if(!currentTheme){
        localStorage.setItem("theme","dark");
    }else if(currentTheme == "dark"){
        localStorage.setItem("theme","light");
    }else{
        localStorage.setItem("theme","dark");
    }
    document.documentElement.classList.toggle("dark")

}
</script>
</head>
<body class="transition-all ease-in-out duration-1000">
    <div class="overflow-hidden">
        <!-- navbar -->
        <nav
            class="navbar flex justify-between items-center bg-amber dark:bg-stone-800 text-stone-800 dark:text-yellow-100 font-bold px-6 py-4 transition-colors duration-1000"
        >
            <!-- logo section -->

            <a
                href="{{ route('home') }}"
                class="flex items-center hover:text-yellow-100 duration-200"
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
                    <a class="fa-solid fa-lightbulb text-2xl m-auto hover:cursor-pointer dark:hover:text-amber" onclick="toggleTheme()"></a>
                    </li>
                    <li>
                        <a
                            href="{{ route('products') }}"
                            class="hover:text-yellow-100 dark:hover:text-amber"
                            >Shop Us</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('about') }}"
                            class="hover:text-yellow-100 dark:hover:text-amber"
                            >About Us</a
                        >
                    </li>
                    <li>
                        <a
                            href="{{ route('contact') }}"
                            class="hover:text-yellow-100 dark:hover:text-amber"
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
                            class="hidden md:block w-48 bg-white text-yellow-100 placeholder-stone-500 border-black rounded-full px-4 py-2 shadow-lg focus:outline-none focus:ring-2 focus:ring-white"
                        />

                        <!-- search icon -->
                        <button
                            type="submit"
                            class="text-stone-800 dark:text-yellow-100 dark:hover:text-amber"
                        >
                            <i class="fas fa-search fa-xl dark:hover:text-amber"></i>
                        </button>
                    </div>
                </form>
                @auth
                <a
                    href="{{ route('basket.view') }}"
                    class="fas fa-shopping-basket fa-xl dark:hover:text-amber hover:text-yellow-100 "
                ></a>
                @else
                <a
                    href="{{ route('login') }}"
                    class="fas fa-shopping-basket fa-xl hover:text-yellow-100 dark:hover:text-amber"
                ></a>
                @endauth @auth
                <a
                    href="{{ route('account') }}"
                    class="fas fa-user fa-xl hover:text-yellow-100 transition dark:hover:text-amber"
                ></a>
                @else
                <a
                    href="{{ route('login') }}"
                    class="fas fa-user fa-xl hover:text-yellow-100 transition dark:hover:text-amber"
                ></a>
                @endauth
            </div>
        </nav>
    </div>
</body>
