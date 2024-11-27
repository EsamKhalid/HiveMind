<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body>
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <p class="text-6xl">Contact</p>
    </body>
</html>
<?php /**PATH C:\Users\taran\Documents\GitHub\HiveMind\resources\views/contact/contact.blade.php ENDPATH**/ ?>