<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>@include('layouts.navbar')</header>
        <main class="mb-auto h-screen
        "><div class="justify-center py-5">
            <p class="text-6xl text-center">Reports</p>
        </div>
        {{--search bar--}}
        <div class="flex justify-center">
            <div class="flex justify-center w-[75vw] border">
                <form
                    action="{{ route('reports') }}"
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
        <div class="flex justify-center">
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
        </main>
        
    </body>
   
    @include('layouts.footer')
</html>
