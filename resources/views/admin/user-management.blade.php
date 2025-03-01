<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar') 


        <div class="flex justify-center">
            <div class="">
            <p class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md my-10">
            User Management
            </p>  
                @foreach($users as $user)
                <div
                    class="bg-white mx-2 rounded flex justify-between text-center items-center p-2 [&_*]:pr-3 mb-2 border"
                >
                    <p class="text-2xl text-center h-fit">
                        {{$user->id}}
                    </p>
                    <p class="text-2xl text-center h-fit">
                        {{$user->last_name}}
                    </p>
                    <p class="text-2xl text-center h-fit">
                        {{$user->email_address}}
                    </p>
                    <p class="text-2xl text-center h-fit">
                        {{$user->permission_level}}
                    </p>
                    <a class="bg-yellow-500 rounded-md text-center text-xl" href={{ route('admin.view-user', $user->id) }}>View user</a>
                </div>

                @endforeach
            </div>
        </div>
    </body>
</html>
