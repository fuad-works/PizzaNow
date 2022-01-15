<?php $__env->startSection('TitlePart'); ?>
| Categories
<?php $__env->stopSection(); ?>

<?php $__env->startSection('CategoryLink'); ?>
  <a class="nav-link active" aria-current="page" href="#">Categories</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('ViewNav'); ?>
  <?php echo e(route("categories.index")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('CreateNav'); ?>
  <?php echo e(route("categories.create")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
  <div class="container">
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>

      <tbody>
        <?php
            $i = 1;
            #{!!  !!} echo without security
            #{{ }} echo with security
        ?>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <th scope="row"> <?php echo e($i++); ?> </th>
            <td><?php echo e($category->name); ?></td>
            <th scope="col"><a href="<?php echo e(route("categories.edit", ["id" => $category->id ])); ?>"> <i class="far fa-edit"></i> </a></th>
            <th scope="col"><a href="<?php echo e(route("categories.destroy", ["id" => $category->id ])); ?>"> <i class="far fa-trash-alt"></i> </a></th>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SimpleBlog\resources\views/categories/Index.blade.php ENDPATH**/ ?>