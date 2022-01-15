<?php $__env->startSection('page-title', 'Students System'); ?>

<?php $__env->startSection('page-head-title', 'جدول المنتجات'); ?>

<?php $__env->startSection('page-content'); ?>
<div class="card">
  <div class="card-body">
    <div class="row justify-content-end">
      <div class="col-2"><a class="btn btn-primary col-12" href="<?php echo e(route('products-edit')); ?>" role="button"><i class="fas fa-plus"></i> إضافة</a></div>
    </div>
    <table id="products-table" class="table table-hover diplay">
      <thead>
        <tr>
          <th>#</th>
          <th>صورة المنتج</th>
          <th>اسم المنتج</th>
          <th>السعر</th>
          <th>خيارات</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

          <td><?php echo e($row->id); ?></td>
          <td><img src="<?php echo e(asset('assets/images/uploads/'.$row->image)); ?>" style="height:150px;" alt="صورة<?php echo $row->id; ?>"></td>
          <td><?php echo e($row->name); ?></td>
          <td><?php echo e($row->price); ?></td>
          <td>
            <a href="<?php echo e(route('products-edit', ['id' => $row->id])); ?>" class="btn btn-sm btn-success" role="button"><i class="fas fa-edit"></i></a>
            <a href="<?php echo e(route('products-delete', ['id' => $row->id])); ?>" class="btn btn-sm btn-danger" role="button"><i class="fas fa-trash"></i></a>
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

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PizzaNow\resources\views/pages/Products/viewall.blade.php ENDPATH**/ ?>