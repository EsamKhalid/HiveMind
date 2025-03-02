<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar') 

        <div class="flex justify-center overflow-x-auto">
            <div class="">
                <p class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md my-10">
                    <i class="fa-solid fa-sitemap text-7xl mr-4 my-auto"></i>
                    Manage Users
                </p>  
                
                <!-- using a table to display user records -->
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-4 text-2xl">User ID</th>
                            <th class="p-4 text-2xl">First name</th>
                            <th class="p-4 text-2xl">Last name</th>
                            <th class="p-4 text-2xl">Email</th>
                            <th class="p-4 text-2xl">Level</th>
                            <th class="p-4 text-2xl">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="bg-white text-center border">
                            <td class="p-4 text-2xl">{{$user->id}}</td>
                            <td class="p-4 text-2xl">{{$user->first_name}}</td>
                            <td class="p-4 text-2xl">{{$user->last_name}}</td>
                            <td class="p-4 text-2xl">{{$user->email_address}}</td>
                            <td class="p-4 text-2xl">{{$user->permission_level}}</td>
                            <td class="p-4">
                                <a class="bg-yellow-500 rounded-md text-center p-2 text-xl" href={{ route('admin.view-user', $user->id) }}>
                                    View user
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </body>
</html>
