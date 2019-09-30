<!DOCTYPE html>
<html>
<head>
  @include('template.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('template.header')
  
  @include('template.sidebar')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$page_titel}}
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$page_titel}}</li>
      </ol>
    </section>

    <!-- Main content -->
    @if(Session::get('message')!='')
    <div class="col-sm-12">
      <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
      <h4><i class="icon fa fa-info"></i> Perhatian</h4> {{Session::get('message')}}
    </div>
    </div>
    @endif
   @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('template.footer')

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

  @include('template.script')
  @stack('bottom')
</body>
</html>
