<div class="page-header">
       <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple menu-icon"></i>                 
          </span>
            Laporan Cucian Sudah Diambil
        </h3>
</div>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No Transaksi</th>
                        <th>No Order</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Jasa</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Total</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include "system/proses.php";
                          $qwe=$db->get("transaksi.no_transaksi,oder.nomer_order,transaksi.tgl_transaksi,pelanggan.nama_pelanggan,jasa.nama_jasa,jasa.harga,oder.berat_cucian,oder.total_harga,oder.status_cucian","oder","INNER JOIN transaksi on transaksi.nomer_order=oder.nomer_order INNER JOIN jasa on jasa.kode_jasa=oder.kode_jasa INNER JOIN pelanggan on pelanggan.kode_pelanggan=oder.kode_pelanggan WHERE oder.status_cucian='Sudah Diambil'");
                        foreach ($qwe as $tampil){
                      ?>
                      <tr>
                        <td><?php echo $tampil['no_transaksi'];?></td>
                        <td><?php echo $tampil['nomer_order'];?></td>
                        <td><?php echo $tampil['tgl_transaksi'];?></td>
                        <td><?php echo $tampil['nama_pelanggan'];?></td>
                        <td><?php echo $tampil['nama_jasa'];?></td>
                        <td><?php echo $tampil['harga'];?></td>
                        <td><?php echo $tampil['berat_cucian'];?></td>
                        <td><?php echo $tampil['total_harga'];?></td>
                        <td><?php echo $tampil['status_cucian'];?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
            </div>