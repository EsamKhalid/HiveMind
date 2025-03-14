<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Your Details</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')
    <main>
    <a  href="{{ route('account') }}"
        class="fas fa-arrow-left fa-3x pl-4 pt-2"></a>

    <div class="xl:w-[50%] lg:w-[70%] max-w-full mx-auto mt-2 mb-20 p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6">Update Your Details</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.details.update') }}" method="POST" class="space-y-4" novalidate>
            @csrf
            <div class="flex flex-row">
                <div>
                    <label class="block text-sm font-semibold">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div class="ml-8">
                    <label class="block text-sm font-semibold">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required 
                        class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold">Email Address</label>
                <input type="email" name="email_address" value="{{ old('email_address', $user->email_address) }}" required 
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div>
                <label class="block text-sm font-semibold">Phone Number</label>
                <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" 
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div>
                <label class="block text-sm font-semibold">Current Password</label>
                <input type="password" name="current_password" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div>
                <label class="block text-sm font-semibold">New Password (Optional)</label>
                <input type="password" name="password" id="password" autocomplete="new-password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <div>
                <label class="block text-sm font-semibold">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password"
                    class="w-full px-4 py-2 mb-6 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
            </div>

            <button type="submit" class="w-[50%] bg-yellow-400 text-black py-2 rounded-lg hover:bg-yellow-500">
                Update Details
            </button>
        </form>
    </div>
    </main>
    @include('layouts.footer')
    
    <!-- script to make the confirm password field 'required' if the new password field has a value -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const password = document.getElementById("password");
            const confirmPassword = document.getElementById("password_confirmation");
            const form = document.querySelector('form[action*="user.details.update"]');

            password.addEventListener("input", function () {
                if (password.value.length > 0) {
                    confirmPassword.setAttribute("required", "required");
                } else {
                    confirmPassword.removeAttribute("required");
                }
            });
        });
    </script>
</body>
</html>
