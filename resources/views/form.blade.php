<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navbar')
        <p class="text-6xl">Welcome To HiveMind</p>

        <form action="{{ route('form.route') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="first_name" required />
            <br />
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
            <br />
            <label for="name">Name:</label>
            <input type="text" id="name" name="last_name" required />
            <br />
            <label for="name">Name:</label>
            <input type="text" id="name" name="password" required />
            <br />
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
