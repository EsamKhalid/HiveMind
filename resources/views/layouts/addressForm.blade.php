<!DOCTYPE html>
<form action="{{ route('checkout.storeAddress') }}" method="post"
                            class="flex flex-col justify-between max-h-[80%] h-fit">
                            @csrf
                            @if($address != null)
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="street_address" class="xl:w-full mx-auto block text-black dark:text-white  xl:dark:text-black mb-1 transition-colors duration-1000">Street
                                        Address</label>
                                    <input type="text" name="street_address" id="street_address"
                                        value="{{$address->street_address}}" required
                                        class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="city" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">City</label>
                                    <input type="text" name="city" id="city" value="{{$address->city}}" required
                                        class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="county" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">County</label>
                                    <input type="text" name="county" id="county" value="{{$address->county}}" required
                                        class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="country" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">Country</label>
                                    <input type="text" name="country" id="country" value="{{$address->country}}" required
                                        class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="post_code" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">Post
                                        Code</label>
                                    <input type="text" name="post_code" id="post_code" value="{{$address->post_code}}"
                                        required class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <input type="hidden" name="type" value="shipping" />
                                <div class="flex justify-center mt-auto">
                                    <button type="submit"
                                        class="bg-green-400 dark:bg-orange-600 text-black py-3 px-7 rounded-md hover:text-white transition-colors duration-1000">Save
                                        Address</button>
                                </div>
                            @else
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="street_address" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">Street
                                        Address</label>
                                    <input type="text" name="street_address" id="street_address" value="Street Address"
                                        required class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="city" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">City</label>
                                    <input type="text" name="city" id="city" value="City" required
                                        class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="county" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">County</label>
                                    <input type="text" name="county" id="county" value="County" required
                                        class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="country" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">Country</label>
                                    <input type="text" name="country" id="country" value="Country" required
                                        class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <div class="flex flex-col items-start mb-1 xl:mb-4">
                                    <label for="post_code" class="xl:w-full mx-auto block text-black dark:text-white xl:dark:text-black mb-1 transition-colors duration-1000">Post
                                        Code</label>
                                    <input type="text" name="post_code" id="post_code" value="Post Code" required
                                        class="w-[90%] xl:w-full mx-auto p-3 mb-1 xl:mb-4 border border-gray-300 rounded dark:bg-stone-200 transition-colors duration-1000" />
                                </div>
                                <input type="hidden" name="type" value="shipping" />
                                <div class="flex justify-center mt-auto">
                                    <button type="submit"
                                        class="bg-green-400 dark:bg-green-700 text-black py-2 px-6 rounded-md hover:text-white transition-colors duration-1000">Save
                                        Address</button>
                                </div>
                            @endif
                        </form>