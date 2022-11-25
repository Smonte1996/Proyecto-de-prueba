

<?php $__env->startSection('Titulo'); ?>
       <?php echo e($post->tirulo); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="container mx-auto md:flex">
    <div class="md:w-1/2">
       <img src="<?php echo e(asset('uploads') .'/'. $post->imagen); ?>" alt="Imagen del post <?php echo e($post->tirulo); ?>" class="rounded-md">
       <div class="p-3">
        <p>0 Likes</p>
       </div>
       <div>
        <p class="font-bold"><?php echo e($post->user->username); ?></p>
        <p class="text-sm text-gray-500"><?php echo e($post->created_at->diffForHumans()); ?></p>
        <p class="mt-5"><?php echo e($post->descripcion); ?></p>
       </div>
       <?php if(auth()->guard()->check()): ?>
         <?php if($post->user_id === auth()->user()->id): ?>
       <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST">
        <?php echo method_field('DELETE'); ?>
        <?php echo csrf_field(); ?>
        <input type="submit" value="Eliminar Publicacion" class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer">
       </form>
       <?php endif; ?>
     <?php endif; ?>
    </div>
  <div class="md:w-1/2 p-5">
     <div  class="shadow bg-white p-5 mb-5 rounded-2xl">
      <?php if(auth()->guard()->check()): ?>
        <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
        <?php if(session('mensaje')): ?>
          <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
            <?php echo e(session('mensaje')); ?>

          </div>
        <?php endif; ?>
        <form action="<?php echo e(route('comentarios.store', ['post' => $post, 'user' => $user])); ?>" method="POST">
          <?php echo csrf_field(); ?>
            <div class="mb-5"> 
                <label for="comentario" class="md-2 block uppercase text-gray-500 font-bold"> Comentario: </label>
                <textarea name="comentario" id="comentario" placeholder="Agrega un comentario" class="border p-2 w-full rounded-lg <?php $__errorArgs = ['comentario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>
                <?php $__errorArgs = ['comentario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div> 
                    <input type="submit" value="Comentar" 
                      class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded-lg">
        </form>
        <?php endif; ?>

        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
            <?php if($post->comentarios->count()): ?>
              <?php $__currentLoopData = $post->comentarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="p-5 border-gray-300 border-b">
                    <a href="<?php echo e(route('posts.index', $comentario->user)); ?>" class="font-bold">
                      <?php echo e($comentario->user->username); ?>

                    </a>
                    <p><?php echo e($comentario->comentario); ?></p>
                    <p class="text-sm text-gray-500"><?php echo e($comentario->created_at->diffForHumans()); ?></p>
              </div>
                
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <p class=" p-10 text-center">No hay comentario Aún</p>
            <?php endif; ?>
        </div>
     </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SMontenegroT\Desktop\Devstragram1\resources\views/posts/show.blade.php ENDPATH**/ ?>