
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('assets/js/fastclick.js')}}"></script>
<script src="{{url('assets/js/adminlte.min.js')}}"></script>
<script src="{{url('assets/js/demo.js')}}"></script>
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