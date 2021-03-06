<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
switch ($_GET['act']) {
    // PROSES VIEW DATA USER //      
  case 'view':
?>

    <!-- <div class="content-wrapper"> -->
    <div class="container">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> Kelola Barang </h1>
        <ol class="breadcrumb">
          <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
          <li class="active"><a href="?pg=barang&act=view">Kelola Barang</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-list"></i>
                <h3 class="box-title">Persediaan Barang</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button class="btn btn-info btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->
              </div>
              <div class="box-body">
                <a href="?pg=barang&act=add"> <button type="button" class="btn btn-danger">
                    <i class="fa fa-plus"> Tambah Data </i></button> </a>

                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Tambah Stok</th>
                        <th>Jumlah Stok</th>
                        <th>Terjual</th>
                        <th>Jumlah Akhir</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT * FROM barang
                   order by id asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[nama_barang]" ?></td>
                            <td><?php echo "$r[ket]" ?></td>

                            <td><a href="?pg=barang&act=edit&id=<?php echo $r['id'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                            <td><a href="?pg=barang&act=delete&id=<?php echo $r['id'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
                          </tr>

                        <?php
                          $no++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>


              </div> <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </section> <!-- /.content -->
      </div><!-- /.container -->
    </div>
  <?php
    break;
    // PROSES TAMBAH DATA menu //
  case 'add':
    if (isset($_POST['add'])) {
      $query = $mysqli->query("INSERT INTO barang (id, id_barang, tanggal, nama_barang, tambah stok, terjual, jumlah_akhir) VALUES ('','$_POST[id_barang]','$_POST[tanggal]','$_POST[nama_barang]','$_POST[tambah_stok]','$_POST[terjual]','$_POST[jumlah_akhir]') ");
      echo "<script>window.location='home.php?pg=barang&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data menu </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=barang&act=view">Kelola Barang</a></li>
            <li class="active"><a href="#">Tambah Data menu</a></li>
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
                      <div class="form-group">
                        <label class="form-label">Nama Kategori menu</label>
                        <input name="nama_barang" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Tanggal</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Nama Barang</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Tambah Stok</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Jumlah Stok</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Terjual</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Jumlah Akhir</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                    
                      </select>
                    </div>

                </div><!-- /.box-body -->

              </div><!-- /.box -->
            </div> <!-- /.col -->

          </div> <!-- /.row -->


          <!-- Tombol Bagian Bawah -->

          <div class="row">
            <!-- left column -->
            <div class="col-md-4 col-md-offset-5">

              <button type="submit" name='add' class="btn btn-danger">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>

              </form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
          <!-- </div>  -->
          <!-- /.col -->
          <!-- </div> -->
          <!-- /.row (main row) -->
        </section> <!-- /.content -->
      </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->


  <?php
    break;
    // PROSES EDIT DATA menu //
  case 'edit':
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM barang WHERE id='$_GET[id]'"));
    if (isset($_POST['update'])) {

      $mysqli->query("UPDATE barang SET nama_barang='$_POST[nama_barang]', 
    ket='$_POST[ket]'
    WHERE id='$_POST[id]'");
      echo "<script>window.location='home.php?pg=barang&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data menu </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=barang&act=view">Data menu</a></li>
            <li class="active">Update Data menu</li>
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
                      <input type="hidden" class="form-control" id="id" name="id" required value="<?php echo $d['id']; ?>">
                      <div class="form-group">
                        <label class="form-label">Nama Kategori</label>
                        <input name="nama_barang" type="text" class="form-control" value="<?php echo $d['nama_barang']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Tanggal</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Nama Barang</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Tambah Stok</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Jumlah Stok</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Terjual</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Jumlah Akhir</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Keterangan</label>
                        <input name="ket" type="text" class="form-control" value="<?php echo $d['ket']; ?>">
                      </div>


                      </select>
                    </div>

                </div><!-- /.box-body -->

              </div><!-- /.box -->
            </div> <!-- /.col -->

          </div> <!-- /.row -->


          <!-- Tombol Bagian Bawah -->

          <div class="row">
            <!-- left column -->
            <div class="col-md-4 col-md-offset-5">

              <button type="submit" name='update' class="btn btn-danger">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>

              </form>
            </div><!-- /.box-body -->
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

    // PROSES HAPUS DATA menu //
  case 'delete':
    $mysqli->query("DELETE FROM barang WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=barang&act=view'</script>";
    break;
}
?>
