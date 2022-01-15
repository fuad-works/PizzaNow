<?php $__env->startSection('page-title', 'Students System'); ?>

<?php $__env->startSection('page-content'); ?>
<div class="card">
  <div class="card-header">
    <?php echo e($formType == 'create' ? 'إنشاء' : 'تعديل'); ?> طالب
  </div>
  <div class="card-body">
    <form action="<?php echo e($formAction); ?>" method="post">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="student_id" value="<?php echo e($formType == 'edit' ? $student->id : ''); ?>">
      <div class="row">
        <div class="col-3 mb-3">
          <label for="first_name" class="form-label is-invalid">الاسم الأول <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo e($formType == 'edit' ? $student->first_name : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="last_name" class="form-label">الكنية <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo e($formType == 'edit' ? $student->last_name : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="father_name" class="form-label">اسم الأب <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo e($formType == 'edit' ? $student->father_name : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="gender" class="form-label">الجنس <span class="text-danger">*</span></label>
          <select id="" class="form-select" name="gender" id="gender" aria-label="select gender" required>
            <option value="">غير محدد</option>
            <option value="0" <?php echo e($formType == 'edit' ? ($student->gender == 0 ? 'selected' : '') : ''); ?>>ذكر</option>
            <option value="1" <?php echo e($formType == 'edit' ? ($student->gender == 1 ? 'selected' : '') : ''); ?>>أنثى</option>
          </select>
        </div>

        <div class="col-3 mb-3">
          <label for="birth_date" class="form-label">تاريخ الميلاد <span class="text-danger">*</span></label>
          <input type="date" class="form-control" name="birth_date" id="birth_date" value="<?php echo e($formType == 'edit' ? $student->birth_date : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="id_num" class="form-label">رقم الهوية</label>
          <input type="number" class="form-control" name="id_num" id="id_num" value="<?php echo e($formType == 'edit' ? $student->id_num : ''); ?>">
        </div>

        <div class="col-3 mb-3">
          <label for="phone_num" class="form-label">رقم الهاتف</label>
          <input type="number" class="form-control" name="phone_num" id="phone_num" value="<?php echo e($formType == 'edit' ? $student->phone_num : ''); ?>">
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

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\LaravelApps\DegreesPrinter\resources\views/pages/students/editor.blade.php ENDPATH**/ ?>