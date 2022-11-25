
<?php $__env->startSection('Titulo'); ?>
Crea una nueva Publicacion
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('contenido'); ?>
<div class="md:flex md:items-center justify-center">
    <div class="md:w-1/2 px-10">
      <form action="<?php echo e(route('imagen.store')); ?>" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
      <?php echo csrf_field(); ?>
      </form>
    </div>

    <div class="md:w-1/2 p-10 bg-white  rounded-lg shadow-xl mt-10 md:mt-0">
    <form action="<?php echo e(route('posts.store')); ?>"  method="post">
  <?php echo csrf_field(); ?>
  <div class="mb-6">
    <label for="titulo" class="md-2 block uppercase text-gray-500 font-bold"> Titulo: </label>
    <input type="text" name="tirulo" id="titulo" placeholder="Titulo de la publicacion" class="border p-2 w-full rounded-lg <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('titulo')); ?>">
    <?php $__errorArgs = ['titulo'];
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

    <div class="mb-6">
      <label for="descripcion" class="md-2 block uppercase text-gray-500 font-bold"> Descripcion: </label>
      <textarea name="descripcion" id="descripcion" placeholder="Descripcion de la publicacion" class="border p-2 w-full rounded-lg <?php $__errorArgs = ['titulo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('descripcion')); ?> </textarea>
      <?php $__errorArgs = ['descripcion'];
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
      <div class="mb-5">
        <input type="hidden" name="imagen"  value="<?php echo e(old('imagen')); ?>"/>
      <?php $__errorArgs = ['imagen'];
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
      <input type="submit" value="Crear Publicacion" 
      class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded-lg">
       </form>
     </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SMontenegroT\Desktop\Devstragram1\resources\views/posts/create.blade.php ENDPATH**/ ?>