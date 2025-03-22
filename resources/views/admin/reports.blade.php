<!DOCTYPE html>
<html lang="en">

    <!-- Jo'Ardie Richardson's work -->

    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Reports</title>
    </head>
    <body class="transition-none bg-stone-200 dark:bg-stone-950 flex">
    @include('layouts.sidebar')
    <header class="bg-gradient-to- bg-stone-200 dark:bg-stone-900 pt-8 pb-8 shadow-md border dark:border-none">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-stone-950 dark:text-yellow-400 transition-colours duration-1000">Reports</h1>
            <p class="text-lg mt-2 text-stone-800 dark:text-yellow-200 transition-colours duration-1000">View annual sales reports from HiveMind</p>
        </div>
    </header>


        {{--search bar--}}
        <div class="flex justify-center pt-5 ">
            <div class="flex justify-center w-[75vw]">
                <form
                    action="{{ route('admin.reports') }}"
                    method="GET"
                    class="w-full mr-3"
                >
                    <input
                        type="text"
                        name="search"
                        placeholder="Enter name or YYYY-MM-DD or YYYY"
                        value="{{ request('report_name') }}" {{-- what does this do?--}}
                        class="rounded w-full"
                    />
                </form>
            </div>
        </div>

        

        @if(count($reports) === 0)
        <div class="flex justify-center mt-5"><h1 class="text-3xl">No Reports Found</h1></div>
        

        @else

        
            
            {{--Print out reports--}}
        <div class="flex justify-center text-xl text-stone-950 dark:text-yellow-400">
            <div class=" py-5 ">
                {{--Print out initial table with titles--}}
                
                    <div class="flex justify-center w-[60vw] border">
                        <h1 class=" rounded w-full ml-3 ">
                            
                            Report Title
                            
                        </h1>
                        <h1 class=" rounded w-full ml-3 ">
                            
                            
                            Created
                        </h1>
                        <h1 class=" rounded w-full ml-3 ">
                            
                            
                            Last Updated
                        </h1>
                    </div></a
                >
                {{--Loop for repeatedly outputting results--}}
                @foreach($reports as $report)

                <a href={{ $report->report_link }}>
                    <div class="flex justify-center w-[60vw] border ">
                        <h1 class=" rounded w-full ml-3 ">
                            
                            {{ $report->report_name }}
                            
                        </h1>
                        <h1 class=" rounded w-full ml-3 ">
                            
                            
                            {{ $report->created_at }}
                        </h1>
                        <h1 class=" rounded w-full ml-3 ">
                            
                            
                            {{ $report->updated_at }}
                        </h1>
                    </div></a
                >

                @endforeach
            </div>
        </div>
        
        @endif 
        
    </div>
    </body>
   
</html>