<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navbar')
        <p class="text-6xl">Register</p>

        <h1>Register User</h1>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <!-- CSRF token for security -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required />
            <br />
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
            <br />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
            <br />
            <button type="submit">Register</button>
        </form>
    </body>
</html>
