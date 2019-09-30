<div class="page-header">
       <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account-multiple menu-icon"></i>                 
          </span>
            Laporan
        </h3>
        <ol class="breadcrumb">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="index.php?p=laporan" method="POST">
            <select class="btn-opo" name="bulan" id="bulan">
              <?php
              if(isset($_POST['bulan'])){
                $bulan="$_POST[bulan]";
              }else{
                $bulan="01";
              }
              ?>
              <option <?php if($bulan=="01"){echo "selected";}?> value="01">Januari</option>
              <option <?php if($bulan=="02"){echo "selected";}?> value="02">Februari</option>
              <option <?php if($bulan=="03"){echo "selected";}?> value="03">Maret</option>
              <option <?php if($bulan=="04"){echo "selected";}?> value="04">April</option>
              <option <?php if($bulan=="05"){echo "selected";}?> value="05">Mei</option>
              <option <?php if($bulan=="06"){echo "selected";}?> value="06">Juni</option>
              <option <?php if($bulan=="07"){echo "selected";}?> value="07">Juli</option>
              <option <?php if($bulan=="08"){echo "selected";}?> value="08">Agustus</option>
              <option <?php if($bulan=="09"){echo "selected";}?> value="09">September</option>
              <option <?php if($bulan=="10"){echo "selected";}?> value="10">Oktober</option>
              <option <?php if($bulan=="11"){echo "selected";}?> value="11">November</option>
              <option <?php if($bulan=="12"){echo "selected";}?> value="12">Desember</option>
            </select>
            <button type="submit" name="cari" class="btn btn-social-icon btn-inverse-danger btn-rounded" style="margin-left: 10px;">
                <i class="mdi mdi-magnify"></i>
            </button>
            <button type="submit" name="print" class="btn btn-social-icon btn-inverse-secondary btn-rounded" style="margin-left: 10px;" onclick="cetak()">
                <i class="mdi mdi-printer"></i>
            </button>
          </form>
        </div>
        </ol>
</div>
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>No Slip</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Tunj Jabatan</th>
                        <th>Tunj Istri</th>
                        <th>Tunj Anak</th>
                        <th>Gaji Kotor</th>
                        <th>Potongan</th>
                        <th>Gaji Bersih</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        include "system/proses.php";
                        if(isset($_POST['cari'])){
                          $qwe=$db->get("gaji.no_slip,pegawai.nama,jabatan.nama_jabatan,jabatan.tj_jabatan,golongan.tj_suami_istri,golongan.tj_anak,gaji.pendapatan,gaji.potongan,gaji.gaji_bersih","pegawai","INNER JOIN gaji on gaji.nip=pegawai.nip INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan WHERE month(gaji.tanggal)='$_POST[bulan]' ORDER BY gaji.no_slip ASC");
                        }else{
                          $qwe=$db->get("gaji.no_slip,pegawai.nama,jabatan.nama_jabatan,jabatan.tj_jabatan,golongan.tj_suami_istri,golongan.tj_anak,gaji.pendapatan,gaji.potongan,gaji.gaji_bersih","pegawai","INNER JOIN gaji on gaji.nip=pegawai.nip INNER JOIN jabatan on jabatan.kode_jabatan=pegawai.kode_jabatan INNER JOIN golongan on golongan.kode_golongan=pegawai.kode_golongan");
                        }
                        $no=0;
                        $noo=0;
                        $nooo=0;
                        foreach ($qwe as $tampil){
                          $no=$no+$tampil['pendapatan'];
                          $noo=$noo+$tampil['potongan'];
                          $nooo=$nooo+$tampil['gaji_bersih'];
                      ?>
                      <tr>
                        <td><?php echo $tampil['no_slip'];?></td>
                        <td><?php echo $tampil['nama'];?></td>
                        <td><?php echo $tampil['nama_jabatan'];?></td>
                        <td><?php echo $tampil['tj_jabatan'];?></td>
                        <td><?php echo $tampil['tj_suami_istri'];?></td>
                        <td><?php echo $tampil['tj_anak'];?></td>
                        <td><?php echo "Rp. ". number_format($tampil['pendapatan'],2, ",", ".");?></td>
                        <td><?php echo "Rp. ". number_format($tampil['potongan'],2, ",", ".");?></td>
                        <td><?php echo "Rp. ". number_format($tampil['gaji_bersih'],2, ",", ".");?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>Jumlah:</td>
                      <td><b><?php echo "Rp. ". number_format($no,2, ",", ".");?></td>
                      <td><b><?php echo "Rp. ". number_format($noo,2, ",", ".");?></td>
                      <td><b><?php echo "Rp. ". number_format($nooo,2, ",", ".");?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
<script type="text/javascript">
  function cetak(){
    bulan=$("#bulan").val();
    window.open("content/print_laporan.php?bulan="+bulan);
  }
</script>