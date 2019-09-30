 @extends('template.template')

@section('content')
 <section class="content">
      <div class="row">
        <!-- left column -->
       <div class="col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pemesanan Catering</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{url('pemesanan/store')}}">
              {{csrf_field()}}
              <div class="box-body">
                <div class="row">
                  <div class="form-group" style="margin: 10px;">
                    <label class="col-sm-2 control-label">Id Petugas</label>
                     <div class="col-xs-3">
                      <input type="text" class="form-control" required="" value="" >
                    </div> 
                  </div>
                </div>
                              <div class="row">
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                  <label class="col-sm-3 control-label"></label>
                  <label class="col-sm-2 control-label">Tanggal Pemesanan</label>
                  <label class="col-sm-3 control-label">Tanggal Pengambilan</label>
                </div>
              </div>
              <div class="row">
                <div class="form-group" style="margin: 10px;">
                   <label class="col-sm-2 control-label">Kode Pemesanan</label>
                   <div class="col-xs-3">
                      <input required="" type="text" name="kode_pesan" id="kode_pesan" class="form-control" value="{{$kode}}">
                    </div> 
                </div>
                <div class="form-group">
                  <div class="col-xs-3">
                      <input type="text" class="form-control" name="tgl_pesan" value="{{date('Y-m-d')}}">
                    </div>
                </div>
                <div class="form-group">
                   <div class="col-xs-3">
                      <input type="date" name="tgl_ambil" class="form-control" >
                    </div>
                </div>
              </div>
                <div class="row">
                  <div class="form-group" style="margin: 10px;">
                    <label class="col-sm-3 control-label"></label>
                    <label class="col-sm-3 control-label"></label>
                    <label class="col-sm-3 control-label">Kode Pembeli</label>
                    <label class="col-sm-3 control-label">Alamat</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group" style="margin: 10px;">
                     <label class="col-sm-2 control-label">Nama Pembeli</label>
                      <div class="col-xs-3">
                      <input type="text" required="" class="form-control" placeholder="Nama Pembeli" name="nama_pembeli" id="nama_pembeli" onkeyup="pembeli()">
                    </div>
                  </div>
                  <div class="form-group" style="margin: 10px;">
                      <div class="col-xs-3">
                      <input type="text" required="" class="form-control" placeholder="Kode Pembeli" name="kode_pembeli" id="kode_pembeli">
                    </div>
                  </div>
                  <div class="form-group" style="margin-bottom: -50px;">
                    <div class="col-xs-3">
                      <textarea rows="3" required="" readonly="" class="form-control" name="alamat_pembeli" id="alamat_pembeli" placeholder="Alamat"></textarea>
                    </div>
                  </div>
                </div>
              <div class="row">
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <label class="col-sm-3 control-label"></label>
                    <label class="col-sm-3 control-label">Nama Menu</label>
                    <label class="col-sm-3 control-label">Harga</label>
                </div>
              </div>
              <div class="row">
                <div class="form-group" style="margin: 10px;">
                   <label class="col-sm-2 control-label">Kode Menu</label>
                    <div class="col-xs-3">
                      <input type="text" required="" class="form-control" onkeyup="menu()" name="kode_menu" id="kode_menu" >
                    </div> 
                </div>
                <div class="form-group">
                  <div class="col-xs-3">
                      <input type="text" class="form-control" readonly="" name="nama_menu" id="nama_menu" >
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3">
                      <input type="number" readonly="" class="form-control" name="harga_menu" id="harga_menu" >
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                  <label class="col-sm-3 control-label">Keterangan</label>
                </div>
              </div>
              <div class="row">
                <div class="form-group" style="margin: 10px;">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-xs-3">
                      <input type="text" class="form-control" readonly="" name="keterangan" id="keterangan" >
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group" style="margin: 5px;">
                  <label class="col-sm-3 control-label"></label>
                  <label class="col-sm-3 control-label">Wilayah</label>
                  <label class="col-sm-3 control-label">Kode Ongkir</label>
                  <label class="col-sm-3 control-label">Harga</label>
                </div>
              </div>
              <div class="row">
                <div class="form-group" style="margin: 10px;">
                  <label class="col-sm-2 control-label">Ongkir</label>
                  <div class="col-xs-3">
                      <input type="text" required="" class="form-control" name="nama" id="nama" onkeyup="ongkir()">
                    </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="kode_ongkir" id="kode_ongkir" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-3">
                      <input type="text" class="form-control" readonly="" name="harga_ongkir" id="harga_ongkir" >
                  </div>
              </div>
              <div class="row">
                <div class="form-group" style="margin: 5px;">
                  <label class="col-sm-3 control-label"></label>
                  <label class="col-sm-3 control-label">Jumlah</label>
                  <label class="col-sm-3 control-label">Total</label>
                </div>
              </div>
              <div class="row">
                <div class="form-group" style="margin: 10px;">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-xs-3">
                      <input type="text" required="" class="form-control" name="jumlah_beli" id="jumlah_beli" onkeyup="tot()" >
                    </div>
                </div>
                <div class="form-group" >
                  <div class="col-xs-3">
                      <input type="number" class="form-control" readonly="" name="total_harga" id="total_harga" >
                  </div>
              </div>
               <div class="col-xs-2" style="padding-left: 20px; margin-left: 10px; margin-top: 5px;">
                      <button type="submit" class="btn btn-danger" >Simpan</button>
                      <span class="submitLoading" style="display: none;"><img src="{{ asset('loading.gif') }}"></span>
                        <a href="{{Request::get('return_url')}}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            
              <!-- /.box-body -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover" style="margin: 20px;" >
                <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Pemesanan</th>
                  <th>Tanggal Pemesanan</th>
                  <th>Tanggal Pengambilan</th>
                  <th>Nama Menu</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $index=>$p)
                <tr>
                  <td>{{ $index+1 }}</td>
                  <td>{{ $p->kode_pesan }}</td>
                  <td>{{ $p->tgl_pesan }}</td>
                  <td>{{ $p->tgl_ambil }}</td>
                  <td>{{ $p->menu->nama_menu }}</td>
                  <td>{{ $p->menu->harga_menu }}</td>
                  <td>{{ $p->jumlah_beli }}</td>
                  <td>{{ $p->total_harga }}</td>
                  <td>
                    <a href="{{url('pemesanan/delete/'.$p->id_pesan)}}" onclick="return confirm('Apakah anda yakin??')" class="btn-danger btn-xs"><i class="fa fa-remove"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
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
      function menu(){
        iddd = $("#kode_menu").val()
        if (iddd=='') {
          $('#nama_menu').val('')
          $('#harga_menu').val('')
          $("#keterangan").val('')
        }
        $.ajax({
          url:"{{url('cari/menu')}}",
          type:"GET",
          dataType:"json",
          data:{
            id_menu:$("#kode_menu").val()
          },
          success:function(hasil){
            if (hasil.val==0) {

            $('#nama_menu').val('')
            $('#harga_menu').val('')
            $("#keterangan").val('')

            }else if(hasil.val==2){
              $('#nama_menu').val('')
              $('#harga_menu').val('')
              $("#keterangan").val('')

            }else{
              $('#nama_menu').val(hasil.data.nama_menu)
              $('#harga_menu').val(hasil.data.harga_menu)
              $("#keterangan").val(hasil.data.keterangan)
                }
          }
        })
      }
       function pembeli(){
        iddd = $("#nama_pembeli").val()
        if (iddd=='') {
          $('#alamat_pembeli').val('')
          $('#kode_pembeli').val('')
        }
        $.ajax({
          url:"{{url('cari/pembeli')}}",
          type:"GET",
          dataType:"json",
          data:{
            id_pembeli:$("#nama_pembeli").val()
          },
          success:function(hasil){
            if (hasil.val==0) {

            $('#alamat_pembeli').val('')
             $('#kode_pembeli').val('')

            }else if(hasil.val==2){
              $('#alamat_pembeli').val('')
               $('#kode_pembeli').val('')

            }else{
              $('#alamat_pembeli').val(hasil.data.alamat_pembeli)
               $('#kode_pembeli').val(hasil.data.kode_pembeli)
                }
          }
        })
      }
      function ongkir(){
        iddd = $("#nama").val()
        if (iddd=='') {
          $('#harga_ongkir').val('')
          $('#kode_ongkir').val('')
        }
        $.ajax({
          url:"{{url('cari/ongkir')}}",
          type:"GET",
          dataType:"json",
          data:{
            id_ongkir:$("#nama").val()
          },
          success:function(hasil){
            if (hasil.val==0) {

            $('#harga_ongkir').val('')
            $('#kode_ongkir').val('')

            }else if(hasil.val==2){
              $('#harga_ongkir').val('')
              $('#kode_ongkir').val('')

            }else{
              $('#harga_ongkir').val(hasil.data.harga_ongkir)
              $('#kode_ongkir').val(hasil.data.kode_ongkir)
                }
          }
        })
      }
      function tot(){
        hrg=$("#harga_menu").val();
        jml=$("#jumlah_beli").val();
        ong=$("#harga_ongkir").val();
        $("#total_harga").val( hrg * jml + parseInt(ong) );
      }
    </script>
    @endsection