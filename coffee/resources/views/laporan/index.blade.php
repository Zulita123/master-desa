 @extends('template.template')
 @section('content')
<section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
             <h3 class="box-title">{{$page_titel}}</h3></div>
             <div class="box-body">
              <div class="row">
                <label class="col-sm-2 control-label">Bulan</label>
                <label class="col-sm-1 control-label">Tahun</label>
              </div>
              <div class="row">
              <form action="{{url('/laporan')}}" method="POST">
                @csrf
                <div class="col-xs-2">
                  <select class="form-control" id="bulan" name="bulan">
                    <?php if(empty($bulan)){
                      $bulan = "00";
                    }
                    ?>
                    <option value="01" <?php if($bulan=="01"){echo "selected";}?>>Januari</option>
                    <option value="02" <?php if($bulan=="02"){echo "selected";}?>>Februari</option>
                    <option value="03" <?php if($bulan=="03"){echo "selected";}?>>Maret</option>
                    <option value="04" <?php if($bulan=="04"){echo "selected";}?>>April</option>
                    <option value="05" <?php if($bulan=="05"){echo "selected";}?>>Mei</option>
                    <option value="06" <?php if($bulan=="06"){echo "selected";}?>>Juni</option>
                    <option value="07" <?php if($bulan=="07"){echo "selected";}?>>Juli</option>
                    <option value="08" <?php if($bulan=="08"){echo "selected";}?>>Agustus</option>
                    <option value="09" <?php if($bulan=="09"){echo "selected";}?>>September</option>
                    <option value="10" <?php if($bulan=="10"){echo "selected";}?>>Oktober</option>
                    <option value="11" <?php if($bulan=="11"){echo "selected";}?>>November</option>
                    <option value="12" <?php if($bulan=="12"){echo "selected";}?>>Desember</option>
                  </select>
                </div>
                <div class="col-xs-2">
                  <select name="tahun" id="tahun" class="form-control">
                    <?php
                      $qw=\DB::table('pemesanan')->get();
                      if (empty($tahun)) {
                      $tahun = "0000";
                      }
                      foreach ($qw as $tpa) {
                        $data = explode('-',$tpa->tgl_pesan);
                        $thn  = $data[0];
                    ?>
                    <option <?php if($tahun == $thn){echo "selected";}?>>{{$thn}}</option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
                <div class="col-xs-1">
                  <input type="submit" class="btn btn-warning" value="Cari" >
                </div> 
              <div class="col-xs-1">
                <input type="submit" class="btn btn-danger" value="Cetak" onclick="ctk()">
              </div> 
            </div>
          </form>
              <hr>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Pemesan</th>
                  <th>Tanggal Pesan</th>
                  <th>Nama Pembeli</th>
                  <th>Alamat</th>
                  <th>Nama Menu</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Total</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($laporan as $index=>$n)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$n->kode_pesan}}</td>
                  <td>{{$n->tgl_pesan}}</td>
                  <td>{{$n->pembeli->nama_pembeli}}</td>
                  <td>{{$n->pembeli->alamat_pembeli}}</td>
                  <td>{{$n->menu->nama_menu}}</td>
                  <td>{{$n->menu->harga_menu}}</td>
                  <td>{{$n->jumlah_beli}}</td>
                  <td>{{$n->total_harga}}</td>
                  <td>{{$n->status}}</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>
 @endsection
 <script type="text/javascript">
  function ctk(){
    bulan=$("#bulan").val();
    tahun=$("#tahun").val();
    window.open("{{url('laporan/form')}}"+"/"+bulan+"/"+tahun,"_blank");
  }
</script>