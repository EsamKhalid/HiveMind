<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>User Management 🐝</title>
        <link rel="icon" type="image/x-icon" href="/favicon.ico">

    </head>

    <body class="transition-none bg-white dark:bg-stone-950 flex w-[80%] mx-auto">
        @include('layouts.sidebar') 

        <div class="flex justify-center overflow-x-auto w-full">
            <div class="w-full">
                <p class="text-3xl lg:text-6xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md my-10 w-full text-nowrap">
                    <i class="fa-solid fa-sitemap  mr-4 my-auto"></i>
                    Manage Users
                </p>  
                
                <!-- using a table to display user records -->
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
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
