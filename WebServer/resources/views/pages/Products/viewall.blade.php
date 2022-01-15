@extends('layouts.Site')

@section('page-title', 'Students System')

@section('page-head-title', 'جدول المنتجات')

@section('page-content')
<div class="card">
  <div class="card-body">
    <div class="row justify-content-end">
      <div class="col-2"><a class="btn btn-primary col-12" href="{{route('products-edit')}}" role="button"><i class="fas fa-plus"></i> إضافة</a></div>
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
        @foreach ($table as $row)
        <tr>

          <td>{{$row->id}}</td>
          <td><img src="{{ asset('assets/images/uploads/'.$row->image) }}" style="height:150px;" alt="صورة<?php echo $row->id; ?>"></td>
          <td>{{$row->name}}</td>
          <td>{{$row->price}}</td>
          <td>
            <a href="{{route('products-edit', ['id' => $row->id])}}" class="btn btn-sm btn-success" role="button"><i class="fas fa-edit"></i></a>
            <a href="{{route('products-delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" role="button"><i class="fas fa-trash"></i></a>
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
