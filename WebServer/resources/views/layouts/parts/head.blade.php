<head>
  <meta charset="utf-8">
  <title>@yield('page-title')</title>
  <!-- include libraries -->
  <!-- bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-5-1-3/bootstrap.rtl.min.css')}}">
  <script src="{{asset('plugins/bootstrap-5-1-3/bootstrap.min.js')}}"></script>
  <!-- fontawsome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawsome-5-15-3/all.min.css')}}">
  <script src="{{asset('plugins/fontawsome-5-15-3/all.min.js')}}"></script>
  <!-- jQuery -->
  <script src="{{asset('plugins/jquery-3-6-0/jquery-3.6.0.min.js')}}"></script>
  <!-- jquery datatable -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-5-0-1-datatable-1-11-3/dataTables.min.css')}}">
  <script src="{{asset('plugins/bootstrap-5-0-1-datatable-1-11-3/datatables.min.js')}}"></script>
  <!-- Popper -->
  <script src="{{asset('plugins/popper-2-4-4/popper.min.js')}}"></script>
  <!-- include layout initization -->
  <link rel="stylesheet" href="{{asset('css/layout.css')}}">
  @yield('head-styles')
  @yield('head-scripts')
</head>
