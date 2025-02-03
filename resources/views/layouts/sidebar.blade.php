
<div id="sidebar" class="flex w-[0%] h-[100%] m-auto">
        <div class="flex ">
            <input type="checkbox" id="drawer-toggle" class="relative sr-only peer opacity-0" checked>
            <label for="drawer-toggle"
                class="z-10 flex flex-col absolute top-0 left-0 p-4 transition-all ease-in-out duration-1000 bg-cybpnk-ylw2 rounded-lg peer-checked:left-[80%] peer-checked:rotate-[720deg] md:peer-checked:left-[35%] lg:peer-checked:left-[400px] ">
                <i id="hamburger" class="fa-solid fa-bars"></i>
                <i id="cross" class="fa-solid fa-x hidden"></i>
            </label>
            <div
                class="fixed top-0 left-0 z-1 w-[80%] lg:w-[400px] m:w-[35%] h-full transition-all ease-in-out duration-1000 transform -translate-x-full bg-white dark:bg-black shadow-lg dark:shadow-md dark:shadow-gray-300 peer-checked:translate-x-0">
                <div class="px-6 py-4 h-full ">
                    <div class="flex justify-start align-middle mb-10">
                        <img src="{{ asset('../Images/HiveMind dark Logo.png') }}" alt="HiveMind Logo"
                            class="h-16 w-auto mr-3"/>

                        <p class="my-auto text-4xl dark:text-white">HiveMind</p>
                    </div>
                    <hr class="solid border-black dark:border-yellow-300">
                    <div class="flex flex-col justify-between  h-full">
                        <div id="top-half-sidebar" class="flex flex-col dark:text-white">
                        <a class="text-3xl my-4 p-2 w-full text-nowrap">Notifications<i class="fa-solid fa-inbox ml-5 mr-1 text-yellow-500"></i></a>
                            <a class="text-3xl my-4 p-2 w-full text-nowrap">Inventory <i
                                    class="fa-solid fa-warehouse ml-5 mr-1 text-yellow-500"></i></a>
                                    
                            <a class="text-3xl my-4 p-2 w-full text-nowrap">Manage users <i
                                    class="fa-solid fa-sitemap ml-5 mr-1 text-yellow-500"></i></a>
                            <a class="text-3xl my-4 p-2 w-full text-nowrap">View Statistics <i
                                    class="fa-solid fa-chart-line ml-5 mr-1 text-yellow-500"></i></a>
                            <a class="text-3xl my-4 p-2 w-full text-nowrap">Customer View <i
                                    class="fa-solid fa-right-left ml-5 mr-1 text-yellow-500"></i></a>

                        </div>
                        <div id="bottom-half-sidebar" class="flex flex-col mb-[30%] dark:text-white">
                            <a class="text-3xl my-4 p-2 w-full">Account <i class="fa-solid fa-user ml-5 mr-1 text-yellow-500"></i></a>
                            <a class="text-3xl my-4 p-2 w-full">Settings<i class="fa-solid fa-gear ml-5 mr-1 text-yellow-500"></i></a>
                            <a class="text-3xl my-4 p-2 w-full">Help <i
                                    class="fa-solid fa-circle-question ml-5 mr-1 text-yellow-500"></i></a>
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