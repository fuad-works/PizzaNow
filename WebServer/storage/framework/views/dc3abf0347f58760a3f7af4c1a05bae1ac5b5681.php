<!DOCTYPE html>
<html dir="rtl" lang="ar">
  <?php echo $__env->make('layouts.parts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <div class="wrapper">

      <?php echo $__env->make('layouts.parts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="content">

            <?php echo $__env->make('layouts.parts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <h4 class="h4 mb-4 text-center"><?php echo $__env->yieldContent('page-head-title'); ?></h3>
            <?php echo $__env->yieldContent('page-content'); ?>
        </div>
    </div>

    <?php echo $__env->make('layouts.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH D:\LaravelApps\PizzaNow\resources\views/layouts/Site.blade.php ENDPATH**/ ?>