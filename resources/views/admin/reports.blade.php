<!DOCTYPE html>
<html lang="en">

    <!-- Jo'Ardie Richardson's work -->

    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Reports</title>
    </head>
    <body class="bg-white dark:bg-stone-950 flex">
    @include('layouts.sidebar')
    <div class=" mx-auto mb-auto flex-col w-[80%] mt-[4%]">
        <p class="text-7xl text-white p-5 bg-yellow-400 dark:bg-gray-400 dark:bg-opacity-40 rounded-md"> <i class="fa-solid fa-inbox text-7xl mr-4 my-auto"></i>Reports</p>


        {{--search bar--}}
        <div class="flex justify-center pt-5 ">
            <div class="flex justify-center w-[75vw] border">
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
        <div class="flex justify-center text-xl ">
            <div class=" py-5 ">
                {{--Print out initial table with titles--}}
                
                    <div class="flex justify-center w-[60vw] border ">
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