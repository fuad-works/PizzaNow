<?php $__env->startSection('TitlePart'); ?>
| Categories
<?php $__env->stopSection(); ?>

<?php $__env->startSection('CategoryLink'); ?>
  <a class="nav-link active" aria-current="page" href="#">Categories</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('ViewNav'); ?>
  /
<?php $__env->stopSection(); ?>

<?php $__env->startSection('CreateNav'); ?>
  /Categories/Create
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
  <div class="container">
    <div class="card text-white bg-dark">
      <div class="card-header">
        Create Category
      </div>
      <div class="card-body">
        <form class="container" method="POST" action="<?php echo e(route("categories.update", ["id" => $category->id])); ?>">
          <?php echo csrf_field(); ?>
          <div class="mb-3">
            <label for="name" class="form-label">Edit <?php echo e($category->name); ?> Category</label>
            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo e($category->name); ?>">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SimpleBlog\resources\views/categories/Edit.blade.php ENDPATH**/ ?>