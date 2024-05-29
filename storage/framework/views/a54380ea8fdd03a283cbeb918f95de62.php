<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<center>
    <br><br><br><br><br>
    <h2>Login</h2><br>
    <form action="/store" method="post">
        <?php echo csrf_field(); ?>
        <input type="text" name="nome" placeholder="Usuario..."><br><br>
        <?php $__errorArgs = ['nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <input type="password" name="pass" placeholder="Senha..."><br><br>
        <input type="submit" class="botao" value="ENVIAR">
    </form>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gabriel/BLOG/resources/views/login.blade.php ENDPATH**/ ?>