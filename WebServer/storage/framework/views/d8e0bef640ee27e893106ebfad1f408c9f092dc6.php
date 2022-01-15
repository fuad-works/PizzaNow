<?php $__env->startSection('page-title', 'rows System'); ?>

<?php $__env->startSection('page-content'); ?>
<div class="card">
  <div class="card-header">
    <?php echo e($formType == 'save' ? 'إنشاء' : 'تعديل'); ?> منتج
  </div>
  <div class="card-body">
    <form action="<?php echo e($formAction); ?>" method="post" enctype='multipart/form-data'>
      <?php echo csrf_field(); ?>
      <input type="hidden" name="id" value="<?php echo e(isset($row) ? $row->id : '0'); ?>">
      <div class="row">

        <div class="col-12 mb-12">
          <label class="form-label">الصورة</label>
          <input type="file" class="form-control form-control-lg" id="image" name="image" placeholder="الصورة">
          <?php
          $base_url = URL::to('/assets');
          if(isset($row))
            echo "<img src='".asset('assets/images/uploads/'.$row->image)."' style='height:200px' />";
          ?>
        </div>

        <div class="col-3 mb-3">
          <label for="name" class="form-label is-invalid">اسم المادة <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo e(isset($row) ? $row->name : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="description" class="form-label">الوصف <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="description" id="description" value="<?php echo e(isset($row) ? $row->description : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="price" class="form-label">السعر <span class="text-danger">*</span></label>
          <input type="number" class="form-control" name="price" id="price" value="<?php echo e(isset($row) ? $row->price : ''); ?>" required>
        </div>



      </div>

      <div class="row">
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-3">حفظ</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PizzaNow\resources\views/pages/Products/editor.blade.php ENDPATH**/ ?>