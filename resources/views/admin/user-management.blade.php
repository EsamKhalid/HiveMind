<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Dashboard</title>
    </head>

    <body class="bg-white dark:bg-stone-950 flex">
        @include('layouts.sidebar')

        <div class="flex justify-center">
            <div class="mt-10">
                <table class="table-auto w-full">
                    <thead>
                        <tr
                            class="bg-white mx-2 rounded text-center items-center p-2 mb-2 border text-2xl"
                        >
                            <th class="px-4 py-2">First Name</th>
                            <th class="px-4 py-2">Last Name</th>
                            <th class="px-4 py-2">Email Address</th>
                            <th class="px-4 py-2">Permission Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr
                            class="bg-white mx-2 rounded text-center items-center p-2 mb-2 border"
                        >
                            <td class="px-4 py-2 text-xl">
                                {{$user->first_name}}
                            </td>
                            <td class="px-4 py-2 text-2xl">
                                {{$user->last_name}}
                            </td>
                            <td class="px-4 py-2 text-2xl">
                                {{$user->email_address}}
                            </td>
                            <td class="px-4 py-2 text-2xl">
                                {{$user->permission_level}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
