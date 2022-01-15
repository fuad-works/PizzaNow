<?php $__env->startSection('page-title', 'Students System'); ?>

<?php $__env->startSection('page-content'); ?>
<table id="students-table" class="table table-hover diplay">
  <thead>
    <tr>
      <th>#</th>
      <th>الاسم الأول</th>
      <th>اسم الأب</th>
      <th>الكنية</th>
      <th>الحنس</th>
      <th>تاريخ الميلاد</th>
      <th>خيارات</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>row1</td>
      <td>row1</td>
      <td>row1</td>
      <td>row1</td>
      <td>row1</td>
      <td>
        <a href="#" class="btn btn-sm btn-success" role="button"><i class="fas fa-edit"></i></a>
        <a href="#" class="btn btn-sm btn-danger" role="button"><i class="fas fa-trash"></i></a>
        <a href="#" class="btn btn-sm btn-primary" role="button"><i class="fas fa-info-circle"></i></a>
      </td>
    </tr>
  </tbody>
</table>
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

<?php echo $__env->make('layouts.Site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\StudentsSystem\resources\views/students/viewall.blade.php ENDPATH**/ ?>