
<div id="sidebar" class="flex w-[0%] h-[100%]">
    <div class="flex ">
        <input type="checkbox" id="drawer-toggle" class="relative sr-only peer opacity-0">
        <label for="drawer-toggle"
            class="z-10 flex flex-col absolute top-0 left-0 p-4 transition-all ease-in-out duration-1000 bg-cybpnk-ylw2 rounded-lg peer-checked:left-[80%] peer-checked:rotate-[720deg] md:peer-checked:left-[35%] lg:peer-checked:left-[400px] ">
            <i id="hamburger" class="fa-solid fa-bars"></i>
            <i id="cross" class="fa-solid fa-x hidden"></i>
        </label>
        <div
            class="fixed top-0 left-0 z-1 w-[80%] lg:w-[400px] m:w-[35%] h-full transition-all ease-in-out duration-1000 transform -translate-x-full bg-white dark:bg-stone-950 shadow-lg dark:shadow-md dark:shadow-gray-300 peer-checked:translate-x-0">
            <div class="px-6 py-4 h-full ">
                <div class="flex justify-start align-middle mb-10">
                    <img src="{{ asset('../Images/HiveMind dark Logo.png') }}" alt="HiveMind Logo"
                        class="h-16 w-auto mr-3"/>

                    <p class="my-auto text-4xl dark:text-white">HiveMind</p>
                </div>
                <hr class="solid border-black dark:border-yellow-300">
                <div class="flex flex-col justify-between  h-full">
                    <div id="top-half-sidebar" class="flex flex-col dark:text-white">
                        <a class="text-3xl my-4 p-3 w-full text-nowrap dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{ route('admin-dashboard') /*dashboard - what admin sees when they log in*/}}><p>Dashboard</p><i class="fa-solid fa-desktop text-yellow-500 text-4xl"></i></a>
                        <a class="text-3xl my-4 p-3 w-full text-nowrap dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{ route('admin-dashboard') /*notifications*/}}><p>Notifications</p><i class="fa-solid fa-inbox text-yellow-500 text-4xl"></i></a>
                        <a class="text-3xl my-4 p-2 w-full text-nowrap dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{route('admin-dashboard' /*inventory*/)}}><p>Inventory</p> <i class="fa-solid fa-warehouse text-yellow-500 text-4xl"></i></a>
                        <a class="text-3xl my-4 p-2 w-full text-nowrap dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{route('admin-dashboard' /*User MNG Page*/)}}><p>Manage users</p> <i class="fa-solid fa-sitemap text-yellow-500 text-4xl"></i></a>
                        <a class="text-3xl my-4 p-2 w-full text-nowrap dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{route('admin-dashboard' /*refunds and returns*/)}}><p>Refunds & returns</p> <i class="fa-solid fa-store text-yellow-500 text-4xl"></i></a>
                        <a class="text-3xl my-4 p-2 w-full text-nowrap dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{route('admin-dashboard' /*reports*/)}}><p>View reports</p> <i class="fa-solid fa-chart-line text-yellow-500 text-4xl"></i></a>
                        <a class="text-3xl my-4 p-2 w-full text-nowrap dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{route('home' /*Customer View*/)}}><p>Customer view</p> <i class="fa-solid fa-right-left text-yellow-500 text-4xl"></i></a>
                    </div>
                    <div id="bottom-half-sidebar" class="flex flex-col mb-[30%] dark:text-white">
                        <a class="text-3xl my-4 p-2 w-full dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{route('account' /*Customer View*/)}}><p>Account</p> <i class="fa-solid fa-user ml-5 mr-1 text-yellow-500"></i></a>
                        <a class="text-3xl my-4 p-2 w-full dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{route('home' /*Customer View*/)}}><p>Settings</p> <i class="fa-solid fa-gear ml-5 mr-1 text-yellow-500"></i></a>
                        <a class="text-3xl my-4 p-2 w-full dark:hover:bg-stone-800 hover:bg-yellow-200 justify-between flex" href={{route('home' /*Customer View*/)}}><p>Help</p><i class="fa-solid fa-circle-question ml-5 mr-1 text-yellow-500"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>  
</div>
<script>
    var checkbox = document.getElementById("drawer-toggle");
    checkbox.addEventListener("change", function () {
        if (this.checked) {
            document.getElementById("hamburger").classList.add("hidden");
            document.getElementById("cross").classList.remove("hidden");
        } else {
            document.getElementById("cross").classList.add("hidden");
            document.getElementById("hamburger").classList.remove("hidden");
        }
    });
</script>