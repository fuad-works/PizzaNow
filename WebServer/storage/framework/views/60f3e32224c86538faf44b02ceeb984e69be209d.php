

<?php $__env->startSection('TitlePart'); ?>
| Posts
<?php $__env->stopSection(); ?>

<?php $__env->startSection('PostLink'); ?>
  <a class="nav-link active" aria-current="page" href="#">Posts</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('ViewNav'); ?>
  /Posts
<?php $__env->stopSection(); ?>

<?php $__env->startSection('CreateNav'); ?>
  /Posts/Create
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SimpleBlog\resources\views/Posts.blade.php ENDPATH**/ ?>