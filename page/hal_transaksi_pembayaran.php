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
          <h1> Data Transaksi pembayaran </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pmby&act=view">Data Transaksi pembayaran</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-list"></i>
                  <h3 class="box-title">Halaman Transaksi pembayaran Pemesanan</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <a href="?pg=pmby&act=add"> <button type="button" class="btn btn-danger" style="background-color: #dd3974 !important;"><i class="fa fa-plus"> Tambah Data </i></button> </a>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Kode Pemesanan</th>
                          <th>Nomer Meja</th>
                          <th>Atas Nama</th>
                          <th>Total Tagihan</th>
                          <th>Total Bayar</th>
                          <th>Total Kembali</th>
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
                        // $tampil=mysql_query("SELECT a.*,a.id as id_trans ,b.*,c.nama_menu as nama_menu, d.* FROM transaksi_pembayaran a INNER JOIN transaksi_pembayaran_detail b ON a.id=b.id_pembayaran
                        //  INNER JOIN menu c ON b.id_menu=c.id INNER JOIN harga d ON d.id_menu=c.id
                        //  order by a.tgl asc");
                        $tampil = $mysqli->query(" SELECT a.*,b.* FROM transaksi_pembayaran a INNER JOIN transaksi_pemesanan b ON a.id_pemesanan=b.id order by a.tgl asc");
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
                            <td><?php echo "Rp. " . number_format("$r[nominal_bayar]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "Rp. " . number_format("$r[kembali]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "$status" ?></td>
                            <!--  <td><a href="?pg=pmby&act=edit&id=<?php echo $r['id_trans'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td> -->
                            <td><a href="?pg=pmby&act=detail&id=<?php echo $r['id'] ?>" title="Detail pembayaran"><button type="button" class="btn bg-orange"><i class="fa fa-eye"></i></button></a></td>
                            <td><a href="?pg=pmby&act=delete&id=<?php echo $r['id'] ?>" title="Hapus pembayaran"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
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
    // PROSES TAMBAH DATA Transaksi pembayaran //
  case 'add':

    if (isset($_POST['add'])) {
      $kembali = $_POST['jumlah'] - $_POST['total'];
      $kd_transaksi = $_POST['kd_transaksi'];
      $id_pemesanan = $_POST['id_pemesanan'];
      $jumlah =  $_POST['jumlah'];
      $total =  $_POST['total'];
      // $kembali = $_POST['kembali'];
      $tgl = $_POST['tgl'];

      // echo $_POST['kd_transaksi'];
      // die();


      $query = $mysqli->query("INSERT INTO transaksi_pembayaran  (id,kd_transaksi,id_pemesanan, tgl,total,nominal_bayar,kembali)
    VALUES ('','$_POST[kd_transaksi]','$_POST[id_pemesanan]','$_POST[tgl]','$_POST[total]','$_POST[jumlah]','$kembali')");

      $update_status = $mysqli->query("UPDATE transaksi_pemesanan Set status=1 where id='$_POST[id_pemesanan]' ");

      echo "<script>window.location='home.php?pg=pmby&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Transaksi pembayaran </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pmby&act=view">Data Transaksi pembayaran</a></li>
            <li class="active"><a href="#">Tambah Data Transaksi pembayaran</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-body">
                  <!-- form start -->
                  <form role="form" method="POST" action="">
                    <div class="box-body">
                      <?php $kd_trans = kd_trans_pembayaran(); //untuk kode otomatis dng fungsi
                      ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kode Transaksi Pembayaran</label>
                        <input type="text" class="form-control" id="kd_transaksi" value="<?php echo $kd_trans; ?>" name="kd_transaksi" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                        <input type="hidden" class="form-control" id="kd_transaksi" value="<?php echo $kd_trans; ?>" name="kd_transaksi" required data-fv-notempty-message="Tidak boleh kosong">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Transaksi</label>
                        <input class="form-control" id="date" name="tgl" placeholder="MM/DD/YYY" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
                      </div>


                      <?php $jsArray = "var HargaSatuan = new Array();\n"; ?>
                      <!-- Select2 Single Item -->
                      <div class="form-group">
                        <label>Pilih Nomer Meja</label>
                        <select id='id_harga' name='id_pemesanan' class="form-control select2" onchange="changeValue(this.value)" data-validation="[NOTEMPTY]">
                          <option value="">-- Silahkan Pilih Nomer Meja --</option>
                          <?php
                          $result = $mysqli->query("SELECT * FROM transaksi_pemesanan");
                          while ($row = mysqli_fetch_array($result)) {
                            // if($d[id_harga] == $row[id]){
                            echo "<option value='$row[id]'>" . $row['nomer_meja'] . " - " . $row['atas_nama'] . "</option>";
                            $jsArray .= "HargaSatuan['" . $row['id'] . "'] = {id_pemesanan:'" . addslashes($row['id']) . "',total:'" . addslashes($row['total']) . "'};\n";
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">id pemesanan</label>
                        <input class="form-control" id="id_pemesanan" name="id_pemesanan" value="" type="text" disabled="" required data-fv-notempty-message="Tidak boleh kosong" />
                        <input class="form-control" id="id_pemesananku" name="id_pemesananku" value="" type="hidden" required data-fv-notempty-message="Tidak boleh kosong" />
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Total Tagihan</label>
                        <input class="form-control" id="totalku" name="totalku" value="" type="text" disabled="" required data-fv-notempty-message="Tidak boleh kosong" />
                        <input class="form-control" id="total" name="total" value="" type="hidden" required data-fv-notempty-message="Tidak boleh kosong" />
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Bayar</label>
                        <input class="form-control" id="jumlah" name="jumlah" onchange="kembali(this.value)" type="text" required data-fv-notempty-message="Tidak boleh kosong" />
                        <!-- <input onclick="proses()" type="button" value="Tampilkan"/> -->

                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <h3><label for="exampleInputEmail1">Kembalian : </label></h3>
                            <!-- <input class="form-control" id="total" name="total" type="text" required data-fv-notempty-message="Tidak boleh kosong"/> -->

                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <!-- <input class="form-control" id="total" name="total" type="text" required data-fv-notempty-message="Tidak boleh kosong"/> -->
                            <h3> <b>
                                <div id="hasil"> <input class="form-control" id="kembali" name="kembali" type="text" /></div>
                              </b></h3>
                          </div>
                        </div>

                      </div>

                      <!-- <input id="input" type="text"/>
              <input onclick="proses()" type="button" value="Tampilkan"/> -->

                      <script type="text/javascript">
                        <?php echo $jsArray; ?>

                        function changeValue(id_pemesanan) {
                          var totalku = document.getElementById('totalku').value = HargaSatuan[id_pemesanan].total;
                          var total = document.getElementById('total').value = HargaSatuan[id_pemesanan].total;
                          var id_pemesananku = document.getElementById('id_pemesananku').value = HargaSatuan[id_pemesanan].id_pemesanan;
                          var id_pemesanan = document.getElementById('id_pemesanan').value = HargaSatuan[id_pemesanan].id_pemesanan;

                          var jumlah = document.getElementById('jumlah');
                          var total = document.getElementById('total');
                          var hasil = document.getElementById('hasil');
                          hasil.innerHTML = jumlah.value - total.value;
                        };

                        function kembali(jumlah) {
                          var jumlah = document.getElementById('jumlah');
                          var total = document.getElementById('total');
                          var hasil = document.getElementById('hasil');
                          hasil.innerHTML = jumlah.value - total.value;
                        }
                      </script>


                      <div class="row">
                        <!-- left column -->
                        <div class="col-md-4 col-md-offset-5">

                          <button type="submit" name='add' class="btn btn-danger">Simpan</button>
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
    // PROSES EDIT DATA Transaksi pembayaran //
  case 'detail':
    // $d = mysql_fetch_array(mysql_query("SELECT a.*,a.id as id_trans ,b.*,c.nama_menu as nama_menu, d.* FROM transaksi_pembayaran a INNER JOIN transaksi_pembayaran_detail b ON a.id=b.id_pembayaran INNER JOIN menu c ON b.id_menu=c.id INNER JOIN harga d ON d.id_menu=c.id WHERE a.id='$_GET[id]'"));
    // if (isset($_POST['update'])) {
    //   $total = $_POST['jumlah'] * $_POST['harga'];
    //   // echo $total;
    //   mysql_query("UPDATE transaksi_pembayaran SET tgl='$_POST[tgl]', id_barang='$_POST[id_barangku]', id_harga='$_POST[id_harga]', id_supplier='$_POST[id_supplier]'
    //     , jumlah='$_POST[jumlah]', total='$total' WHERE id='$_POST[id]'");
    //   echo "<script>window.location='home.php?pg=pmbln&act=view'</script>";

    // }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Detail data Transaksi Pembayaran </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=pmbln&act=view">Data Transaksi Pembayaran</a></li>
            <!-- <li class="active">Update Data Transaksi pemesanan <?php echo $total; ?></li> -->
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
                              <td><a href="?pg=pmby&act=delete&id=<?php echo $r['id_trans'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
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

    // PROSES HAPUS DATA Transaksi pembayaran //
  case 'delete':
    $mysqli->query("DELETE FROM transaksi_pembayaran WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=pmby&act=view'</script>";
    break;
}
?>