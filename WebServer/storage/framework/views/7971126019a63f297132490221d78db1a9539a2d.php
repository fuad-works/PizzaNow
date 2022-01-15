<?php $__env->startSection('page-title', 'Students System'); ?>

<?php $__env->startSection('page-head-title', 'عرض الدورات'); ?>

<?php $__env->startSection('page-content'); ?>
<div class="card">
  <div class="card-body">
    <div class="row justify-content-end">
      <div class="col-2"><a class="btn btn-primary col-12" href="<?php echo e(route('courses-create')); ?>" role="button"><i class="fas fa-plus"></i> إضافة</a></div>
    </div>
    <table id="students-table" class="table table-hover diplay">
      <thead>
        <tr>
          <th>#</th>
          <th>الدورة</th>
          <th>النوع</th>
          <th>تاريخ البدء</th>
          <th>تاريخ الانتهاء</th>
          <th>خيارات</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($course->id); ?></td>
          <td><?php echo e($course->title); ?></td>
          <td><?php echo e($course->type); ?></td>
          <td><?php echo e($course->start_date); ?></td>
          <td><?php echo e($course->end_date); ?></td>
          <td>
            <a href="<?php echo e(route('courses-edit', ['id' => $course->id])); ?>" class="btn btn-sm btn-success" role="button"><i class="fas fa-edit"></i></a>
            <a href="<?php echo e(route('courses-delete', ['id' => $course->id])); ?>" class="btn btn-sm btn-danger" role="button"><i class="fas fa-trash"></i></a>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer-scripts'); ?>
  <script>
    $(document).ready( function () {
      $('#students-table').DataTable({
        "language" : {
          "sEmptyTable":   	"لا يوجد بيانات",
          "sInfo":         	"عرض من _START_ إلى _END_ من _TOTAL_ سجل",
          "sInfoEmpty":    	"عرض 0 من صفر من أصل صفر سجل",
          "sInfoFiltered": 	"(من أصل _MAX_ سجل)",
          // "sInfoPostFix":  	"",
          "sInfoThousands":  	".",
          "sLengthMenu":   	"عرض _MENU_ سجل",
          "sLoadingRecords": 	"تحميل السجلات...",
          "sProcessing":   	"جاري المعالجة...",
          "sSearch":       	"بحث ",
          "sZeroRecords":  	"لا يوجد سجلات.",
          "oPaginate": {
            "sFirst":    	"البداية",
            "sPrevious": 	"السابق",
            "sNext":     	"التالي",
            "sLast":     	"النهاية"
          },
          "oAria": {
            // "sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
            // "sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
          }
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\StudentsSystem\resources\views/pages/courses/viewall.blade.php ENDPATH**/ ?>