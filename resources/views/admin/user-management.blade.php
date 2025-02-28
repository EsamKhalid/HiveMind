<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        <!-- @include('layouts.sidebar') -->

        <h1>User Management</h1>
        <div class="flex justify-center">
            <div class="">
                @foreach($users as $user)
                <div
                    class="bg-white mx-2 rounded flex justify-between text-center items-center p-2 [&_*]:pr-3 mb-2 border"
                >
                    <p class="text-2xl text-center h-fit">
                        {{$user->first_name}}
                    </p>
                    <p class="text-2xl text-center h-fit">
                        {{$user->last_name}}
                    </p>
                    <p class="text-2xl text-center h-fit">
                        {{$user->phone_number}}
                    </p>
                    <p class="text-2xl text-center h-fit">
                        {{$user->email_address}}
                    </p>
                    <p class="text-2xl text-center h-fit">
                        {{$user->permission_level}}
                    </p>
                </div>

                @endforeach
            </div>
        </div>
    </body>
</html>
