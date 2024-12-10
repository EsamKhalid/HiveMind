<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header></header>
        @include('layouts.navbar')

        <main>
            <div class="flex justify-center m-4">
                <div class="inline-block">
                    <p class="text-6xl">Checkout</p>
                    <form
                        action="{{ route('checkout.saveAddress') }}"
                        method="post"
                    >
                        @csrf
                        <label for="street_address">Street Address</label>
                        <input type="text" name="street_address" required />
                        <br />
                        <label for="city">City</label>
                        <input type="text" name="city" required />
                        <br />
                        <label for="county">County</label>
                        <input type="text" name="county" required />
                        <br />
                        <label for="country">Country</label>
                        <input type="text" name="country" required />
                        <br />
                        <label for="post_code">Post Code</label>
                        <input type="text" name="post_code" required />
                        <input type="hidden" name="type" value="shipping" />
                        <button type="submit">Go To confirmation</button>
                    </form>
                </div>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
