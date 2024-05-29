<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<center>
<?php if(auth()->guard()->check()): ?>
<br><br>
    <a href="<?php echo e(url('/deletepost', $post->id)); ?>">DELETAR POST</a>
<?php endif; ?>
<br><br><br><br><br>
    <!-- post.blade.php -->
<h1><?php echo e($post->nome_post); ?></h1><br><br>
<img src="<?php echo e(asset($post->caminho_imagem)); ?>" alt="Imagem do post" width="400"><br><br>
<em><?php echo e($post->created_at); ?></em><br><br>
<p><?php echo $post->body; ?></p>
<br><br><br><br><br>

</center>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gabriel/BLOG/resources/views/post.blade.php ENDPATH**/ ?>