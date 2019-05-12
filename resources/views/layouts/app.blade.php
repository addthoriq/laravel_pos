<!DOCTYPE html>
<html>
<head>
  @include('layouts.links')
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  @yield('css')
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    @include('layouts.part.header')
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
    @include('layouts.part.sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('layouts.part.footer')

</div>
<!-- ./wrapper -->

@include('layouts.part.script')
</body>
</html>
