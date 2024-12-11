<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
    </head>

    <body class="text-center">
    
        @include('layouts.navbar')
        
        <main>
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
        <section class="bg-yellow-50 text-center py-16">
            <h1 class="text-4xl font-bold text-orange-950">Get in Touch</h1>
            <p class="text-lg text-gray-600 mt-4"> 
                Want to get in touch? We'd be buzzing (get it?) to hear from you. Here's how you can reach us...
            </p>
        </section>

            <!-- contact details -->
                <section class="contact-options h-3/4 grid grid-cols-1 md:grid-cols-2 gap-6 p-8 bg-white">
                    <!-- card 1: contact options -->
                    <div class="card bg-yellow-50 p-6 rounded-lg shadow-md text-center">
                        <div class="icon text-3xl text-blue-600 mb-4">📞</div>
                        <h2 class="text-xl font-bold mb-2">Contact Us</h2>
                        <p class="text-gray-600 mb-4">Contact us either via phone or email address.</p>
                        <a href="+353-123-4567" class="text-orange-900">+353-123-4567</a><br>
                        <a href="mailto:hivemind.business@outlook.com" class="text-orange-900">admin@hivemind.com</a><br><br>
                        <p class="text-gray-600 mb-4">Find us at our bee-quarters at:</p>
                        <p class="text-gray-950">HiveMind</p>
                        <p class="text-gray-950">123 Beehive Lane</p>
                        <p class="text-gray-950">Dublin, Ireland</p>
                    </div>



                <!-- card 2: contact form -->
                <div class="card bg-yellow-50 p-6 rounded-lg shadow-md text-center">
                    <div class="icon text-3xl text-green-600 mb-4">✉️</div>
                    <h2 class="text-xl font-bold mb-2">Online Enquiry</h2>
                    <p class="text-gray-600 mb-4">Fill out the form below, and we'll get back to you as soon as possible.</p>
                        
                    <!-- contact form -->
                    <form action="{{ route('contact.store') }}" method="POST" id="contact-us-form">
                        @csrf
                        <input type="text" name="name" placeholder="Your Name" class="w-full p-3 mb-4 border border-gray-300 rounded" required>
                        <input type="email" name="email_address" placeholder="Your Email" class="w-full p-3 mb-4 border border-gray-300 rounded" required>
                        <textarea name="enquiry" placeholder="Your Message (max 500 characters)" class="w-full p-3 mb-4 border border-gray-300 rounded" rows="4" required></textarea>
                        <button type="submit" class="bg-yellow-400 text-white py-2 px-6 rounded-md hover:bg-yellow-500">Submit</button>
                    </form>
                </div>

            </section>

                <!-- pop-up when user submits an enquiry -->
                <div class="popup-overlay hidden fixed top-0 left-0 w-full h-full" id="popupOverlay"></div>
                    <div class="popup hidden fixed top-10 left-1/2 -translate-x-1/2 bg-white p-5 rounded-lg shadow-lg" id="popup">
                        <span class="close absolute top-1 right-2.5 text-xl cursor-pointer text-gray-800" id="closePopup">&times;</span>
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