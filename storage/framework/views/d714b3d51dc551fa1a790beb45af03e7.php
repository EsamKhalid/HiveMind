<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <p class="text-9xl text-red-500">Hello World!</p>
    <div class="custom-diagonal-white-right-static"></div>
    <a href="<?php echo e(route('test')); ?>">Click Here</a>
</body><?php /**PATH C:\Users\taran\Documents\GitHub\HiveMind\resources\views/home.blade.php ENDPATH**/ ?>