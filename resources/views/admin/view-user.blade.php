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

    function displayChanges(field) {
        document.getElementById(field + "edit").innerText = document.getElementById(field + "form").value
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
<!-- Back Button-->
<a
            href="{{route('admin.user-management')}}"
            class="fas fa-arrow-left md:text-3xl p-5 absolute top-3 left-3 dark:text-amber"
        ></a>

<!-- user name header-->
    <div class="mx-auto mb-10 flex-col w-[80%] mt-[5%]">
        <p class="text-3xl md:text-4xl lg:text-5xl 2xl:text-6xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md font-bold">
            @if($user->permission_level == 'user')
                <i class="fa-regular fa-user mr-5"></i>
                User
            @else
                <i class="fa-solid fa-user mr-5"></i>
                Admin
            @endif

            id: {{$user->id}}
        </p>
        <!-- table header -->
        <div class="flex justify-between ml-5">
            <p class="w-[25%] mt-5 lg:text-lg md:text-xl xl:text-2xl 2xl:text-3xl dark:text-white">Field</p>
            <p class="w-[25%] mt-5 lg:text-lg md:text-xl xl:text-2xl 2xl:text-3xl dark:text-white">Data</p>
            <p class="w-[25%] mt-5 lg:text-lg md:text-xl xl:text-2xl 2xl:text-3xl dark:text-white">Changes</p>
            <p class="w-[25%] text-end mt-5 lg:text-lg md:text-xl xl:text-2xl 2xl:text-3xl dark:text-white">Edit?</p>
        </div>
        <hr class="border-black mt-5 dark:border-white">
        <form method="Post" action={{ route('admin.view-user.update', $user->id)}} class="text-2xl pl-5 flex-col dark:text-yellow-200">
            @csrf
            @method('PATCH')
            
            <div class="mt-16 lg:mt-8 py-5 text-lg md:text-xl xl:text-2xl 2xl:text-3xl flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200 justify-between">
                <p class="w-[25%]">First name:</p>
                <div class="w-[25%]">
                    <span id="firstname" class="text-black dark:text-white mx-auto">{{ $user->first_name }}</span>
                    <input type="text" name="first_name" id="firstnameform" class="hidden text-xl md:text-2xl lg:text-2xl w-[95%] text-black"
                        placeholder={{$user->first_name}} value={{$user->first_name}}
                        oninput="displayChanges('firstname')">
                </div>
                <span class="w-[25%]" id="firstnameedit" class=" text-orange-600"></span>

                <i class=" ml-auto mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"
                    onclick="replaceWithInputBox('firstname')">
                </i>
            </div>

            <div class="mt-16 lg:mt-8 py-5 text-lg md:text-xl xl:text-2xl 2xl:text-3xl flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200 justify-between">
                <p class="w-[25%]">Last name: </p>
                <div class="w-[25%]">
                    <input type="text" name="last_name" id="lastnameform" class="hidden text-xl md:text-2xl lg:text-2xl w-[95%] text-black"
                        placeholder={{ $user->last_name }} value={{ $user->last_name }}
                        oninput="displayChanges('lastname')">
                    <span  id="lastname" class="text-black dark:text-white mx-auto">{{ $user->last_name }}</span>
                </div>
                <span class="w-[25%]" id="lastnameedit" class=" text-orange-600"></span>
                <i class="ml-auto mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"
                    onclick="replaceWithInputBox('lastname')"></i>
            </div>

            <div class="mt-16 lg:mt-8 py-5 text-lg md:text-xl xl:text-2xl 2xl:text-3xl flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200 justify-between">
                <p class="w-[25%]">Email: </p>
                <div class="w-[25%]">
                    <span id="email" class="text-black dark:text-white mx-auto">{{ $user->email_address }}</span>
                    <input type="text" name="email_address" id="emailform" class="hidden text-xl md:text-2xl lg:text-2xl w-[95%] text-black"
                        placeholder={{ $user->email_address }} value={{ $user->email_address}}
                        oninput="displayChanges('email')">
                </div>
                <span class="w-[25%]" id="emailedit" class=" text-orange-600"></span>
                <i class="ml-auto mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"
                    onclick="replaceWithInputBox('email')"></i>
            </div>

            <div class="mt-16 lg:mt-8 py-5 text-lg md:text-xl xl:text-2xl 2xl:text-3xl flex hover:bg-yellow-100 rounded-md hover:dark:bg-stone-600 dark:text-yellow-200 justify-between">

                <p class="w-[25%]">Phone Number: </p>
                <div class="w-[25%]">
                    <span id="phone" class="text-black dark:text-white mx-auto">{{ $user->phone_number }}</span>
                    <input type="text" name="phone_number" id="phoneform" class="hidden text-xl md:text-2xl lg:text-2xl w-[95%] text-black"
                        placeholder={{ $user->phone_number }} value={{ $user->phone_number }}
                        oninput="displayChanges('phone')">
                </div>
                <span class="w-[25%]" id="phoneedit" class=" text-orange-600"></span>
                <i class="ml-auto justify-self-end mr-5 hover:cursor-pointer fa-solid fa-pen-to-square"
                    onclick="replaceWithInputBox('phone')"></i>
            </div>
    </div>
    
    <div class="flex flex-row-reverse justify-evenly w-[80%] mx-auto">
            <button class="mt-2 xl:mt-5 ml-auto p-7 rounded-xl lg:text-base xl:text-2xl 2xl:text-3xl bg-green-600 w-fit text-white hover:bg-green-300 font-bold" type="submit">Save Changes</button>
    </form>
    
    <form method="post" action={{ route('admin.view-user.delete', $user->id)}} >
        @csrf
        @method("DELETE")
        <button class="mt-2 xl:mt-5 mr-auto p-7 rounded-xl lg:text-base xl:text-2xl 2xl:text-3xl bg-red-600 w-fit text-white hover:bg-red-300 font-bold" type="submit">Delete Account</button>
    </form>

    </div>



    @if(session()->has('success'))
    <div class="mx-auto alert alert-success text-green-700 font-bold">
        {{ session()->get('success') }}
    </div>
    @endif
    
    @if(session()->has('error'))
    <div class="mx-auto alert alert-error text-red-700 font-bold">
        {{ session()->get('error') }}
    </div>
    @endif
</body>

</html>