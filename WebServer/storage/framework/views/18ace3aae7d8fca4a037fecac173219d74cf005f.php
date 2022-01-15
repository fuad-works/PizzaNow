<?php $__env->startSection('TitlePart'); ?>
| Posts
<?php $__env->stopSection(); ?>

<?php $__env->startSection('PostLink'); ?>
  <a class="nav-link active" aria-current="page" href="#">Posts</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('ViewNav'); ?>
  /Posts/Index
<?php $__env->stopSection(); ?>

<?php $__env->startSection('CreateNav'); ?>
  /Posts/Create
<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
  <div class="container">
    <div class="card text-white bg-dark">
      <div class="card-header">
        Create Post
      </div>

      <div class="card-body">
        <?php if(session()->has('Success')): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> <?php echo e(session()->get('Success')); ?>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route("posts.update", ["id" => $post->id])); ?>">
          <?php echo csrf_field(); ?>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" placeholder="title" value="<?php echo e($post->title); ?>">
          </div>

          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Select Category" name="category">
              <option selected>Select Category</option>
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                  $selected = "";
                ?>

                <?php if($post->category_id == $category->id): ?>
                  <?php
                      $selected = true;
                  ?>
                <?php endif; ?>

                <option value="<?php echo e($category->id); ?>" <?php echo e($post->category_id == $category->id ? 'selected' : ''); ?>> <?php echo e($category->name); ?> </option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control"  name="content" placeholder="content" rows="3"><?php echo e($post->content); ?></textarea>
          </div>

          <button type="Save" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SimpleBlog\resources\views/posts/Edit.blade.php ENDPATH**/ ?>