<?php $__env->startSection('page-title', 'rows System'); ?>

<?php $__env->startSection('page-content'); ?>
<div class="card">
  <div class="card-header">
    <?php echo e($formType == 'save' ? 'إنشاء' : 'تعديل'); ?> مستخدم
  </div>
  <div class="card-body">
    <form action="<?php echo e($formAction); ?>" method="post">
      <?php echo csrf_field(); ?>
      <input type="hidden" name="id" value="<?php echo e(isset($row) ? $row->id : '0'); ?>">
      <div class="row">
        <div class="col-3 mb-3">
          <label for="name" class="form-label is-invalid">الإسم الثلاثي <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" id="name" value="<?php echo e(isset($row) ? $row->name : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="email" class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" id="email" value="<?php echo e(isset($row) ? $row->email : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="phone_num" class="form-label">رقم الهاتف <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="phone_num" id="phone_num" value="<?php echo e(isset($row) ? $row->phone_num : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="user_type" class="form-label">نوع المستخدم <span class="text-danger">*</span></label>
          <select id="" class="form-select" name="user_type" id="user_type" aria-label="select user_type" required>
            <option value="1" <?php echo e(isset($row) ? ($row->user_type == 1 ? 'selected' : '') : ''); ?>>مدير</option>
            <option value="2" <?php echo e(isset($row) ? ($row->user_type == 2 ? 'selected' : '') : ''); ?>>زبون</option>
          </select>
        </div>

        <div class="col-3 mb-3">
          <label for="birth_date" class="form-label">اسم المستخدم <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="username" id="birth_date" value="<?php echo e(isset($row) ? $row->username : ''); ?>" required>
        </div>

        <div class="col-3 mb-3">
          <label for="password" class="form-label">كلمة المرور <span class="text-danger">*</span></label>
          <input type="password" required class="form-control" name="password" id="password" value="<?php echo e(isset($row) ? $row->password : ''); ?>">
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

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PizzaNow\resources\views/pages/users/editor.blade.php ENDPATH**/ ?>