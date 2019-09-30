<!DOCTYPE html>
<html>
<head>
  @include('template.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('template.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('template.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$page_titel}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Form</a></li>
        <li class="active">{{$page_titel}}</li>
      </ol>
    </section>

    <!-- Main content -->
    @if(Session::get('message')!='')
   <div class="col-sm-12">
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

      <h4>
        <i class="icon fa fa-info"></i> Perhatian
      </h4>
      {{Session::get('message')}}
    </div>
   </div>
   @endif


    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('template.footer')

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
 @stack('bottom')
 <script src="{{url('asset/js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('asset/css/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{url('asset/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{url('asset/js/jquery.inputmask.js')}}"></script>
<script src="{{url('asset/js/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('asset/js/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{url('asset/js/moment.min.js')}}"></script>
<script src="{{url('asset/js/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{url('asset/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{url('asset/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{url('asset/js/bootstrap-timepicker.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('asset/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('asset/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('asset/js/jquery.slimscroll.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{url('asset/js/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('asset/js/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('asset/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('asset/js/demo.js')}}"></script>

<script src="{{url('js/sweetalert.min.js')}}"></script>
<!-- CK Editor -->
<script src="{{url('asset/js/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('asset/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Page script -->


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

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
  })
</script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

@yield('scripts')
</body>
</html>
