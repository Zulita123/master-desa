<?php
  include "system/proses.php";
?>   
<div class="page-header">
       <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-cup-water"></i>                 
          </span>
            Tabel Jasa
        </h3>
        <ol class="breadcrumb">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="index.php?p=jasa" method="POST">
            <select name="jenis_pencarian" class="btn-opo">
              <option>Pilih</option>
              <option value="kode_jasa">Kode Jasa</option>
              <option value="nama_jasa">Nama Jasa</option>
              <option value="harga">Harga</option>
            </select>
            <input type="text" name="cari_data" class="btn-opo">
            <button type="submit" name="cari" class="btn btn-inverse-danger btn-icon">
                <i class="mdi mdi-magnify"></i>
            </button>
          </form>
        </div>
        </ol>
</div>         
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <a class="card-description" href="index.php?p=f_jasa">
                    <button type="submit" class="btn btn-outline-danger btn-icon-text">
                        <i class="mdi mdi-account-plus btn-icon-prepend"></i>
                        Add New
                    </button>
                  </a>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Kode Jasa</th>
                        <th>Nama Jasa</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if(isset($_POST['cari'])){
                          $qw=$db->get("*","jasa","WHERE $_POST[jenis_pencarian] LIKE '%$_POST[cari_data]%'");
                      }else{
                        $qw=$db->get("*","jasa","ORDER BY kode_jasa ASC");
                      }
                        foreach ($qw as $tamp_jasa){
                      ?>
                      <tr>
                        <td><?php echo $tamp_jasa['kode_jasa'];?></td>
                        <td><?php echo $tamp_jasa['nama_jasa'];?></td>
                        <td><?php echo $tamp_jasa['harga'];?></td>
                        <td><?php echo $tamp_jasa['keterangan'];?></td>
                        <td>
                          <a href="index.php?p=f_jasa&kode_jasa=<?php echo $tamp_jasa['kode_jasa'];?>"><img src="images/gambar/edit.png" class="gbr"></a>
                          <a href="crud/hapus_jasa.php?kode_jasa=<?php echo $tamp_jasa['kode_jasa'];?>"><img src="images/gambar/hapus.png" class="gbr"></a>
                        </td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>