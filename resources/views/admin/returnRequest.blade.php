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
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-3xl font-bold mb-4">Return Request for Order #{{ $order->id }}</h1>
        <p class="text-gray-600">This page will display the return request details.</p>
    </div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
    @include('layouts.footer')
</body>
</html>
    
