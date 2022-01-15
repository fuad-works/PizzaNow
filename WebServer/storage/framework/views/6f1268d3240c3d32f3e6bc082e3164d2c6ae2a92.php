<head>
  <meta charset="utf-8">
  <title><?php echo $__env->yieldContent('page-title'); ?></title>
  <!-- include libraries -->
  <!-- bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-5-1-3/bootstrap.rtl.min.css')); ?>">
  <script src="<?php echo e(asset('plugins/bootstrap-5-1-3/bootstrap.min.js')); ?>"></script>
  <!-- fontawsome -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawsome-5-15-3/all.min.css')); ?>">
  <script src="<?php echo e(asset('plugins/fontawsome-5-15-3/all.min.js')); ?>"></script>
  <!-- jQuery -->
  <script src="<?php echo e(asset('plugins/jquery-3-6-0/jquery-3.6.0.min.js')); ?>"></script>
  <!-- jquery datatable -->
  <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-5-0-1-datatable-1-11-3/dataTables.min.css')); ?>">
  <script src="<?php echo e(asset('plugins/bootstrap-5-0-1-datatable-1-11-3/datatables.min.js')); ?>"></script>
  <!-- Popper -->
  <script src="<?php echo e(asset('plugins/popper-2-4-4/popper.min.js')); ?>"></script>
  <!-- include layout initization -->
  <link rel="stylesheet" href="<?php echo e(asset('css/layout.css')); ?>">
  <?php echo $__env->yieldContent('head-styles'); ?>
  <?php echo $__env->yieldContent('head-scripts'); ?>
</head>
<?php /**PATH C:\xampp\htdocs\PizzaNow\resources\views/layouts/parts/head.blade.php ENDPATH**/ ?>