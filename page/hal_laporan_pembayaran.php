<?php
error_reporting(0);
switch ($_GET['act']) {
    // PROSES VIEW DATA LAPORAN pembayaran //      

  case 'view':
?>
    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Laporan pembayaran</h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="?pg=lap_pembayaran&act=view"><i class="fa fa-dashboard"></i> Laporan pembayaran</a></li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <form action="?pg=lap_pembayaran&act=cek" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal pembayaran Awal</label>
                  <input class="form-control" id="date" name="tglpembayaranaw" placeholder="MM/DD/YYY" type="text" />
                </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal pembayaran Akhir</label>
                <input class="form-control" id="date" name="tglpembayaranak" placeholder="MM/DD/YYY" type="text" />
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
                          <th>Kode pembayaran</th>
                          <th>Kode Pemesanan</th>
                          <th>Nomer Meja</th>
                          <th>Atas Nama</th>
                          <th>Total Tagihan</th>
                          <th>Total Bayar</th>
                          <th>Total Kembali</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT a.*,a.kd_transaksi as kd_transaksi_pemesanan, b.kd_transaksi as kd_transaksi_pembayaran, b.* FROM transaksi_pemesanan a INNER JOIN transaksi_pembayaran  b ON a.id=b.id_pemesanan WHERE a.tgl BETWEEN  '$_POST[tglpembayaranaw]' AND  '$_POST[tglpembayaranak]'order by b.tgl asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                          // $total = $r[harga] * $r[porsi];

                          if ($r['status'] == 0) {
                            $status = "<button type='button' class='btn btn-danger'><i class ='fa  fa-exclamation-triangle'> Belum Bayar</i></button>";
                          } else {
                            $status = "<button type='button' class='btn btn-primary' style='background-color: #dd3974 !important;''><i class ='fa fa-check-square'> Sudah Bayar</i></button>";
                          }

                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[tgl]" ?></td>
                            <td><?php echo "$r[kd_transaksi_pembayaran]" ?></td>
                            <td><?php echo "$r[kd_transaksi_pemesanan]" ?></td>
                            <td><?php echo "$r[nomer_meja]" ?></td>
                            <td><?php echo "$r[atas_nama]" ?></td>
                            <td><?php echo "Rp. " . number_format("$r[total]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "Rp. " . number_format("$r[nominal_bayar]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "Rp. " . number_format("$r[kembali]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "$status" ?></td>

                          </tr>

                        <?php
                          $no++;
                        }
                        ?>

                        <tr>
                          <td align="center" colspan="8"> <span style="font-weight:bold">TOTAL</span></td>
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
    $sqlp = "SELECT a.*,a.kd_transaksi as kd_transaksi_pemesanan, b.kd_transaksi as kd_transaksi_pembayaran, b.* FROM transaksi_pemesanan a INNER JOIN transaksi_pembayaran  b ON a.id=b.id_pemesanan WHERE a.tgl BETWEEN  '$_POST[tglpembayaranaw]' AND  '$_POST[tglpembayaranak]'order by b.tgl asc";

    $rs = $mysqli->query($sqlp);
    $data = mysqli_fetch_array($rs);

    if (!(empty($data))) {
    ?>
      <div class="content-wrapper">
        <div class="container">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1> Laporan pembayaran</h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
              <li><a href="?pg=lap_pembayaran&act=view"><i class="fa fa-dashboard"></i> Laporan pembayaran</a></li>
            </ol>
          </section>

          <section class="content">
            <div class="row">
              <div class="col-md-3">
                <form action="?pg=lap_pembayaran&act=cek" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal pembayaran Awal</label>
                    <input class="form-control" id="date" name="tglpembayaranaw" placeholder="MM/DD/YYY" type="text" />
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal pembayaran Akhir</label>
                  <input class="form-control" id="date" name="tglpembayaranak" placeholder="MM/DD/YYY" type="text" />
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
                  <form role="form" action="cetak_pembayaran.php" method="POST" target="_blank">
                    <button type="submit" class="btn btn-danger">
                      <i class="fa fa-file-pdf-o"> Cetak Laporan pembayaran</i>
                    </button>
                    <input type="hidden" class="form-control" id="tglpembayaranaw" name="tglpembayaranaw" value="<?php echo $_POST['tglpembayaranaw'] ?>">
                    <input type="hidden" class="form-control" id="tglpembayaranak" name="tglpembayaranak" value="<?php echo $_POST['tglpembayaranak'] ?>">

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
                          <th>Kode pembayaran</th>
                          <th>Kode Pemesanan</th>
                          <th>Nomer Meja</th>
                          <th>Atas Nama</th>
                          <th>Total Tagihan</th>
                          <th>Total Bayar</th>
                          <th>Total Kembali</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT a.*,a.kd_transaksi as kd_transaksi_pemesanan, b.kd_transaksi as kd_transaksi_pembayaran, b.* FROM transaksi_pemesanan a INNER JOIN transaksi_pembayaran  b ON a.id=b.id_pemesanan WHERE a.tgl BETWEEN  '$_POST[tglpembayaranaw]' AND  '$_POST[tglpembayaranak]'order by b.tgl asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                          $total = $r['harga'] * $r['porsi'];
                          if ($r['status'] == 0) {
                            $status = "<button type='button' class='btn btn-danger'><i class ='fa  fa-exclamation-triangle'> Belum Bayar</i></button>";
                          } else {
                            $status = "<button type='button' class='btn btn-primary' style='background-color: #dd3974 !important;''><i class ='fa fa-check-square'> Sudah Bayar</i></button>";
                          }
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[tgl]" ?></td>
                            <td><?php echo "$r[kd_transaksi_pembayaran]" ?></td>
                            <td><?php echo "$r[kd_transaksi_pemesanan]" ?></td>
                            <td><?php echo "$r[nomer_meja]" ?></td>
                            <td><?php echo "$r[atas_nama]" ?></td>
                            <td><?php echo "Rp. " . number_format("$r[total]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "Rp. " . number_format("$r[nominal_bayar]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "Rp. " . number_format("$r[kembali]", '0', '.', '.') . " " ?></td>
                            <td><?php echo "$status" ?></td>

                          </tr>
                        <?php
                          $no++;
                        }
                        ?>

                        <tr>
                          <td align="center" colspan="6"> <span style="font-weight:bold">TOTAL</span></td>
                          <?php

                          $liatHarga = mysqli_fetch_array($mysqli->query("SELECT sum(total) as total_pembayaran FROM transaksi_pembayaran

                        where  tgl BETWEEN '$_POST[tglpembayaranaw]' AND  '$_POST[tglpembayaranak]'

                        ORDER BY kd_transaksi ASC"));
                          ?>

                          <td><span style="font-weight:bold"><?php echo "Rp." . number_format("$liatHarga[total_pembayaran]", '0', '.', '.') ?></td>

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
              <li><a href="?pg=lap_pembayaran&act=view"><i class="fa fa-dashboard"></i> laporan pembayaran</a></li>
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