<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $__env->yieldContent('title'); ?></title>
        <style>

        </style>
    </head>
    <body>
       <?php echo $__env->yieldContent('content'); ?>
    </body>
</html>
<?php /**PATH /home/gabriel/BLOG/resources/views/master.blade.php ENDPATH**/ ?>