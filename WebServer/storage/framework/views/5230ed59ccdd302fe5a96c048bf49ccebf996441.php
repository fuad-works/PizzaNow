<?php $__env->startSection('page-title', 'Students System'); ?>

<?php $__env->startSection('page-content'); ?>
<div class="card">
  <div class="card-header">
    <?php echo e($formType == 'create' ? 'إنشاء' : 'تعديل'); ?> دورة
  </div>
  <div class="card-body">
    <form action="<?php echo e($formAction); ?>" method="post">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="course_id" value="<?php echo e($formType == 'edit' ? $course->id : ''); ?>">
      <div class="row">
        <div class="col-3 mb-3">
          <label for="title" class="form-label is-invalid">اسم الدورة <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="title" id="title" value="<?php echo e($formType == 'edit' ? $course->title : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="type" class="form-label is-invalid">النوع <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="type" id="type" value="<?php echo e($formType == 'edit' ? $course->type : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="start_date" class="form-label is-invalid">تاريخ البدء</label>
          <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo e($formType == 'edit' ? $course->start_date : ''); ?>">
        </div>

        <div class="col-3 mb-3">
          <label for="end_date" class="form-label is-invalid">تاريخ الانتهاء</label>
          <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo e($formType == 'edit' ? $course->end_date : ''); ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-3"><?php echo e($formType == 'create' ? 'إنشاء' : 'تعديل'); ?></button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\StudentsSystem\resources\views/pages/courses/editor.blade.php ENDPATH**/ ?>