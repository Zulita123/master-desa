<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIM Desa</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/sweetalert/css/sweetalert.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('backend/dist/css/skins/skin-blue.min.css')}}">
  <!-- Morris chart -->
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIM</b> Desa</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('backend/dist/img/logo.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">dfgdg</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('backend/dist/img/logo.png')}}" class="" alt="User Image">

                <p>
                  hjh
                  <small>{{date('d-M-Y')}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a onclick="lg()" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('backend/dist/img/logo.png')}}" class="" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>PEMERINTAH DESA</p>
          <p style="font-weight: bold;">TULAKAN</p>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php
      /*

      if(Session::get('level')=="Admin"){
        $dsb='';
        $adm='';
        $gru='hidden';
        $sws='hidden';
        $mt='hidden';
      }elseif(Session::get('level')=="Guru"){
        $dsb='';
        $adm='hidden';
        $gru='';
        $sws='hidden';
        $mt='';
      }else{
        $dsb='';
        $adm='hidden';
        $gru='hidden';
        $sws='';
        $mt='';
      }
      */
      ?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">WEBSITE</li>
        <li class="active">
          <a href="{{url('/dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
         <li class="treeview" >
          <a href="#">
            <i class="fa fa-desktop"></i>
            <span>Halaman Depan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/materi/filter')}}"><i class="fa fa-circle-o"></i> Identitas Web</a></li>
            <li><a href="{{url('/materi/filter')}}"><i class="fa fa-circle-o"></i> Slider</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bullhorn"></i>
            <span>Profil Desa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/mastercontrol/sejarah')}}"><i class="fa fa-circle-o"></i> Sejarah Desa</a></li>
            <li><a href="{{url('/mastercontrol/profilwilayah')}}"><i class="fa fa-circle-o"></i> Profil Wilayah</a></li>
            <li><a href="{{url('/mastercontrol/artilambang')}}"><i class="fa fa-circle-o"></i> Arti Lambang</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Pemerintah Desa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{url('/mastercontrol/visimisi')}}"><i class="fa fa-circle-o"></i> Visi & Misi</a></li>
            <li><a href="{{url('/mastercontrol/pemerintah')}}"><i class="fa fa-circle-o"></i> Pemerintah Desa</a></li>
            <li><a href="{{url('/mastercontrol/bpd')}}"><i class="fa fa-circle-o"></i> Badan Permusyawaratan Desa</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-flash"></i>
            <span>LemMas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/tugas/tampil')}}"><i class="fa fa-circle-o"></i> LPM</a></li>
            <li><a href="{{url('/tugas/fcektugas')}}"><i class="fa fa-circle-o"></i> Karang Taruna</a></li>
            <li><a href="{{url('/tugas/filter')}}"><i class="fa fa-circle-o"></i> PKK</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('konten')
    <!-- Content Header (Page header) -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1
    </div>
    <strong>Copyright &copy; 2019 Muhammad Ilham Syafi'i</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/bower_components/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('backend/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{asset('backend/sweetalert/js/sweetalert-dev.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
  $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
  });
  $('#datepicker1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
  });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
  });
  $(document).ready(function(){setTimeout(function(){$("#psn").fadeIn('slow');}, 500);});
//            angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
            setTimeout(function(){$("#psn").fadeOut('slow');}, 3000);
  function lg(){
    swal({
      title: "Are you sure?",
      text: "Kamu yakin ingin keluar dari halaman ini !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, logout !",
      closeOnConfirm: false
    },
    function(){
      swal("Logout!", "Berhasil logout.", "success");
      document.location='{{url("/logout")}}';
    });
  }
      $(document).ready(function(){
   $('#upload_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
     url:"{{url('/materi/action')}}",
     method:"POST",
     data:new FormData(this),
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
       if(data=="Berhasil"){
        setTimeout(function(){$("#psna").fadeIn('slow');}, 500);
        setTimeout(function(){$("#psna").fadeOut('slow');}, 3000);
        $("#file_lampiran").val("");
        buka_tab();
       }else{
        setTimeout(function(){$("#psne").fadeIn('slow');}, 500);
        setTimeout(function(){$("#psne").fadeOut('slow');}, 3000);
        $("#file_lampiran").val("");
        buka_tab();
       }
     }
    })
   });
});
$(document).ready(function(){
   $('#upload_form2').on('submit', function(event){
    event.preventDefault();
    $.ajax({
     url:"{{url('/tugas/action')}}",
     method:"POST",
     data:new FormData(this),
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
       if(data=="Berhasil"){
        setTimeout(function(){$("#psna").fadeIn('slow');}, 500);
        setTimeout(function(){$("#psna").fadeOut('slow');}, 3000);
        $("#file_lampiran").val("");
        buka_tab();
       }else{
        setTimeout(function(){$("#psne").fadeIn('slow');}, 500);
        setTimeout(function(){$("#psne").fadeOut('slow');}, 3000);
        $("#file_lampiran").val("");
        buka_tab();
       }
     }
    })
   });
});
</script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>
