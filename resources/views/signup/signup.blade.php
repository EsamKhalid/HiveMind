<!DOCTYPE html>
<html lang="en">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navbar')

        <main class="mt-12">
            @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4 text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 text-center">
                {{ session("success") }}
            </div>
            @endif
            <div class="flex justify-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-6">Sign Up</h1>
            </div>

            <div class="flex justify-center">
                <form
                    action="{{ route('signup.store') }}"
                    method="post"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-96 max-w-sm"
                >
                    @csrf

                    <div class="mb-4">
                        <label
                            for="first_name"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >First Name:</label
                        >
                        <input
                            type="text"
                            name="first_name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            maxlength="50"
                            value="{{ old('first_name') }}"
                            placeholder="First Name"
                            autofocus
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            for="first_name"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Last Name:</label
                        >
                        <input
                            type="text"
                            name="last_name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            maxlength="50"
                            value="{{ old('last_name') }}"
                            placeholder="Last Name"
                            autofocus
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            for="email_address"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Email:</label
                        >
                        <input
                            type="email"
                            name="email_address"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            maxlength="50"
                            value="{{ old('email_address') }}"
                            placeholder="Email"
                            autofocus
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            for="phone_number"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Phone Number:</label
                        >
                        <input
                            type="text"
                            name="phone_number"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            maxlength="50"
                            value="{{ old('phone_number') }}"
                            placeholder="Phone Number"
                            autofocus
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            for="password"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Password:</label
                        >
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Enter your password"
                        />
                        @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label
                            for="confirm_password"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Confirm Password:</label
                        >
                        <input
                            type="password"
                            name="password_confirmation"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Enter your password"
                        />
                    </div>

                    <div class="mb-4">
                        <label
                            for="memorable_question"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Memorable Question:</label
                        >
                        <select
                            name="memorable_question"
                            id="memorable_question"
                            class="shadow appearance-none border rounded w-full py-2 px-3"
                            required
                        >
                            <option value="" disabled selected hidden>
                                Select a question
                            </option>
                            <option value="What is your mother's maiden name?">
                                What is your mother's maiden name?
                            </option>
                            <option value="What is your favourite movie?">
                                What is your favourite movie?
                            </option>
                            <option
                                value="What was the name of your first pet?"
                            >
                                What was the name of your first pet?
                            </option>
                            <option
                                value="Who is your favourite fictional character?"
                            >
                                Who is your favourite fictional character?
                            </option>
                            <option
                                value="What was the name of your first school?"
                            >
                                What was the name of your first school?
                            </option>
                            <option value="What city were you born in?">
                                What city were you born in?
                            </option>
                            <option value="Who was your favourite teacher?">
                                Who was your favourite teacher?
                            </option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label
                            for="memorable_answer"
                            class="block text-gray-700 text-sm font-bold mb-2"
                            >Memorable Answer:</label
                        >
                        <input
                            type="text"
                            name="memorable_answer"
                            class="shadow appearance-none border rounded w-full py-2 px-3"
                            placeholder="Enter your answer"
                            required
                        />
                    </div>

                    <div class="flex items-center justify-between">
                        <button
                            type="submit"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                            Sign Up
                        </button>
                        <button
                            type="reset"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                            Clear
                        </button>
                    </div>

                    <div class="mt-4 text-center">
                        <a
                            href="{{ route('login') }}"
                            class="text-blue-500 hover:underline text-sm"
                        >
                            Already a customer? Login here
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>
