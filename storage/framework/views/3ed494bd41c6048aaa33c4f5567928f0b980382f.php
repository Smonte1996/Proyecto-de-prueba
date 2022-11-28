<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_','-', app()->getlocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevstAgRaM - <?php echo $__env->yieldContent('titulo'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.js'); ?>
</head>
<body class="bg-gray-100">
    
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">DevStraGram</h1>
         <nav class="flex gap-2 items-center">
            <a href="#" class="font-bold uppercase text-gray-600 text-sms">Login</a> |
            <a href="<?php echo e(route('Registers')); ?>" class="font-bold uppercase text-gray-600 text-sms">Crear cuenta</a>
         </nav>
         </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            <?php echo $__env->yieldContent('titulos'); ?>
        </h2>
        <?php echo $__env->yieldContent('contenido'); ?>
    </main>
    <footer class="text-center p-5 text-gray-500 font-bold">
     DevStraGram - Todo los derechos resrvado &copy; <?php echo e(now()->year); ?>

    </footer>
</body>
</html><?php /**PATH C:\Users\SMontenegroT\Desktop\Devstragram1\resources\views/layouts/app.blade.php ENDPATH**/ ?>