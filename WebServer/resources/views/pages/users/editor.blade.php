@extends('layouts.Site')

@section('page-title', 'rows System')

@section('page-content')
<div class="card">
  <div class="card-header">
    {{$formType == 'save' ? 'إنشاء' : 'تعديل'}} مستخدم
  </div>
  <div class="card-body">
    <form action="{{$formAction}}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{isset($row) ? $row->id : '0'}}">
      <div class="row">
        <div class="col-3 mb-3">
          <label for="name" class="form-label is-invalid">الإسم الثلاثي <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="name" id="name" value="{{ isset($row) ? $row->name : ''}}" required>
        </div>

        <div class="col-3 mb-3">
          <label for="email" class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
          <input type="email" class="form-control" name="email" id="email" value="{{isset($row) ? $row->email : ''}}" required>
        </div>

        <div class="col-3 mb-3">
          <label for="phone_num" class="form-label">رقم الهاتف <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="phone_num" id="phone_num" value="{{isset($row) ? $row->phone_num : ''}}" required>
        </div>

        <div class="col-3 mb-3">
          <label for="user_type" class="form-label">نوع المستخدم <span class="text-danger">*</span></label>
          <select id="" class="form-select" name="user_type" id="user_type" aria-label="select user_type" required>
            <option value="1" {{isset($row) ? ($row->user_type == 1 ? 'selected' : '') : ''}}>مدير</option>
            <option value="2" {{isset($row) ? ($row->user_type == 2 ? 'selected' : '') : ''}}>زبون</option>
          </select>
        </div>

        <div class="col-3 mb-3">
          <label for="birth_date" class="form-label">اسم المستخدم <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="username" id="birth_date" value="{{isset($row) ? $row->username : ''}}" required>
        </div>

        <div class="col-3 mb-3">
          <label for="password" class="form-label">كلمة المرور <span class="text-danger">*</span></label>
          <input type="password" required class="form-control" name="password" id="password" value="{{isset($row) ? $row->password : ''}}">
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
@endsection
