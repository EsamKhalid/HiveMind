<!DOCTYPE html>
<body>
    <div class="overflow-hidden">
        <nav
            class="navbar flex justify-between bg-amber text-white items-center px-[2vw] pt-[10px] w-screen"
        >
            <a
                href="{{ route('home') }}"
                class="flex align-middle hover:bg-ghost-white hover:text-night duration-200 rounded scale-[.85] p-[5px]"
            >
                <img
                    src="{{ asset('../Images/HiveMind Logo.png') }}"
                    alt="logo"
                    class="size-[100px] mr-10"
                />
                <div class="inline-block sm:flex justify-center">
                    <h1 class="text-5xl border-corners-md">HiveMind&nbsp;</h1>
                </div>
            </a>
            <ul class="text-center list-none inline-flex">
                <li class="flex justify-center size-full"><a href="{{route('home')}}">Home</a></li>
                <li class="flex justify-center size-full"><a href="{{route('beauty')}}">Beauty</a></li>
                <li class="flex justify-center size-full"><a href="{{route('health')}}">Health</a></li>
                <li class="flex justify-center size-full"><a href="{{route('clothing')}}">Clothing</a></li>
            </ul>

            <div class="NavLogoContainer sm:flex justify-between">
            </div>
        </nav>
        <div class="cdwa-right h-[20px]  w-screen"></div>
    </div>
</body>
