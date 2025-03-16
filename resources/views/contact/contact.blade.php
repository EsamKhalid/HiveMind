<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us 🐝</title>
        <link rel="icon" href="/favicon.ico">
    </head>

    <body class="transition-none dark:bg-stone-900 duration-1000">
    
        @include('layouts.navbar')
        
        <main class="mb-3">
            @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- title -->
        <section class="bg-yellow-50  dark:dark:bg-stone-700 text-center py-16 transition-all duration-1000 w-[69%] lg:w-[50%] mx-auto rounded-lg mt-5 mb-3">
            <h1 class="text-4xl font-bold text-orange-800 dark:text-amber">Get in Touch</h1>
            <p class="text-lg text-stone-600 dark:text-white mt-4"> 
                Want to get in touch? We'd be buzzing (get it?) to hear from you. Here's how you can reach us...
            </p>
        </section>

            <!-- contact details -->
                <section class="contact-options h-3/4 grid grid-cols-1 md:grid-cols-2 gap-6 py-4 dark:bg-stone-900 transition-all duration-1000 w-[70%] mx-auto">
                    <!-- card 1: contact options -->
                    <div class="card bg-yellow-50 dark:dark:bg-stone-700 p-6 rounded-lg shadow-md text-center transition-all duration-1000">
                        <div class="icon text-3xl text-blue-600 mb-4 dark:text-white">📞</div>
                        <h2 class="text-xl font-bold mb-2 dark:text-amber">Contact Us</h2>
                        <p class="text-stone-600 mb-4 dark:text-white">Contact us either via phone or email address.</p>
                        <a href="+353-123-4567" class="text-orange-900 dark:text-orange-200 ">+353-123-4567</a><br>
                        <a href="mailto:hivemind.business@outlook.com" class="text-orange-900 dark:text-orange-200">admin@hivemind.com</a><br><br>
                        <p class="text-stone-600 mb-4 dark:text-white">Find us at our bee-quarters at:</p>
                        <p class="text-stone-950 dark:text-orange-200">HiveMind</p>
                        <p class="text-stone-950 dark:text-orange-200">123 Beehive Lane</p>
                        <p class="text-stone-950 dark:text-orange-200">Dublin, Ireland</p>
                        <p class="text-stone-950 dark:text-orange-200">Check out our <a href="{{ route('faq') }}" class="text-lg  font-bold text-blue-500 hover:underline dark:text-amber">FAQs</a> for more information.</p>
                    </div>


                <!-- card 2: contact form -->
                <div class="card bg-yellow-50 dark:dark:bg-stone-700 p-6 rounded-lg shadow-md text-center transition-all duration-1000">
                    <div class="icon text-3xl text-green-600 mb-4">✉️</div>
                    <h2 class="text-xl font-bold mb-2 dark:text-amber">Online Enquiry</h2>
                    <p class="text-stone-600 mb-4 dark:text-white">Fill out the form below, and we'll get back to you as soon as possible.</p>
                        
                    <!-- contact form -->
                    <form action="{{ route('contact.store') }}" method="POST" id="contact-us-form">
                        @csrf
                        <input type="text" name="name" placeholder="Your Name" class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" required>
                        <input type="email" name="email_address" placeholder="Your Email" class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" required>
                        <textarea name="enquiry" placeholder="Your Message (max 500 characters)" class="w-full p-3 mb-4 border border-stone-300 rounded dark:bg-stone-300" rows="4" required></textarea>
                        <button type="submit" class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:bg-yellow-500 dark:dark:bg-stone-900 dark:hover:text-amber transition-all duration-500">Submit</button>
                    </form>
                </div>

            </section>

                <!-- pop-up when user submits an enquiry -->
                <div class="popup-overlay hidden fixed top-0 left-0 w-full h-full transition-all duration-1000" id="popupOverlay"></div>
                    <div class="popup hidden fixed top-10 left-1/2 -translate-x-1/2 bg-white p-5 rounded-lg shadow-lg" id="popup">
                        <span class="close absolute top-1 right-2.5 text-xl cursor-pointer text-stone-800" id="closePopup">&times;</span>
                        <div class="popup-content text-center">
                            <p>Thank you for your enquiry! We'll get back to you as soon as possible.</p>
                        </div>
                    </div>
                </div>


            <!-- javascript for the pop-up -->
            <!-- <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const form = document.getElementById('contact-us-form');
                    const popupOverlay = document.getElementById('popupOverlay');
                    const popup = document.getElementById('popup');
                    const closePopup = document.getElementById('closePopup');

                    // function to open the popup
                    function openPopup() {
                        popupOverlay.classList.remove('hidden');
                        popup.classList.remove('hidden');
                    }

                        // function to close the popup
                        function closePopupFunc() {
                            popupOverlay.classList.add('hidden');
                            popup.classList.add('hidden');
                            //resets form after submission window is closed
                            form.reset();
                        }

                    // handle form submission
                    form.addEventListener('submit', function (event) {
                        event.preventDefault(); // prevent default form submission
                        openPopup();
                    });


                    // close popup on close button click
                    closePopup.addEventListener('click', closePopupFunc);

                    // close popup when clicking on the overlay
                    popupOverlay.addEventListener('click', function (event) {
                        if (event.target === popupOverlay) {
                            closePopupFunc();
                        }
                    });
                });
            </script> -->
        </main>
        @include('layouts.footer')
    </body>
</html>