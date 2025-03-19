<!DOCTYPE html>
@php
    $user = Auth::user();

    if ($user) { 
        $address = \App\Models\Addresses::where('user_id', $user->id)->first();
    } else {
        $guestID = session()->get('guest_id');
        $guest = \App\Models\Guest::where('id', $guestID)->first();
        $address = \App\Models\Addresses::where('guest_id', $guestID)->first();
        }
@endphp
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="transition-none flex flex-col min-h-screen">
    <header></header>
    @include('layouts.navbar')

    <main class="flex-grow bg-white dark:bg-stone-950">
        <div class="flex justify-center m-4">
            <div class="w-full bg-white dark:bg-stone-950 p-8 rounded-lg shadow-md">
                <p class="text-6xl mb-8 text-center text-stone-950 dark:text-white">Checkout</p>
                @if($errors->any())
                    <h4 class="text-3xl text-red-600">{{$errors->first()}}</h4>
                @endif
            <div class="flex flex-row space-x-3 justify-evenly" >
                @if(!$user)
            <form action="{{ route('checkout.storeGuest') }}" method="post" class="space-y-5 h-full flex flex-col justify-between w-[30%] ">
                            @csrf
                            @auth
                            <div class="flex flex-col items-start mb-4">
                                <label for="first_name" class="block text-stone-600 dark:text-white mb-2">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="{{$user->first_name}}" readonly class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="last_name" class="block text-stone-600 dark:text-white mb-2">Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="{{$user->last_name}}" readonly class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="email_address" class="block text-stone-600 dark:text-white mb-2">Email Address</label>
                                <input type="text" name="email_address" id="email_address" value="{{$user->email_address}}" readonly class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="phone_number" class="block text-stone-600 dark:text-white mb-2">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" value="{{$user->phone_number}}" readonly class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" />
                            </div>
                            @else
                            <div class="flex flex-col items-start mb-4">
                                <label for="first_name" class="block text-stone-600 dark:text-white mb-2">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="{{$guest->first_name}}" required class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="last_name" class="block text-stone-600 dark:text-white mb-2">Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="{{$guest->last_name}}" required class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="email_address" class="block text-stone-600 dark:text-white mb-2">Email Address</label>
                                <input type="text" name="email_address" id="email_address" value="{{$guest->email_address}}" required class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" />
                            </div>
                            <div class="flex flex-col items-start mb-4">
                                <label for="phone_number" class="block text-stone-600 dark:text-white mb-2">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" value="{{$guest->phone_number}}" required class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" />
                            </div>
                            <input type="hidden" name="type" value="shipping" />
                            <div class="flex justify-center mt-auto">
                                <button type="submit" class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:underline dark:bg-stone-900 dark:hover:text-amber">Save Details</button>
                            </div>
                            @endauth
                        </form>
                @endif
            <form action="{{ route('checkout.storeAddress') }}" method="post" class="flex flex-col justify-between max-h-[80%] h-fit text-xs sm:text-sm md:text-base lg:text-lg w-[40%]">
                            @csrf
                            @if($address != null)
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="street_address" class="xl:w-full mx-auto block text-black dark:text-white  lg:dark:text-white mb-1 transition-colors duration-1000">Street
                                        Address</label>
                                    <input type="text" name="street_address" id="street_address"
                                        value="{{$address->street_address}}" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="city" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">City</label>
                                    <input type="text" name="city" id="city" value="{{$address->city}}" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="county" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">County</label>
                                    <input type="text" name="county" id="county" value="{{$address->county}}" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="country" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Country</label>
                                    <input type="text" name="country" id="country" value="{{$address->country}}" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="post_code" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Post
                                        Code</label>
                                    <input type="text" name="post_code" id="post_code" value="{{$address->post_code}}"
                                        required class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <input type="hidden" name="type" value="shipping" />
                                <div class="flex justify-center mt-auto">
                                    <button type="submit"
                                        class="bg-green-400 dark:bg-orange-600 text-black py-1 xl:py-3 px-4 rounded-md hover:text-white transition-colors duration-1000">Save
                                        Address</button>
                                </div>
                            @else
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="street_address" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Street
                                        Address</label>
                                    <input type="text" name="street_address" id="street_address" value="Street Address"
                                        required class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="city" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">City</label>
                                    <input type="text" name="city" id="city" value="City" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="county" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">County</label>
                                    <input type="text" name="county" id="county" value="County" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="country" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Country</label>
                                    <input type="text" name="country" id="country" value="Country" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-2">
                                    <label for="post_code" class="xl:w-full mx-auto block text-black dark:text-white lg:dark:text-white mb-1 transition-colors duration-1000">Post
                                        Code</label>
                                    <input type="text" name="post_code" id="post_code" value="Post Code" required
                                        class="w-[90%] xl:w-full mx-auto p-1 xl:p-3 mb-1 xl:mb-2 border border-stone-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <input type="hidden" name="type" value="shipping" />
                                <div class="flex justify-center mt-auto">
                                    <button type="submit"
                                        class="bg-green-400 dark:bg-green-700 text-black py-2 px-6 rounded-md hover:text-white transition-colors duration-1000">Save
                                        Address</button>
                                </div>
                            @endif
                        </form>
            
            </div>


                        
            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>inc