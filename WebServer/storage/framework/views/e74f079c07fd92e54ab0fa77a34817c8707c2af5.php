<?php $__env->startSection('TitlePart'); ?>
| Posts
<?php $__env->stopSection(); ?>

<?php $__env->startSection('PostLink'); ?>
  <a class="nav-link active" aria-current="page" href="#">Posts</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('ViewNav'); ?>
  <?php echo e(route("posts.index")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('CreateNav'); ?>
  <?php echo e(route("posts.create")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('Content'); ?>
  <div class="container">
    <?php
        $i = 1;
    ?>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="card text-white bg-dark mb-2">
        <div class="card-header">
          <?php echo e($post->title); ?>

        </div>
        <div class="card-body">
          <p><?php echo e($post->content); ?></p>
          <footer class="blockquote-footer"><?php echo e($post->name); ?></footer>
          <a href="<?php echo e(route("posts.edit", ["id" => $post->id])); ?>"><i class="far fa-edit"></i></a>
          <a href="<?php echo e(route("posts.destroy", ["id" => $post->id])); ?>"><i class="far fa-trash-alt"></i></a>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SimpleBlog\resources\views/posts/Index.blade.php ENDPATH**/ ?>