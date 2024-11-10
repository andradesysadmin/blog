<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
<center>

<br><br><br><br><br>
    <h2>Novo post</h2><br>
    <form action="/postando" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        Imagem: <input type="file" name="imagem" class="inputimg"><br><br>
        <input type="text" class="postnome" name="post_nome" placeholder="Nome do post..."><br><br>
        <textarea name="body" placeholder="Conteudo do post..."></textarea><br><br>
        <input type="submit" class="botao" value="POSTAR"><br><br>
    </form>
</center>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gabriel/Projetos/blog/resources/views/postar.blade.php ENDPATH**/ ?>