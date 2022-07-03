<?php
error_reporting(0);
switch ($_GET['act']) {
    // PROSES VIEW DATA LAPORAN pemesanan //      

  case 'view':
?>
    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Laporan pemesanan</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="?pg=lap_pemesanan&act=view"><i class="fa fa-dashboard"></i> Laporan pemesanan</a></li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <form action="?pg=lap_pemesanan&act=cek" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal pemesanan Awal</label>
                  <input class="form-control" id="date" name="tglpemesananaw" placeholder="MM/DD/YYY" type="text" />
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal pemesanan Akhir</label>
                <input class="form-control" id="date" name="tglpemesananak" placeholder="MM/DD/YYY" type="text" />
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Mulai Pencarian</label><br>
                <input type="submit" value="Pencarian" class="btn btn-danger">
              </div>
            </div>
            </form>

            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Kode Pemesanan</th>
                          <th>Nama Menu</th>
                          <th>Nama Pembeli</th>
                          <th>Harga</th>
                          <th>Jumlah Porsi</th>
                          <th>Total pemesanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT a.*,b.*,c.*,d.* FROM transaksi_pemesanan a INNER JOIN transaksi_pemesanan_detail b ON a.id=b.id_pemesanan INNER JOIN menu c ON b.id_menu=c.id INNER JOIN harga d ON c.id=d.id_menu WHERE a.tgl BETWEEN  '$_POST[tglpemesananaw]' AND  '$_POST[tglpemesananak]'order by a.tgl asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                          $total = $r['harga'] * $r['porsi'];
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[tgl]" ?></td>
                            <td><?php echo "$r[kd_transaksi]" ?></td>
                            <td><?php echo "$r[nama_menu]" ?></td>
                            <td><?php echo "$r[atas_nama]" ?></td>
                            <td><?php echo "Rp. " . number_format("$r[harga]", '0', '.', '.') ?></td>
                            <td><?php echo "<b>$r[porsi]</b> porsi" ?> </td>
                            <td><?php echo "Rp. " . number_format("$total", '0', '.', '.') ?></td>

                          </tr>

                        <?php
                          $no++;
                        }
                        ?>

                        <tr>
                          <td align="center" colspan="6"> <span style="font-weight:bold">TOTAL</span></td>
                          <td><span style="font-weight:bold"><?php echo "$liatHarga[harga]" ?></td>
                          <td><span style="font-weight:bold"><?php echo "Rp.$liatHarga[isv_sales],-" ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /.box-body -->
                </div>
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

  case 'cek':
    // menampilkan pertanyaan pertama
    $sqlp = "SELECT a.*,b.*,c.*,d.* FROM transaksi_pemesanan a INNER JOIN transaksi_pemesanan_detail b ON a.id=b.id_pemesanan INNER JOIN menu c ON b.id_menu=c.id INNER JOIN harga d ON c.id=d.id_menu WHERE a.tgl BETWEEN  '$_POST[tglpemesananaw]' AND  '$_POST[tglpemesananak]'order by a.kd_transaksi asc";

    $rs = $mysqli->query($sqlp);
    $data = mysqli_fetch_array($rs);

    if (!(empty($data))) {
    ?>
      <div class="content-wrapper">
        <div class="container">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1> Laporan pemesanan</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
              <li><a href="?pg=lap_pemesanan&act=view"><i class="fa fa-dashboard"></i> Laporan pemesanan</a></li>
            </ol>
          </section>

          <section class="content">
            <div class="row">
              <div class="col-md-3">
                <form action="?pg=lap_pemesanan&act=cek" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal pemesanan Awal</label>
                    <input class="form-control" id="date" name="tglpemesananaw" placeholder="MM/DD/YYY" type="text" />
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal pemesanan Akhir</label>
                  <input class="form-control" id="date" name="tglpemesananak" placeholder="MM/DD/YYY" type="text" />
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Mulai Pencarian</label><br>
                  <input type="submit" value="Pencarian" class="btn bg-orange">
                </div>
              </div>
              </form>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Cetak Laporan</label><br>
                  <form role="form" action="cetak_pemesanan.php" method="POST" target="_blank">
                    <button type="submit" class="btn btn-danger">
                      <i class="fa fa-file-pdf-o"> Cetak Laporan pemesanan</i>
                    </button>
                    <input type="hidden" class="form-control" id="tglpemesananaw" name="tglpemesananaw" value="<?php echo $_POST['tglpemesananaw'] ?>">
                    <input type="hidden" class="form-control" id="tglpemesananak" name="tglpemesananak" value="<?php echo $_POST['tglpemesananak'] ?>">

                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-hover responsive">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Kode Transaksi</th>
                          <th>Nama Barang</th>
                          <th>Nama Supplier</th>
                          <th>Harga</th>
                          <th>Jumlah Beli</th>
                          <th>Total pemesanan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT a.*,b.*,c.*,d.* FROM transaksi_pemesanan a INNER JOIN transaksi_pemesanan_detail b ON a.id=b.id_pemesanan INNER JOIN menu c ON b.id_menu=c.id INNER JOIN harga d ON c.id=d.id_menu WHERE a.tgl BETWEEN  '$_POST[tglpemesananaw]' AND  '$_POST[tglpemesananak]'order by a.kd_transaksi asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                          $total = $r['harga'] * $r['porsi'];
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[tgl]" ?></td>
                            <td><?php echo "$r[kd_transaksi]" ?></td>
                            <td><?php echo "$r[nama_menu]" ?></td>
                            <td><?php echo "$r[atas_nama]" ?></td>
                            <td><?php echo "Rp. " . number_format("$r[harga]", '0', '.', '.') ?></td>
                            <td><?php echo "<b>$r[porsi]</b> porsi" ?> </td>
                            <td><?php echo "Rp. " . number_format("$total", '0', '.', '.') ?></td>

                          </tr>
                        <?php
                          $no++;
                        }
                        ?>

                        <tr>
                          <td align="center" colspan="7"> <span style="font-weight:bold">TOTAL</span></td>
                          <?php

                          $liatHarga = mysqli_fetch_array($mysqli->query("SELECT sum(total) as total_pemesanan FROM transaksi_pemesanan

                        where  tgl BETWEEN '$_POST[tglpemesananaw]' AND  '$_POST[tglpemesananak]'

                        ORDER BY kd_transaksi ASC"));
                          ?>

                          <td><span style="font-weight:bold"><?php echo "Rp." . number_format("$liatHarga[total_pemesanan]", '0', '.', '.') ?></td>

                        </tr>
                      </tbody>
                    </table>
                  </div><!-- /.box-body -->
                </div>
              </div><!-- /.box -->
            </div>
            <!-- /.col -->
            <!-- </div> -->
            <!-- /.row (main row) -->


          </section> <!-- /.content -->
        </div><!-- /.container -->
      </div>
      <!-- /.content-wrapper -->

    <?php
    } else {
    ?>
      <div class="content-wrapper">
        <div class="container">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1> Silahkan pilih</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="?pg=lap_pemesanan&act=view"><i class="fa fa-dashboard"></i> laporan pemesanan</a></li>
            </ol>
          </section>

          <section class="content">
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group">
                  <?php
                  echo " <p> Maaf untuk pencarian yang anda cari tidak tersedia. <br>
                    Silahkan coba lakukan pencarian ulang. Terima Kasih </p>";

                  ?>
                </div>
              </div>
            </div>
          </section> <!-- /.content -->
        </div> <!-- /.container -->
      </div>
      <!-- /.content-wrapper -->

    <?php
    }
    ?>

<?php
    break;
}
?>