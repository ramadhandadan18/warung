<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
switch ($_GET['act']) {
    // PROSES VIEW DATA USER //      
  case 'view':
?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Transaksi Pemesanan </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pmsn&act=view">Data Transaksi Pemesanan</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-list"></i>
                  <h3 class="box-title">Halaman Transaksi Pemesanan Menu</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <a href="?pg=pmsn&act=add"> <button type="button" class="btn btn-danger" style="background-color: #dd3974 !important;"><i class="fa fa-plus"> Tambah Data </i></button> </a>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Kode Transaksi</th>
                          <th>Nomer Meja</th>
                          <th>Atas Nama</th>
                          <th>Total</th>
                          <th>Status</th>
                          <!--   <th>Total</th> -->
                          <!-- <th>Edit</th> -->
                          <th>Detail</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        error_reporting(0);
                        // $tampil=mysql_query("SELECT a.*,a.id as id_trans ,b.*,c.nama_menu as nama_menu, d.* FROM transaksi_pemesanan a INNER JOIN transaksi_pemesanan_detail b ON a.id=b.id_pemesanan
                        //  INNER JOIN menu c ON b.id_menu=c.id INNER JOIN harga d ON d.id_menu=c.id
                        //  order by a.tgl asc");
                        $tampil = $mysqli->query(" SELECT * FROM transaksi_pemesanan order by tgl asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                          if ($r['status'] == 0) {
                            $status = "<button type='button' class='btn btn-danger'><i class ='fa  fa-exclamation-triangle'> Belum Bayar</i></button>";
                          } else {
                            $status = "<button type='button' class='btn btn-primary' style='background-color: #dd3974 !important;''><i class ='fa fa-check-square'> Sudah Bayar</i></button>";
                          }
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[tgl]" ?></td>
                            <td><?php echo "$r[kd_transaksi]" ?></td>
                            <td><?php echo "$r[nomer_meja]" ?></td>
                            <td><?php echo "$r[atas_nama]" ?></td>
                            <td><?php echo "Rp. " . number_format("$r[total]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "$status" ?></td>
                            <!--  <td><a href="?pg=pmsn&act=edit&id=<?php echo $r['id_trans'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td> -->
                            <td><a href="?pg=pmsn&act=detail&id=<?php echo $r['id'] ?>" title="Detail Pemesanan"><button type="button" class="btn bg-orange"><i class="fa fa-eye"></i></button></a></td>
                            <td><a href="?pg=pmsn&act=delete_psn&id=<?php echo $r['id'] ?>" title="Hapus Pemesanan"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
                          </tr>

                        <?php
                          $no++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div><!-- /.box -->
            </div> <!-- /.col -->
          </div>
          <!-- /.row (main row) -->
        </section> <!-- /.content -->
      </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->

  <?php
    break;
    // PROSES TAMBAH DATA Transaksi Pemesanan //
  case 'add':
    error_reporting(0);

    if (isset($_POST['add'])) {
      // $total = $_POST['jumlah'] * $_POST['harga'];
      $kd_transaksi = $_POST['kd_transaksi'];
      $no_meja =  $_POST['no_meja'];
      $atas_nama = $_POST['atas_nama'];
      $jumlah =  $_POST['jumlah'];
      $harga =  $_POST['harga'];
      $id_menu =  $_POST['id_menu'];
      $total = $_POST['total'];
      $tgl = date('Y-m-d');

      ///////////////////////////membuat jumlah item yang adippilih
      $jumlah_menu = count($_POST['id_menu']);

      ////////////////////query untuk save ke tabel transaksi_pemesanan
      $query = $mysqli->query("INSERT INTO transaksi_pemesanan  (id,kd_transaksi,tgl,nomer_meja,atas_nama,total)
  VALUES ('','$_POST[kd_transaksi]','$tgl','$_POST[no_meja]','$_POST[atas_nama]','$total')");
      $id_pemesanan = $mysqli->insert_id();
      for ($i = 0; $i < $jumlah_menu; $i++) {
        ///////////////////perulanagan 
        $masukkan = $mysqli->query("INSERT INTO transaksi_pemesanan_detail (id,id_pemesanan,id_menu,porsi)
    VALUES ('','$id_pemesanan', '$id_menu[$i]','$jumlah[$i]')");

        // update stok beberapa menu yg dipilih
        $update_stok = $mysqli->query("UPDATE stok set sisa=sisa-$jumlah[$i] where id_menu=$id_menu[$i]");
      }
      // echo $update_stok;
      // die();

      $delete_temp_transaksi_pemesanan = $mysqli->query("DELETE FROM temp_transaksi_pemesanan");

      echo "<script>window.location='home.php?pg=pmsn&act=view'</script>";
    }
    //////////////////untuk menyimpan sementara menu yang dipilih ketabel temp_transaksi_pemesanan
    if (isset($_POST['add_temp'])) {
      $total = $_POST['jumlah'] * $_POST['harga'];
      $query = $mysqli->query("INSERT INTO temp_transaksi_pemesanan  (id,tgl,id_menu,id_harga,jumlah,total)
    VALUES ('','$_POST[tgl]','$_POST[id_menuku]','$_POST[id_harga]','$_POST[jumlah]','$total')");
      echo "<script>window.location='home.php?pg=pmsn&act=add'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Transaksi Pemesanan </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pmsn&act=view">Data Transaksi Pemesanan</a></li>
            <li class="active"><a href="#">Tambah Data Transaksi Pemesanan</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-body">
                  <!-- form start -->
                  <form role="form" method="POST" action="">
                    <div class="box-body">

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Transaksi</label>
                        <input class="form-control" id="date" name="tgl" placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
                      </div>


                      <?php $jsArray = "var HargaSatuan = new Array();\n"; ?>
                      <!-- Select2 Single Item -->
                      <div class="form-group">
                        <label>Pilih menu</label>
                        <select id='id_harga' name='id_harga' class="form-control select2" onchange="changeValue(this.value)" data-validation="[NOTEMPTY]">
                          <option value="">-- Silahkan Pilih menu dan Satuan --</option>
                          <?php
                          $result = $mysqli->query("SELECT harga.*,menu.*,harga.id as id_harga , menu.id as id_menu from harga inner join menu ON menu.id=harga.id_menu");
                          while ($row = mysqli_fetch_array($result)) {
                            if ($d['id_harga'] == $row['id']) {
                              echo "<option value='$row[id_harga]' selected>" . $row['nama'] . " - PER " . $row['satuan'] . "</option>";
                              $jsArray .= "HargaSatuan['" . $row['id_harga'] . "'] = {harga:'" . addslashes($row['harga']) . "',menu:'" . addslashes($row['id_menu']) . "'};\n";
                            } else {
                              echo "<option value='$row[id_harga]'>" . $row['nama_menu'] . "</option>";
                              $jsArray .= "HargaSatuan['" . $row['id_harga'] . "'] = {harga:'" . addslashes($row['harga']) . "',menu:'" . addslashes($row['id_menu']) . "'};\n";
                            }
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">id menu</label>
                        <input class="form-control" id="id_menu" name="id_menu" value="" type="text" disabled="" required data-fv-notempty-message="Tidak boleh kosong" />
                        <input class="form-control" id="id_menuku" name="id_menuku" value="" type="hidden" required data-fv-notempty-message="Tidak boleh kosong" />
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Harga Per Satuan</label>
                        <input class="form-control" id="hargaku" name="hargaku" value="" type="text" disabled="" required data-fv-notempty-message="Tidak boleh kosong" />
                        <input class="form-control" id="harga" name="harga" value="" type="hidden" required data-fv-notempty-message="Tidak boleh kosong" />
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Pesan</label>
                        <input class="form-control" id="jumlah" name="jumlah" onchange="total(this.value)" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
                        <!-- <input onclick="proses()" type="button" value="Tampilkan"/> -->

                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <h3><label for="exampleInputEmail1">Total : </label></h3>
                            <!-- <input class="form-control" id="total" name="total" type="text" required data-fv-notempty-message="Tidak boleh kosong"/> -->

                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <!-- <input class="form-control" id="total" name="total" type="text" required data-fv-notempty-message="Tidak boleh kosong"/> -->
                            <h3> <b>
                                <div id="hasil"> <input class="form-control" id="total" name="total" type="text" /></div>
                              </b></h3>
                          </div>
                        </div>

                      </div>

                      <!-- <input id="input" type="text"/>
              <input onclick="proses()" type="button" value="Tampilkan"/> -->

                      <script type="text/javascript">
                        <?php echo $jsArray; ?>

                        function changeValue(id_harga) {
                          var hargaku = document.getElementById('hargaku').value = HargaSatuan[id_harga].harga;
                          var harga = document.getElementById('harga').value = HargaSatuan[id_harga].harga;
                          var id_menuku = document.getElementById('id_menuku').value = HargaSatuan[id_harga].menu;
                          var id_menu = document.getElementById('id_menu').value = HargaSatuan[id_harga].menu;

                          var jumlah = document.getElementById('jumlah');
                          var harga = document.getElementById('harga');
                          var hasil = document.getElementById('hasil');
                          hasil.innerHTML = jumlah.value * harga.value;
                        };

                        function total(jumlah) {
                          var jumlah = document.getElementById('jumlah');
                          var harga = document.getElementById('harga');
                          var hasil = document.getElementById('hasil');
                          hasil.innerHTML = jumlah.value * harga.value;
                        }
                      </script>


                      <div class="row">
                        <!-- left column -->
                        <div class="col-md-4 col-md-offset-5">

                          <button type="submit" name='add_temp' class="btn btn-danger">Simpan</button>
                          &nbsp;
                          <button type="reset" class="btn btn-success">Reset</button>

                  </form>
                </div>
              </div>
            </div><!-- /.box-body -->

          </div><!-- /.box -->
      </div> <!-- /.col -->


    </div>
    <!-- ////////////////////////////////////////////////// tabel untuk menu yang dipesan -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-success">
        <div class="box-body">
          <!-- form start -->
          <form role="form" method="POST" action="">
            <div class="box-body">
              <?php $kd_trans = kd_trans_pemesanan(); //untuk kode otomatis dng fungsi
              ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Kode Transaksi Pemesanan</label>
                <input type="text" class="form-control" id="kd_transaksi" value="<?php echo $kd_trans; ?>" name="kd_transaksi" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                <input type="hidden" class="form-control" id="kd_transaksi" value="<?php echo $kd_trans; ?>" name="kd_transaksi" required data-fv-notempty-message="Tidak boleh kosong">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">No Meja</label><input class="form-control" id="no_meja" name="no_meja" value="" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Atas Nama</label><input class="form-control" id="atas_nama" name="atas_nama" value="" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
              </div>
              <!-- Select2 Single Item -->
              <div class="table-responsive">
                <table id="tabel_pesanan" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama menu</th>
                      <th>Harga</th>
                      <th>Jumlah </th>
                      <!-- <th>Sub Total</th> -->
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tampil = $mysqli->query("SELECT a.*,a.id as id_trans ,c.id as id_menu ,c.nama_menu as nama_menu, d.* FROM temp_transaksi_pemesanan a 
                   INNER JOIN menu c ON a.id_menu=c.id INNER JOIN harga d ON d.id_menu=c.id
                   order by a.tgl asc");
                    $no = 1;
                    while ($r = mysqli_fetch_array($tampil)) {
                    ?>
                      <tr>
                        <td><?php echo "$no" ?></td>
                        <td><input type="hidden" name="id_menu[]" value='<?php echo "$r[id_menu]" ?>' /> <?php echo "$r[nama_menu]" ?></td>
                        <td><input type="hidden" name="harga[]" value='<?php echo "$r[harga]" ?>' /><?php echo "Rp. " . number_format("$r[harga]", '0', '.', '.') . " " ?></td>
                        <td><input type="hidden" name="jumlah[]" value='<?php echo "$r[jumlah]" ?>' /> <?php echo "<b>$r[jumlah]</b>" ?></td>
                        <td><a href="?pg=pmsn&act=delete&id=<?php echo $r['id_trans'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
                      </tr>

                    <?php
                      $no++;
                    }
                    ?>
                  </tbody>
                  <tr>
                    <td align="center" colspan="3"> <span style="font-weight:bold">TOTAL</span></td>
                    <?php

                    $liatHarga = mysqli_fetch_array($mysqli->query("SELECT sum(total) as subtotal FROM temp_transaksi_pemesanan

                    ORDER BY id ASC"));
                    ?>

                    <td><span style="font-weight:bold"><input type="hidden" name="total" value='<?php echo "$liatHarga[subtotal]" ?>' /> <?php echo "Rp." . number_format("$liatHarga[subtotal]", '0', '.', '.') ?></td>

                  </tr>
                </table>
              </div>
              <br>

              <div class="row">
                <!-- left column -->
                <div class="col-md-3 col-md-offset-4">

                  <button type="submit" name='add' class="btn btn-danger">Simpan Pesanan</button>
                  &nbsp;
                  <button type="reset" class="btn btn-success">Reset</button>

          </form>
        </div>
      </div>
    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div> <!-- /.col -->


    </div>

    </div><!-- /.row -->
    <!-- Tombol Bagian Bawah -->


    </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div> <!-- /.col -->
    <!-- </div> -->
    <!-- /.row (main row) -->
    </section> <!-- /.content -->
    </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->


  <?php
    break;
    // PROSES EDIT DATA Transaksi Pemesanan //
  case 'detail':
    // $d = mysql_fetch_array(mysql_query("SELECT a.*,a.id as id_trans ,b.*,c.nama_menu as nama_menu, d.* FROM transaksi_pemesanan a INNER JOIN transaksi_pemesanan_detail b ON a.id=b.id_pemesanan INNER JOIN menu c ON b.id_menu=c.id INNER JOIN harga d ON d.id_menu=c.id WHERE a.id='$_GET[id]'"));
    // if (isset($_POST['update'])) {
    //   $total = $_POST['jumlah'] * $_POST['harga'];
    //   // echo $total;
    //   mysql_query("UPDATE transaksi_Pemesanan SET tgl='$_POST[tgl]', id_barang='$_POST[id_barangku]', id_harga='$_POST[id_harga]', id_supplier='$_POST[id_supplier]'
    //     , jumlah='$_POST[jumlah]', total='$total' WHERE id='$_POST[id]'");
    //   echo "<script>window.location='home.php?pg=pmbln&act=view'</script>";

    // }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Detail data Transaksi Pemesanan </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pmbln&act=view">Data Transaksi Pemesanan</a></li>
            <!-- <li class="active">Update Data Transaksi Pemesanan <?php echo $total; ?></li> -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-body">

                  <!-- <form role="form" method = "POST" action=""> -->
                  <div class="box-body">

                    <div class="table-responsive">
                      <table id="tabel_pesanan" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama menu</th>
                            <th>Harga</th>
                            <th>Jumlah </th>
                            <!-- <th>Sub Total</th> -->
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $tampil = $mysqli->query("SELECT a.*,a.id ,c.id as id_menu ,c.nama_menu as nama_menu, d.* FROM transaksi_pemesanan_detail a INNER JOIN menu c ON a.id_menu=c.id INNER JOIN harga d ON d.id_menu=c.id WHERE a.id_pemesanan='$_GET[id]' order by a.id asc");
                          $no = 1;
                          while ($r = mysqli_fetch_array($tampil)) {
                          ?>
                            <input type="hidden" class="form-control" id="id" name="id" required value="<?php echo $r['id']; ?>">
                            <tr>
                              <td><?php echo "$no" ?></td>
                              <td><input type="hidden" name="id_menu" value='<?php echo "$r[id_menu]" ?>' /> <?php echo "$r[nama_menu]" ?></td>
                              <td><input type="hidden" name="harga" value='<?php echo "$r[harga]" ?>' /><?php echo "Rp. " . number_format("$r[harga]", '0', '.', '.') . " " ?></td>
                              <td><input type="hidden" name="jumlah" value='<?php echo "$r[jumlah]" ?>' /> <?php echo "<b>$r[porsi]</b>" ?></td>
                              <td><a href="?pg=pmsn&act=delete&id=<?php echo $r['id_trans'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
                            </tr>

                          <?php
                            $no++;
                          }
                          ?>
                        </tbody>

                      </table>
                    </div>

                  </div>
                  <!-- /.box-body -->

                </div><!-- /.box -->
                <!-- </form> -->
              </div>
            </div> <!-- /.col -->
          </div> <!-- /.row -->


          <!-- Tombol Bagian Bawah -->

          <div class="row">
            <!-- left column -->
            <div class="col-md-4 col-md-offset-5">

              <button type="submit" name='update' onclick="history.go(-1)" class="btn btn-danger">Kembali</button>
              &nbsp;
              <!-- <button type="reset" class="btn btn-success">Reset</button> -->

              <!-- </form> -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
      </div> <!-- /.col -->
      <!-- </div> -->
      <!-- /.row (main row) -->
      </section> <!-- /.content -->
    </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->



  <?php
    break;

    // PROSES HAPUS DATA Transaksi Pemesanan //
  case 'delete':
    $mysqli->query("DELETE FROM temp_transaksi_pemesanan WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=pmsn&act=add'</script>";
    break;
  ?>
<?php
    break;

    // PROSES HAPUS DATA Transaksi Pemesanan //
  case 'delete_psn':
    $mysqli->query("DELETE FROM transaksi_pemesanan WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=pmsn&act=view'</script>";
    break;
}
?>