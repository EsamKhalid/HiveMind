<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body class="bg-yellow-200">

    <div class="flex ">
        <input type="checkbox" id="drawer-toggle" class="relative sr-only peer">
        <label for="drawer-toggle"
            class="flex flex-col absolute top-0 left-0 p-4 transition-all ease-in-out duration-1000 bg-yellow-600 rounded-lg peer-checked:left-[80%] peer-checked:rotate-[720deg] md:peer-checked:left-[35%] lg:peer-checked:left-[300px] ">
            <i id="hamburger" class="fa-solid fa-bars"></i>
            <i id="cross" class="fa-solid fa-x hidden"></i>
        </label>
        <div
            class="fixed top-0 left-0 z-20 w-[80%] lg:w-[300px] m:w-[35%] h-full transition-all ease-in-out duration-1000 transform -translate-x-full bg-yellow-500 shadow-lg peer-checked:translate-x-0">
            <div class="px-6 py-4 h-full">
                <div class="flex justify-start align-middle ">
                    <img src="{{ asset('../Images/HiveMind Logo.png') }}" alt="HiveMind Logo"
                        class="h-16 w-auto mr-3" />
                    <p class="my-auto text-2xl">HiveMind</p>
                </div>
                <div class="flex flex-col justify-between  h-full">
                    <div id="top-half-sidebar" class="flex flex-col">
                        <a class="text-3xl my-3 p-2 w-full">THING 1</a>
                        <a class="text-3xl my-3 p-2 w-full">THING 2</a>
                        <a class="text-3xl my-3 p-2 w-full">THING 3</a>
                        <a class="text-3xl my-3 p-2 w-full">THING 4</a>
                        <a class="text-3xl my-3 p-2 w-full">THING 5</a>
                    </div>
                    <div id="bottom-half-sidebar" class="flex flex-col mb-[30%]">
                        <a class="text-3xl my-3 p-2 w-full">THING 1</a>
                        <a class="text-3xl my-3 p-2 w-full">THING 2</a>
                        <a class="text-3xl my-3 p-2 w-full">THING 3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="card" class="w-[70%] h-[70%] bg-yellow-500">

    </div>
</body>
<script>
    var checkbox = document.getElementById("drawer-toggle");
    checkbox.addEventListener("change", function() {
    if (this.checked) {
        document.getElementById("hamburger").classList.add("hidden");
        document.getElementById("cross").classList.remove("hidden");
    }else{
        document.getElementById("cross").classList.add("hidden");
        document.getElementById("hamburger").classList.remove("hidden");
    }
});
        
   
</script>
</html>