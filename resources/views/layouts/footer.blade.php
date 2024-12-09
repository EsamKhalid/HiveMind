<footer
    style="background-image: url(/Images/honeycomb2.png);"
    class="w-full h-fit-content border border-amber"
>
    <div class="container mx-auto flex flex-wrap justify-between h-fit">
        <!-- adding first third of footer (left side), includes contact information / link to contact page -->
        <div class="w-full md:w-1/3 flex flex-col items-start mb-4 md:mb-0">
            <h3 class="text-lg font-semibold text-gray-800">Contact Us</h3>
            <p class="text-sm text-gray-800">HiveMind</p>
            <p class="text-sm text-gray-800">123 Beehive Lane</p>
            <p class="text-sm text-gray-800">Dublin, Ireland</p>
            <p class="text-sm text-gray-800">Phone: +353-123-4567</p>
            <p class="text-sm text-gray-800">Email: admin@hivemind.com</p>
            <p class="text-sm text-gray-800">
                Have an enquiry? Fill in a
                <a
                    href="{{ route('contact') }}"
                    class="text-sm text-blue-500 hover:text-blue-600"
                    >contact form</a
                >
            </p>
        </div>
        <!-- adding second third of footer (middle), includes donation button -->
        <div class="w-full md:w-1/3 flex flex-col items-start mb-4 md:mb-0">
            <h3 class="text-lg font-semibold text-gray-800">
                Support Our Cause
            </h3>
            <p class="text-sm text-gray-800">
                Help us save the bees by donating today!
            </p>
            <a
                href="https://www.paypal.com/donate/?hosted_button_id=VZZ8YQ994DXUE"
                class="bg-white text-gray-800 hover:bg-white hover:text-amber font-bold py-2 px-4 rounded mt-4 inline-block"
                >Donate</a
            >
        </div>
        <div class="w-full md:w-1/3 flex flex-col items-start">
            <!-- adding third third of footer (right side), includes google maps embed-->
            <h3 class="text-lg font-semibold text-gray-800">Find Us Here!</h3>
            <div class="relative w-full h-fit">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d629667.5904227577!2d-7.296735727730728!3d51.9405375026017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x484481318da1a1bb%3A0xf6348014bd14200!2sHive%20Mind!5e0!3m2!1sen!2suk!4v1733242255053!5m2!1sen!2suk" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</footer>
