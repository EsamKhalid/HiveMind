<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')

    <main>

        <a href="{{ route('user.settings') }}" class="fas fa-arrow-left fa-3x pl-4 pt-2"></a>

        <div class="xl:w-[40%] lg:w-[50%] md:w-[60%] sm:w-[90%] max-w-full mx-auto mt-2 mb-20 p-8 bg-white rounded-lg shadow-md">
            <h1 class="text-4xl font-bold mb-6">Security Settings</h1>

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

            <form action="{{ route('settings.security.update') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold">Current Password</label>
                    <input type="password" name="current_password" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold">Select a New Memorable Question</label>
                    <select name="memorable_question" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                        <option value="" disabled selected hidden>Select a question</option>
                        <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
                        <option value="What is your favourite movie?">What is your favourite movie?</option>
                        <option value="What was the name of your first pet?">What was the name of your first pet?</option>
                        <option value="Who is your favourite fictional character?">Who is your favourite fictional character?</option>
                        <option value="What was the name of your first school?">What was the name of your first school?</option>
                        <option value="What city were you born in?">What city were you born in?</option>
                        <option value="Who was your favourite teacher?">Who was your favourite teacher?</option>
                    </select>
                </div>

                <div class="pb-6">
                    <label class="block text-sm font-semibold">New Memorable Answer</label>
                    <input type="text" name="memorable_answer" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <button type="submit" class="w-full bg-yellow-400 text-black py-2 rounded-lg hover:bg-yellow-500 transition-all">
                    Update Security Info
                </button>
            </form>
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>
