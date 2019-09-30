 @extends('template.template')

@section('content')
 <section class="content">
      <div class="row">
        <!-- left column -->
       <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pembayaran Catering</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <div class="row">
                    <label class="col-sm-2 control-label">Id Petugas</label>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                      <input type="text" class="form-control" value="" >
                    </div> 
                  </div>


                  <div class="row">
                    <label class="col-sm-2 control-label">Id Transaksi</label>
                    <label class="col-sm-2 control-label">Tanggal Transaksi</label>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                      <input required="" type="text" class="form-control" value="{{$kode}}">
                    </div> 
                    <div class="col-xs-2">
                      <input type="text" class="form-control" value="{{date('Y-m-d')}}">
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-2 control-label">Id Pemesanan</label>
                    <label class="col-sm-2 control-label">Tanggal Pemesanan</label>
                    <label class="col-sm-2 control-label">Pembeli</label>
                    <label class="col-sm-2 control-label">Menu</label>
                    <label class="col-sm-2 control-label">Harga</label>
                    <label class="col-sm-1 control-label">Jumlah</label>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                      <input type="text" class="form-control" name="kode_pesan" id="kode_pesan" onkeyup="pemesanan();">
                    </div>
                    <div class="col-xs-2">
                      <input type="text" class="form-control" name="tgl_pesan" id="tgl_pesan">
                    </div> 
                    <div class="col-xs-2">
                      <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli">
                    </div>
                    <div class="col-xs-2">
                      <input type="text" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                      <input type="text" class="form-control" >
                    </div>
                    <div class="col-xs-1">
                      <input type="text" class="form-control" >
                    </div>
                  </div>
                  
              </div>
              </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="row">
                    <label class="col-sm-2 control-label">Total</label>
                    <label class="col-sm-2 control-label">Bayar</label>
                    <label class="col-sm-2 control-label">Kembali</label>
                    <label class="col-sm-2 control-label">Status</label>
                  </div>
                  <div class="row">
                    <div class="col-xs-2">
                      <input type="text" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                      <input type="text" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                      <input type="text" class="form-control" >
                    </div>
                    <div class="col-xs-2">
                      <input type="text" class="form-control" value="Telah Terbayar">
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
          @endsection
@section('scripts')
<script type="text/javascript">
    function pemesanan(){
        iddd = $("#kode_pesan").val()
        if (iddd=='') {
          $('#tgl_pesan').val('')
          $('#nama_pembeli').val('')

        }
        $.ajax({
          url:"{{url('cari/pemesanan')}}",
          type:"GET",
          dataType:"json",
          data:{
            id_pesan:$("#kode_pesan").val()
          },
          success:function(hasil){
            if (hasil.val==0) {

            $('#tgl_pesan').val('')
            $('#nama_pembeli').val('')

            }else if(hasil.val==2){
              $('#tgl_pesan').val('')
              $('#nama_pembeli').val('')

            }else{
              $('#tgl_pesan').val(hasil.data.tgl_pesan)
              $('#nama_pembeli').val(hasil.data.nama_pembeli)
                }
          }
        })
      }
</script>
@endsection