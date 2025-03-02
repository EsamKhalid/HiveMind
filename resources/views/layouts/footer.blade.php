<footer
    style="background-color: #FBBF24; color: white;"
    class="bottom:0 w-full border border-amber"
>
    <div class="container mx-auto flex flex-wrap justify-between items-start py-8">
        <!-- adding first third of footer (left side), includes contact information / link to contact page -->
        <div class="w-full md:w-1/3 flex flex-col mb-4 md:mb-0 px-8">
            <h2 class="text-2xl font-bold">Contact Us</h2>
            <p class="text-lg">Have an enquiry? Fill in a <a href="{{ route('contact') }}" class="text-lg text-blue-500 hover:underline">Contact Form</a>
            <p class="text-lg">Check out our <a href="{{ route('faq') }}" class="text-lg text-blue-500 hover:underline">FAQs</a> for more information.</p>
            <p class="text-lg"><a href="{{ route('terms') }}" class="text-lg text-blue-500 hover:underline">Terms and Conditions apply</a></p>
        </div>
        <!-- adding second third of footer (middle), includes donation button -->
        <div class="w-full md:w-1/3 flex flex-col mb-4 md:mb-0 px-8">
            <h2 class="text-2xl font-bold">Support Our Cause</h2>
            <p class="text-lg">Help us save the bees by donating today!</p>
            <a href="https://www.paypal.com/donate/?hosted_button_id=VZZ8YQ994DXUE" class="bg-yellow-600 text-white px-6 py-3 rounded-md hover:bg-yellow-700 mt-4 inline-block text-center">Donate</a>
        </div>
        <!-- adding third third of footer (right side), includes google maps embed-->
        <div class="w-full md:w-1/3 flex flex-col mb-4 md:mb-0 px-8">
            <h2 class="text-2xl font-bold">Find Us Here</h2>
            <!-- size it a bit so the edge is not touching the bottom-->
            <div class="relative h-48 w-full">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d629667.5904227577!2d-7.296735727730728!3d51.9405375026017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x484481318da1a1bb%3A0xf6348014bd14200!2sHive%20Mind!5e0!3m2!1sen!2suk!4v1733242255053!5m2!1sen!2suk" width="75%" height="75%" style="border:0" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</footer>