<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard</title>
</head>

<body class="bg-white dark:bg-black">
@include('layouts.sidebar')

    <div id="card" class="m-auto min-w-[50%] bg-yellow-500 dark:bg-gray-400 flex-shrink-0">
            <div class="text-7xl">
            Hello, Admin User
            </div>
        </div>
</body>
<script>
    var checkbox = document.getElementById("drawer-toggle");
    checkbox.addEventListener("change", function () {
        if (this.checked) {
            document.getElementById("hamburger").classList.add("hidden");
            document.getElementById("cross").classList.remove("hidden");
        } else {
            document.getElementById("cross").classList.add("hidden");
            document.getElementById("hamburger").classList.remove("hidden");
        }
    });


</script>

</html>