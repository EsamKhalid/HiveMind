<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Enquiries</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-screen bg-stone-200 dark:bg-stone-950 shadow-md dark:shadow-sm dark:shadow-stone-800 transition-colours duration-1000">
    @include('layouts.sidebar')

    <header class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">User
                Enquiries</h1>
            <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">Manage Enquiries
                from Users and Guests.</p>
        </div>
    </header>

    <main
        class="min-w-4xl w-[80%] mx-auto mt-6 mb-12 p-6 bg-white dark:bg-stone-800 shadow-lg rounded-lg transition-colors duration-1000">
        <div class="flex justify-center">
            @if ($errors->any())
                <h4 class="text-3xl text-red-500">{{ $errors->first() }}</h4>
            @endif
        </div>


        <form action="{{ route('admin.userEnquiries') }}" method="GET" class="w-full mr-3 mb-3">
            <input type="text" name="search" placeholder="search by email" value="{{ request('email_address') }}"
                class="rounded w-full p-2 border border-stone-300 dark:bg-stone-700 dark:text-yellow-200">
        </form>

        <form action="{{ route('admin.userEnquiries') }}" method="GET" class="text-black w-full">
            <select name="filter" onchange="this.form.submit()"
                class="w-full mb-2 rounded p-2 border border-stone-300 dark:bg-stone-700 dark:text-yellow-200">
                <option value="none" {{ request('filter') == 'none' ? 'selected' : '' }}>None</option>
                <option value="Registered" {{ request('filter') == 'Registered' ? 'selected' : '' }}>Registered Users
                </option>
                <option value="Guest" {{ request('filter') == 'Guest' ? 'selected' : '' }}>Guest Users</option>
            </select>
        </form>

        <table class="min-w-full w-[80%] bg-white dark:bg-stone-800 border border-stone-300 dark:border-stone-700">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">Name
                    </th>
                    <th class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">Email
                    </th>
                    <th class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">Enquiry
                    </th>
                    <th class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">User
                        Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enquiries as $enq)
                    <tr>
                        <td class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">
                            {{ $enq->name }}</td>
                        <td class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">
                            {{ $enq->email_address }}</td>
                        <td class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">
                            {{ $enq->enquiry }}</td>
                        @if ($enq->user_id != null)
                            <td class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">
                                Registered</td>
                        @else
                            <td class="py-2 px-4 border-b dark:border-stone-700 dark:bg-stone-700 dark:text-yellow-200">
                                Guest</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>
