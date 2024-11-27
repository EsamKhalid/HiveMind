<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-lg bg-white rounded-lg shadow-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">User Registration</h2>
    <p class="text-sm text-gray-500 text-center mb-6">
      Fill in the form below to register. Already a user? <a href="../Index/index.html" class="text-blue-600 hover:underline">Log in</a>. Guest? <a href="http://localhost/port2/Index/guest.php" class="text-blue-600 hover:underline">Guest View</a>.
    </p>

    <!-- Form -->
    <form id="registrationForm" method="post" action="register.php">
      <!-- First Name -->
      <div class="mb-4">
        <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
        <input type="text" id="first_name" name="first_name" required
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
      </div>

      <!-- Last Name -->
      <div class="mb-4">
        <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
        <input type="text" id="last_name" name="last_name" required
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
      </div>

      <!-- Phone Number -->
      <div class="mb-4">
        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="text" id="phone_number" name="phone_number" required
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
      </div>

      <!-- Email -->
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
      </div>

      <!-- Confirm Email -->
      <div class="mb-4">
        <label for="confirmEmail" class="block text-sm font-medium text-gray-700">Confirm Email</label>
        <input type="email" id="confirmEmail" name="confirmEmail" required
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

          <div class="generator-option">
            <input type="checkbox" id="useGenerator" name="useGenerator">
            <label for="useGenerator">Generate secure password</label>
        </div>

      </div>
      <!-- Confirm Password -->
      <div class="mb-4">
        <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
      </div>

      <!-- Submit and Reset Buttons -->
      <div class="flex space-x-4">
        <button type="submit"
          class="w-full py-2 px-4 bg-yellow-400 text-white rounded-lg shadow-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Register
        </button>
        <button type="reset"
          class="w-full py-2 px-4 bg-gray-200 text-gray-700 rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
          Clear
        </button>
      </div>
    </form>

    <!-- Footer -->
    <p class="text-center text-sm text-gray-500 mt-6">
      By registering, you agree to our <a href="#" class="text-blue-600 hover:underline">Terms</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>.
    </p>
  </div>

  <!-- Link to External JavaScript -->
  <script src="signup.js"></script>
  <script src="../phpPass/ajaxHandler.js"></script>
</body>
</html>