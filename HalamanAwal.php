<?php
//////////////////untuk menyimpan sementara menu yang dipilih ketabel temp_transaksi_pemesanan
if (isset($_POST['add_temp'])) {
  $id_menuku = $_POST['id_menuku'];
  // cek sisa dari menu yang dipilih
  $d = mysqli_fetch_array($mysqli->query("SELECT * FROM stok WHERE id_menu=$id_menuku"));
  $sisa = $d['sisa'];
  // jika sisa =0 atau statusnya habis, maka tidak bisa disimpan ke tabel pemesanan
  if ($sisa == 0) {
    echo "<script> alert('Menu Yang Anda Pesan Sudah habis'); </script>";
  } else {
    $total = $_POST['jumlah'] * $_POST['harga'];
    $tgl = date('Y-m-d');
    $query = $mysqli->query("INSERT INTO temp_transaksi_pemesanan  (id,tgl,id_menu,id_harga,jumlah,total)
      VALUES ('','$tgl','$_POST[id_menuku]','$_POST[id_harga]','$_POST[jumlah]','$total')");
    echo "<script>window.location='pelanggan.php'</script>";
  }
}
if (isset($_POST['update_pesanan'])) {
  $jumlah_menu = count($_POST['id_menu']);
  $kd_transaksi = $_POST['kd_transaksi'];
  $no_meja =  $_POST['no_meja'];
  $atas_nama = $_POST['atas_nama'];
  $jumlah =  $_POST['jumlah'];
  $harga =  $_POST['harga'];
  $id_menu =  $_POST['id_menu'];
  // $total = $_POST['total'];
  $tgl = date('Y-m-d');


  for ($i = 0; $i < $jumlah_menu; $i++) {
    $total[$i] = $jumlah[$i] * $harga[$i];
    //   var_dump($total);
    // die();

    ///////////////////perulanagan
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM stok WHERE id_menu=$id_menu[$i]"));
    $sisa = $d['sisa'];
    // die();
    if ($sisa > 0 && $jumlah[$i] <= $sisa) {
      $masukkan = $mysqli->query("UPDATE temp_transaksi_pemesanan set jumlah='$jumlah[$i]',total='$total[$i]' where id_menu=$id_menu[$i] ");
    } else {
      echo "<script> alert('Pesanan Anda melebihi stok yang tersedia'); </script>";
    }
  }
  echo "<script>window.location='pelanggan.php'</script>";
}

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
  $delete_temp_transaksi_pemesanan = $mysqli->query("DELETE FROM temp_transaksi_pemesanan");
  // echo "<script>window.location='index.php'</script>";
  echo " <center> <div class='alert alert-success'>
            <h3><span id='TotalBayar'>Pesanan Anda Berhasil, Dan Akan segera di antar ke meja anda. Terimakasih</span></h3>
          </div> 
<meta http-equiv='refresh' content='3; url=pelanggan.php' /> ";
}
?>
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <strong>
        <h1>APLIKASI PEMESANAN MAKANAN </h1>
      </strong>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
              <!-- <div class="row"> -->
              <!-- <div class="col-md-4">
                <div class="form-group">

                </div>
              </div> -->
              <h2 class="page-header">SILAHKAN PILIH MENU MAKANAN DAN MINUMAN ANDA</h2>

              <div class="row">
                <div class="col-md-12">
                  <?php
                  error_reporting(0);
                  $batas = 9; //satu halaman menampilkan 30 baris
                  $halaman = $_GET['halaman'];
                  $posisi = null;
                  if (empty($halaman)) {
                    $posisi = 0;
                    $halaman = 1;
                  } else {
                    $posisi = ($halaman - 1) * $batas;
                  }

                  $tampil = $mysqli->query("SELECT a.*,a.id as id_menu, b.*,c.*,c.id as id_harga, d.* FROM menu a 
                    INNER JOIN kategori_menu b on a.id_kategori=b.id JOIN harga c ON a.id=c.id_menu INNER JOIN stok d ON a.id=d.id_menu
                   order by a.id asc LIMIT $posisi,$batas");
                  $no = 1;
                  while ($r = mysqli_fetch_array($tampil)) {
                  ?>
                    <!-- <div class="row"> -->

                    <form role="form" method="POST" action="">

                      <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user" style="height: 230px">
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header bg-black" style="background: url('<?php echo "upload/menu/" . $r['gambar'] . " "; ?>') center center;">
                            <!-- <h3 class="widget-user-username">Elizabeth Pierce</h3>
                        <h5 class="widget-user-desc">Web Designer</h5> -->
                          </div>
                          <!-- <div class="widget-user-image">
                      <img class="img-circle" src="dist/img/photo1.png" alt="User Avatar">
                    </div> -->
                          <div class="box-footer">
                            <div class="row">
                              <div class="col-sm-8 border-right">
                                <div class="description-block">
                                  <h6 class="description-header"><?php echo "Rp. " . number_format("$r[harga]", '0', '.', '.') . " " ?>
                                    <input type="hidden" name="harga" value="<?php echo $r['harga'] ?>">
                                    <input type="hidden" name="id_harga" value="<?php echo $r['id_harga'] ?>">
                                    <input type="hidden" name="id_menuku" value="<?php echo $r['id_menu'] ?>">
                                    <input type="hidden" name="jumlah" value="1">
                                  </h6>
                                  <span class="description-text">
                                    <small><b><?php echo "$r[nama_menu]" ?></b></small>
                                  </span>
                                </div><!-- /.description-block -->
                              </div><!-- /.col -->

                              <div class="col-sm-4">
                                <div class="description-block">
                                  <button type="submit" name='add_temp' class="btn btn-primary btn-block btn-flat" style="border-radius: 5px;padding-left: 5px;"> Pilih </button>
                                  <?php
                                  if ($r['sisa'] == 0 || $r['sisa'] <= 0) {
                                  ?>
                                    <button type="submit" name='' class="btn btn-primary btn-block btn-flat" style="background-color: #dd3974 !important;border-radius: 5px;padding-left: 3px;"> Habis </button>
                                  <?php
                                  } else {
                                  ?>
                                    <button type="submit" name='' class="btn btn-primary btn-block btn-flat" style="background-color: #dd3974 !important;border-radius: 5px; "> <?php echo $r['sisa'] ?> </button>
                                  <?php } ?>
                                </div><!-- /.description-block -->
                              </div><!-- /.col -->
                            </div><!-- /.row -->
                          </div>
                        </div><!-- /.widget-user -->
                      </div><!-- /.col -->
                    </form>

                  <?php
                    $no++;
                  }
                  ?>


                </div>
              </div><!-- /.row -->

              <div class="box-footer clearfix">
                <!-- <ul class="pagination pagination-sm no-margin pull-right"> -->
                <ul class="pagination pagination-sm no-margin pull-right">
                  <?php

                  // mencari jumlah semua data dalam tabel guestbook

                  $query   = "SELECT COUNT(*) AS jumData FROM menu ";
                  $hasil  = $mysqli->query($query);
                  $data     = mysqli_fetch_array($hasil);

                  $jmldata = $data['jumData'];

                  // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data

                  $jumlah_halaman = ceil($jmldata / $batas);

                  // menampilkan link previous

                  if ($halaman > 1) echo  "<li> <a href='" . $_SERVER['PHP_SELF'] . "?pg=dashboard&halaman=" . ($halaman - 1) . "'>&lt;&lt; Prev</a>  </li>";


                  for ($page = 1; $page <= $jumlah_halaman; $page++) {
                    if ((($page >= $halaman - 3) && ($page <= $halaman + 3)) || ($page == 1) || ($page == $jumlah_halaman)) {
                      if (($showPage == 1) && ($page != 2))  echo "<li><a>....</a></li>";
                      if (($showPage != ($jumlah_halaman - 1)) && ($page == $jumlah_halaman))  echo "<li><a>....</a></li>";
                      if ($page == $halaman) echo "<li class='active'> <a href='" . $_SERVER['PHP_SELF'] . "?pg=dashboard&halaman=" . ($halaman * 1) . "'><b>" . $page . "</b></a> </li>";

                      else echo "<li> <a href='" . $_SERVER['PHP_SELF'] . "?pg=dashboard&halaman=" . $page . "'>" . $page . "</a> </li> ";
                      $showPage = $page;
                    }
                  }

                  // menampilkan link next

                  if ($halaman < $jumlah_halaman) echo "<li> <a href='" . $_SERVER['PHP_SELF'] . "?pg=dashboard&halaman=" . ($halaman + 1) . "'>Next &gt;&gt;</a> </li>";


                  ?>
                  <!-- <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li> -->
                </ul>
              </div>


              <!-- </div>.boxrow -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div> <!-- /.col -->

        <div class="col-md-4">
          <!-- fomr untuk menampung pemesanan -->
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group">
                <h4>Pesanan Anda</h4>
                <form role="form" method="POST" action="">
                  <div class="box-body">
                    <?php $kd_trans = kd_trans_pemesanan(); //untuk kode otomatis dng fungsi
                    ?>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Atas Nama</label>
                      <input type="text" class="form-control" id="usr_transaksi" value="<?php echo strtoupper($_SESSION['username']); ?>" name="usr_transaksi" disabled>
                      <input type="hidden" class="form-control" id="usr_transaksi" value="<?php echo strtoupper($_SESSION['username']); ?>" name="usr_transaksi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Pemesanan</label>
                      <input type="text" class="form-control" id="kd_transaksi" value="<?php echo $kd_trans; ?>" name="kd_transaksi" disabled>
                      <input type="hidden" class="form-control" id="kd_transaksi" value="<?php echo $kd_trans; ?>" name="kd_transaksi">
                    </div>

                    <div class="form-group">
                      <input class="form-control" id="no_meja" name="no_meja" value="" placeholder="No Meja" type="text" />
                    </div>
                    <!-- Select2 Single Item -->
                    <div class="table-responsive">
                      <table id="tabel_pesanan" class="table table-bordered table-striped" width="100%">
                        <thead>
                          <tr>
                            <th>Delete</th>
                            <th>Nama </th>
                            <th>menu</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <!-- <th>Sub Total</th> -->

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
                              <!-- <td><?php echo "$no" ?></td> -->
                              <td><a href="?pelanggan.php&act=delete&id=<?php echo $r['id_trans'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
                              <td colspan="2"><input type="hidden" name="id_menu[]" value='<?php echo "$r[id_menu]" ?>' /> <?php echo "$r[nama_menu]" ?></td>
                              <td><input type="number" name="jumlah[]" value='<?php echo "$r[jumlah]" ?>' style="width:80px" /> <!-- <?php echo "<b>$r[jumlah]</b>" ?> -->
                              </td>
                              <td><input type="hidden" name="harga[]" value='<?php echo "$r[harga]" ?>' /><?php echo $r['harga'] ?>

                              </td>
                              <input type="hidden" name="id_harga[]" value='<?php echo "$r[id_harga]" ?>' />



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
                      <div class="col-md-12 ">

                        <button type="submit" name='add' class="btn btn-danger">Simpan Pesanan</button>
                        &nbsp;
                        <button type="submit" name='update_pesanan' class="btn btn-success">Update Pesanan</button>

                </form>
              </div>
            </div>
          </div><!-- /.box-body -->

        </div> <!-- /.col -->
      </div>
      <!-- Main row -->


      <!-- /.row (main row) -->
    </section> <!-- /.content -->

  </div><!-- /.container -->
</div><!-- /.content-wrapper -->

<?php
// PROSES HAPUS DATA Transaksi Pemesanan //
switch ($_GET['act']) {
  case 'delete':
    $mysqli->query("DELETE FROM temp_transaksi_pemesanan WHERE id='$_GET[id]'");
    echo "<script>window.location='pelanggan.php'</script>";
    break;
}
?>