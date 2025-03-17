<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>User Enquiries</title>
    </head>
    <body>
        @include('layouts.navbar')
        <div class="flex justify-center">
            @if($errors->any())
                <h4 class="text-3xl">{{$errors->first()}}</h4>
            @endif
        </div>

        <main class="flex justify-center items-center text-center min-h-screen">
            <div class="w-full max-w-4xl p-4">
                <p class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md my-10">
                    <i class="fa-solid fa-question-circle text-7xl mr-4 my-auto"></i>
                    User Enquiries
                    
                </p>  
                <form
                    action="{{ route('admin.userEnquiries') }}"
                    method="GET"
                    class="w-full mr-3 mb-3"
                >
                    <input
                        type="text"
                        name="search"
                        placeholder="search by email"
                        value="{{ request('email_address') }}"
                        class="rounded w-full"
                    />
                    <br />
                </form>
                <form action="{{ route('admin.userEnquiries') }}" method="GET" class="text-black w-full">
                    <select name="filter" onchange="this.form.submit()" class="w-full mb-2 rounded">
                        <option value="none" {{ request('filter') == 'none' ? 'selected' : '' }}>None</option>
                        <option value="Registered" {{ request('filter') == 'Registered' ? 'selected' : '' }}>Registered Users</option>
                        <option value="Guest" {{ request('filter') == 'Guest' ? 'selected' : '' }}>Guest Users</option>
                    </select>   
                </form>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Enquiry</th>
                            <th class="py-2 px-4 border-b">User Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiries as $enq)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $enq->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $enq->email_address }}</td>
                                <td class="py-2 px-4 border-b">{{ $enq->enquiry }}</td>
                                @if($enq->user_id != null)
                                <td class="py-2 px-4 border-b">Registered</td>
                                @else
                                <td class="py-2 px-4 border-b">Guest</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
