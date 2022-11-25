


<?php $__env->startSection('Titulo'); ?>
Inicio Sesion en Devstagram
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
     <img src="<?php echo e(asset('img/login.jpg')); ?>" alt="Imagen de loginusuario">
    </div>
  <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">  
<form action="<?php echo e(route('login')); ?>" method="post" >
  <?php echo csrf_field(); ?>
  <?php if(Session('mensaje')): ?>
   <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"><?php echo e(Session('mensaje')); ?></p>   
  <?php endif; ?>
  <div class="mb-6">
    <label for="mail" class="md-2 block uppercase text-gray-500 font-bold">correo:</label>
    <input type="email" name="email" id="mail" placeholder="Correo Electronico" class="border p-2 w-full rounded-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>">
    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"><?php echo e($message); ?></p>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <label for="password" class="md-2 block uppercase text-gray-500 font-bold">Contraseña:</label>
    <input type="password" name="password" id="password" placeholder="password" class="border p-2 w-full rounded-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
    <?php $__errorArgs = ['password'];
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
  <input type="checkbox" name="remember"><label class=" text-gray-500 text-sm">Recordar</label>
  </div>
<input type="submit" value="Iniciar" class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white rounded-lg">
</form>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\SMontenegroT\Desktop\Devstragram1\resources\views/autenticar/login.blade.php ENDPATH**/ ?>