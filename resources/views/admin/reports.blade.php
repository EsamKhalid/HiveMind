<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Reports</title>
</head>

<body class="transition-none bg-stone-200 dark:bg-stone-950 flex w-full mx-auto">
    @include('layouts.sidebar')

    <header class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">Reports</h1>
            <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">View annual sales reports from HiveMind</p>
        </div>
    </header>

    {{-- Search bar --}}
    <div class="flex justify-center pt-5">
        <div class="flex justify-center w-[75vw]">
            <form action="{{ route('admin.reports') }}" method="GET" class="w-full mr-3">
                <input type="text" name="search" placeholder="Enter name or YYYY-MM-DD or YYYY" value="{{ request('report_name') }}" class="rounded w-full p-2 border border-stone-300 dark:bg-stone-600 dark:text-white dark:placeholder-white" />
            </form>
        </div>
    </div>

    @if(count($reports) === 0)
        <div class="flex justify-center mt-5">
            <h1 class="text-3xl text-stone-950 dark:text-white">No Reports Found</h1>
        </div>
    @else
        {{-- Print out reports --}}
        <div class="flex justify-center overflow-x-auto w-full">
            <div class="w-[80%]">
                <table class="w-full border-collapse border border-stone-300 my-10">
                    <thead class="bg-stone-300 dark:bg-stone-700 dark:text-white ">
                        <tr>
                            <th class="p-1 text-sm lg:text-2xl">Report Title</th>
                            <th class="p-1 text-sm lg:text-2xl">Created</th>
                            <th class="p-1 text-sm lg:text-2xl">Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr class="bg-white dark:bg-stone-800 dark:text-white text-center border">
                                <td class="p-1 text-sm lg:text-2xl">
                                    <a href="{{ asset('pdfs/' . $report->report_name . '.pdf') }}" download="{{ $report->report_name }}" class="text-black dark:text-white hover:underline">
                                        {{ $report->report_name }}
                                    </a>
                                </td>
                                <td class="p-1 text-sm lg:text-2xl">{{ $report->created_at }}</td>
                                <td class="p-1 text-sm lg:text-2xl">{{ $report->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</body>

</html>