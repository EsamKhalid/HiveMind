<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>🐝 Viewing user 🐝</title>
</head>
<script>
    function replaceWithInputBox(field){
        document.getElementById(fIeld).classList.add(hidden);
    }

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
<body class="bg-white dark:bg-stone-950 flex">
    <a href={{ route('admin.user-management') }} class="fas fa-arrow-left fa-3x p-5 absolute top-0 left-0"></a>
    <!--@include('layouts.sidebar')-->
    <div class="mx-auto mb-10 flex-col w-[80%] mt-[4%]">
        <p class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md font-bold">
            User id: {{$user->id}}
        </p>
        <form action="">
            <div id="firstname" class="mt-5 py-5 text-3xl pl-5 flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200"> <p>First name: {{ $user->first_name }}</p> <i class="ml-auto mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"></i></div>
            
        <div id="lastname" class="mt-5 py-5 text-3xl pl-5 flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200"> <p>Last name: {{ $user->last_name }}</p> <i class="ml-auto mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"></i></div>
        
        <div id="email" class="mt-5 py-5 text-3xl pl-5 flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200"> <p>Email Address: {{ $user->email_address }}</p> <i class="ml-auto mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"></i></div>
        
        <div id="phone" class="mt-5 py-5 text-3xl pl-5 flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200"> <p>Phone Number: {{ $user->phone_number }}</p> <i class="ml-auto mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"></i></div>
        </form>
    </div>
    <div class="flex justify-evenly">
        <button class="mt-5 p-7 rounded-xl text-3xl bg-red-600 w-25 text-white hover:bg-red-300 font-bold">Delete Account</button>
        <button class="mt-5 p-7 rounded-xl text-3xl bg-green-600 w-25 text-white hover:bg-green-300 font-bold">Save Changes</button>
    </div>

</body>

</html>