<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<center>
<br><br><br><br><br>
    <h1>Gabriel Andrade</h1>
    <em>Blog de técnologia e computação</em>
    <br><br>
    <?php $__currentLoopData = $nomeposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="box"><h2><a href="<?php echo e(url('/post', $post->id)); ?>"><?php echo e($post->nome_post); ?></a></h2></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gabriel/BLOG/resources/views/home.blade.php ENDPATH**/ ?>