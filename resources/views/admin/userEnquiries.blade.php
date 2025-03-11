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
                <h2 class="text-2xl mb-4">User Enquiries</h2>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiries as $enq)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $enq->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $enq->email_address }}</td>
                                <td class="py-2 px-4 border-b">{{ $enq->enquiry }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
