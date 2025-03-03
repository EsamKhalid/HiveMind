<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>🐝 Viewing user 🐝</title>
</head>
<script>

    function replaceWithInputBox(field) {
        document.getElementById(field).classList.toggle("hidden");
        document.getElementById(field + "form").classList.toggle("hidden");

    }

    function displayChanges(field){
    document.getElementById(field+"edit").innerText = document.getElementById(field + "form").value
    }

    (function () {
        // Check for saved theme or system preference and apply it
        const currentTheme = localStorage.getItem("theme");
        const deviceTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
        if (currentTheme === "dark" || (!currentTheme && deviceTheme)) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    })();

    function toggleTheme() {
        var currentTheme = localStorage.getItem("theme");

        if (!currentTheme) {
            localStorage.setItem("theme", "dark");
        } else if (currentTheme == "dark") {
            localStorage.setItem("theme", "light");
        } else {
            localStorage.setItem("theme", "dark");
        }
        document.documentElement.classList.toggle("dark")

    }
</script>

<body class="bg-white dark:bg-stone-950 flex">
    <a href={{ route('admin.user-management') }}
        class="fas fa-arrow-left fa-3x p-5 absolute top-0 left-0 dark:text-amber"></a>
    <!--@include('layouts.sidebar')-->
    <div class="mx-auto mb-10 flex-col w-[80%] mt-[4%]">
        <p class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md font-bold">
            @if($user->permission_level == 'user')
                <i class="fa-regular fa-user mr-5"></i>
                User
                @else
                <i class="fa-solid fa-user mr-5"></i>
                Admin
            @endif

             id: {{$user->id}}
        </p>
        <div class="flex justify-between ml-5">
        <p class="mt-5 text-3xl dark:text-white">Field</p>
        <p class="mt-5 text-3xl dark:text-white">Data</p>
        <p class="mt-5 text-3xl dark:text-white">Changes</p>
        <p class="mt-5 text-3xl dark:text-white">Edit?</p>
        </div>
        
        
        <hr class="border-black mt-5 dark:border-white">
        <form method="POST" action={{ route( 'admin.view-user.update',['id' =>$user->id]) }}>
            @csrf
            <div
                class="mt-5 py-5 text-3xl pl-5 flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200 justify-between">
                    <p>First name:</p>
                    <div>
                    <span id="firstname" class="text-black dark:text-white mx-auto">{{ $user->first_name }}</span>
                    <input type="text" name="firstname" id="firstnameform" class="hidden ml-5 text-2xl text-black" placeholder={{$user->first_name}} value={{ $user->first_name}} onchange="displayChanges('firstname')">
                    </div>
                    <span id="firstnameedit" class=" text-orange-600"></span>
                <i class=" mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"
                    onclick="replaceWithInputBox('firstname')"></i>

            </div>

            <div
                class="mt-5 py-5 text-3xl pl-5 flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200 justify-between">
                    <p >Last name: </p>
                    <div>
                        <input type="text" name="lastname" id="lastnameform" class="hidden ml-5 text-2xl text-black" placeholder={{ $user->last_name }} value={{ $user->last_name }} onchange="displayChanges('lastname')">
                        <span id="lastname" class="text-black dark:text-white mx-auto">{{ $user->last_name }}</span> 
                    </div>
                    <span id="lastnameedit" class=" text-orange-600"></span>
                <i class=" mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"
                    onclick="replaceWithInputBox('lastname')"></i>
            </div>

            <div
                class="mt-5 py-5 text-3xl pl-5 flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200 justify-between">
                    <p >Email: </p>
                    <div>
                        <span id="email" class="text-black dark:text-white mx-auto">{{ $user->email_address }}</span>
                        <input type="text" name="email" id="emailform" class="hidden ml-5 text-2xl text-black" placeholder={{ $user->email_address }} value={{ $user->email_address}} onchange="displayChanges('email')">
                    </div>
                    <span id="emailedit"class=" text-orange-600"></span>
                    <i class=" mr-5 hover:cursor-pointer fa-solid fa-pen-to-square" 
                        onclick="replaceWithInputBox('email')"></i>
            </div>

            <div
                class="mt-5 py-5 text-3xl pl-5 flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200 justify-between">

                    <p>Phone Number: </p>
                    <div>
                    <span id="phone" class="text-black dark:text-white mx-auto">{{ $user->phone_number }}</span>
                    <input type="text" name="phone" id="phoneform" class="hidden ml-5 text-2xl text-black" placeholder={{ $user->phone_number }} value={{ $user->phone_number }} onchange="displayChanges('phone')">
                    </div>
                <span id="phoneedit" class=" text-orange-600"></span>
                <i class="justify-self-end mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"
                    onclick="replaceWithInputBox('phone')"></i>
            </div>

        
    </div>
    <div class="flex justify-evenly">
        <button class="mt-5 p-7 rounded-xl text-3xl bg-red-600 w-fit text-white hover:bg-red-300 font-bold" type="submit">Delete User</button>
        
        <button class="mt-5 p-7 rounded-xl text-3xl bg-green-600 w-fit text-white hover:bg-green-300 font-bold" type="submit">Save Changes</button>
    </div>
</form>
</body>

</html>