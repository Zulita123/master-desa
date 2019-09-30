<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
<style type="text/css">
  .bl{
    text-align: center;
    margin-top: 10px;
  }
</style>
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Peminjaman</title>
</head>
<body style="background: #fff;">
  <h2 style="text-align: center;">Laporan Peminjaman</h2>
  <div class="bl">
    <span>Bulan : <?php echo $this->uri->segment(3);?></span>
    <span>Tahun : <?php echo $this->uri->segment(4);?></span>
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
</body>
</html>
<script type="text/javascript">
  window.print();
</script>
