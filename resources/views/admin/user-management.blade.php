<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>User Management 🐝</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

    </head>

    <body class="transition-none bg-stone-200 dark:bg-stone-950 flex w-full mx-auto">
        @include('layouts.sidebar') 

        <header class="bg-gradient-to- bg-white dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">User Management</h1>
                <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">Manage all users.</p>
            </div>
        </header>

        <div class="flex justify-center overflow-x-auto w-full">
            <div class="w-[80%]">
                
                
                <!-- using a table to display user records -->
                <table class="w-full border-collapse border border-stone-300 my-10">
                    <thead class="bg-stone-200">
                        <tr>
                            <th class="p-1  text-sm lg:text-2xl">User ID</th>
                            <th class="p-1  text-sm lg:text-2xl">First name</th>
                            <th class="p-1  text-sm lg:text-2xl">Last name</th>
                            <th class="p-1  text-sm lg:text-2xl">Email</th>
                            <th class="p-1  text-sm lg:text-2xl">Level</th>
                            <th class="p-1  text-sm lg:text-2xl">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="bg-white text-center border">
                            <td class="p-1  text-sm lg:text-2xl">{{$user->id}}</td>
                            <td class="p-1  text-sm lg:text-2xl">{{$user->first_name}}</td>
                            <td class="p-1  text-sm lg:text-2xl">{{$user->last_name}}</td>
                            <td class="p-1  text-sm lg:text-2xl">{{$user->email_address}}</td>
                            <td class="p-1  text-sm lg:text-2xl">{{$user->permission_level}}</td>
                            <td class="p-1 ">
                                <a class="text-yellow-600 hover:text-yellow-400 underline rounded-md text-center p-1 text-nowrap text-sm lg:text-2xl" href={{ route('admin.view-user', $user->id) }}>
                                    View user
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                
        <div class="mx-auto mt-5 text-3xl alert text-red-700 font-bold">
        @if(session()->has('deletionSuccess'))
        <!-- successful deletion-->
        {{ session()->get('deletionSuccess') }}

            @elseif(session()->has('error'))
        <!-- unsuccessful deletion-->
             {{ session()->get('error') }}
              @endif
    </div>
    

  

    </body>
</html>
