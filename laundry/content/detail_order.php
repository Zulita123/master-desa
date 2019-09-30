<?php 
  include"../system/proses.php";
?>
<table class="table table-hover">
                    <thead>
                      <tr class="table-danger">
                        <th>No Order</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl_Selesai</th>
                        <th>Nama Jasa</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $tglskrg=date('Y-m-d');
                        $qwe=$db->get("oder.nomer_order,oder.tgl_order,oder.tgl_rencana_selesai,jasa.nama_jasa,jasa.harga,oder.berat_cucian,oder.total_harga","oder","INNER JOIN jasa on jasa.kode_jasa=oder.kode_jasa ORDER BY nomer_order DESC LIMIT 1");
                        foreach($qwe as $tamp_Order){
                    ?>
                      <tr>
                        <td><?php echo $tamp_Order['nomer_order'];?></td>
                        <td><?php echo $tamp_Order['tgl_order'];?></td>
                        <td><?php echo $tamp_Order['tgl_rencana_selesai'];?></td>
                        <td><?php echo $tamp_Order['nama_jasa'];?></td>
                        <td><?php echo $tamp_Order['harga'];?></td>
                        <td><?php echo $tamp_Order['berat_cucian'];?></td>
                        <td><?php echo $tamp_Order['total_harga'];?></td>
                        <td>
                          <a href="crud/hapus_order.php?nomer_order=<?php echo $tamp_Order['nomer_order'];?>"><img src="images/gambar/hapus.png" class="gbr"></a>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>