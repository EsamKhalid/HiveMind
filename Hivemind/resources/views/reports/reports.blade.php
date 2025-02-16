<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    </head>
    <body>
        <header>@include('layouts.navbar')</header>
        <main class="mb-auto h-screen
        "><div class="justify-center py-5">
            <p class="text-6xl text-center">Reports</p>
        </div>
        
        <div class="flex justify-center">
            <div class="flex justify-center ">
                <form
                    action="{{ route('reports') }}"
                    method="GET"
                    class="w-full mr-3"
                >
                    {{--search bar--}}
                    <input
                        type="text"
                        name="search"
                        placeholder="Report Name"
                        value="{{ request('search') }}"
                        
                        size="50"
                    />
                    {{--date picker--}}
                    <input 
                        type="text" 
                        placeholder="DATE"
                        name="date"
                        id="datepicker"
                        value="{{ request('date') }}"
                        size="25"
                    />
                    <button type="submit" class="bg-amber text-white px-4 py-2 rounded">
                        Search
                    </button>
                    
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
                            
                            
                            Date Created
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
                            
                            
                            {{ $report->date_created }}
                        </h1>
                        
                    </div></a
                >

                @endforeach
            </div>
        </div>
        
        @endif 
        </main>
        <script>
            $(document).ready(function() {
                $("#datepicker").datepicker({
                    dateFormat: "yy-mm-dd", // Format: YYYY-MM-DD
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>
        
    </body>
   
    @include('layouts.footer')
</html>
