

<?php $__env->startSection('Titulo'); ?>

Perfil : <?php echo e($user->username); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>

<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-8/12 lg:w-6/12 px-5">
         <img src="<?php echo e(asset('img/usuario.svg')); ?>" alt="img user">
        </div>

        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center py-10 md:items-start">
            <p> <?php echo e($user->username); ?> </p>
            <p class="text-gray-800 text-sm mb-3 font-bold">0 
               <span class="font-normal" >seguidores</span> </p>

            <p class="text-gray-800 text-sm mb-3 font-bold">0 
               <span class="font-normal" >seguiendo</span> </p>

               <p class="text-gray-800 text-sm mb-3 font-bold">0 
                <span class="font-normal" >Post</span> </p>
        </div>

    </div>
</div>


<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10"> Publicaciones </h2>
    <?php if($posts->count()): ?>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <a href="<?php echo e(route('posts.show', ['post' => $post,'user' => $user])); ?>">
                <img src="<?php echo e(asset('uploads') .'/'. $post->imagen); ?>" alt="Imagen del post <?php echo e($post->tirulo); ?>">
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<div class="my-10">
    <?php echo e($posts->links('pagination::tailwind')); ?>

</div>
<?php else: ?>
   <p class="text-gray-600 uppercase text-sm text-center font-bold">NO hay Publicaciones</p>     
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SMontenegroT\Desktop\Devstragram1\resources\views/dassbhord.blade.php ENDPATH**/ ?>