@extends('layouts.Site')

@section('page-title', 'Students System')

@section('page-head-title', 'جدول المستخدمين')

@section('page-content')
<div class="card">
  <div class="card-body">
    <div class="row justify-content-end">
      <div class="col-2"><a class="btn btn-primary col-12" href="{{route('users-edit')}}" role="button"><i class="fas fa-plus"></i> إضافة</a></div>
    </div>
    <table id="users-table" class="table table-hover diplay">
      <thead>
        <tr>
          <th>#</th>
          <th>تاريخ الطلب</th>
          <th>حالة الطلب</th>
          <th>المستخدم</th>
          <th>تقاصيل الطلب</th>
          <th>المبلغ الإجمالي</th>
          <th>خيارات</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($table as $row)
        <tr>
          <td>{{$row->id}}</td>
          <td>
          <?php
          switch ($row->status) {
            case '1':
              echo "طلب جديد";
              break;

            case '2':
              echo "قيد التوصيل";
              break;

            case '3':
              echo "منفذ";
              break;

            case '4':
              echo "ملغي";
              break;
          }
          ?>
          </td>
          <td>{{$row->order_date}}</td>
          <td>{{$row->user->name}}</td>
          <td>
            <table class="table table-borderd">
              <tr><th>المادة</th><th>التخصيص</th><th>السعر</th></tr>
              <?php
              $total = 0;
              foreach ($row->details as $detail) {
                $total += $detail->product->price;
                ?>
                <tr><td>{{$detail->product->name}}</td><td>{{$detail->customize}}</td><td>{{$detail->product->price}}</td></tr>
                <?php
              }
              ?>
            </table>
          </td>
          <td>{{$total}}</td>

          <td>
            <a href="{{route('orders-set', ['id' => $row->id, 'to' => 2])}}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-edit"></i> قيد التوصل</a>
            <a href="{{route('orders-set', ['id' => $row->id, 'to' => 4])}}" class="btn btn-sm btn-danger" role="button"><i class="fas fa-trash"></i> ملغي</a>
            <a href="{{route('orders-set', ['id' => $row->id, 'to' => 3])}}" class="btn btn-sm btn-success" role="button"><i class="fas fa-check"></i> منفذ</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('footer-scripts')
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
@endsection
