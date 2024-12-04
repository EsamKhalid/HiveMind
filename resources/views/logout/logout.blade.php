<!-- THIS PAGE IS THE LOGGED OUT PAGE, IT IS NO LONGER NEEDED AS WE JUST GO BACK TO HOME PAGE AFTER LOGGING OUT-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar') <!-- Include the navbar from your layouts -->

    <h2 class="text-center mt-10">You have been logged out successfully!</h2>
    <p class="text-center mt-4">Would you like to log in again? <a href="{{ route('login') }}">Log in</a></p>

    <!-- Optional: Display a success message after logging out -->
    @if(session('success'))
        <div class="alert alert-success mt-4 text-center">
            {{ session('success') }}
        </div>
    @endif

</body>
</html>