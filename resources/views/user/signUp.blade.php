<!DOCTYPE html>
<html lang="en">
    <!-- sign up page!!! -->
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        @include('layouts.navbar')
        <p class="text-6xl">Sign Up</p>

        <form id="sign-up" method="post">
            <label for="name">First name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Sign Up</button>
        </form>
        <br>
        <p>Already have an account? Log in as a customer or admin <a href="login.php">here.</a></p>
        <br><br>
    </body>
</html>
