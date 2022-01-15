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
          <td>{{$row->name}}</td>
          <td>{{$row->username}}</td>
          <td>{{$row->email}}</td>
          <td>
            <a href="{{route('users-edit', ['id' => $row->id])}}" class="btn btn-sm btn-success" role="button"><i class="fas fa-edit"></i></a>
            <a href="{{route('users-delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" role="button"><i class="fas fa-trash"></i></a>
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
