<?php $__env->startSection('TitlePart'); ?>
| Categories
<?php $__env->stopSection(); ?>

<?php $__env->startSection('CategoryLink'); ?>
  <a class="nav-link active" aria-current="page" href="#">Categories</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('ViewNav'); ?>
  /Categories/View
<?php $__env->stopSection(); ?>

<?php $__env->startSection('CreateNav'); ?>
  /Categories/Create
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SimpleBlog\resources\views/Categories.blade.php ENDPATH**/ ?>