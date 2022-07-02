<?php
// if(empty($_SESSION['username'])){
//    echo "Not found!";
// } else {
switch ($_GET['act']) {
    // PROSES VIEW DATA USER //      
  case 'view':
?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Karyawan </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=kategori&act=view">Data Karyawan</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-list"></i>
                  <h3 class="box-title">Data Karyawan</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <a href="?pg=absen&act=add"> <button type="button" class="btn btn-danger" style="background-color: #dd3974 !important;"><i class="fa fa-plus"> Tambah Data </i></button> </a>

                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Karyawan</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT * FROM karyawan
                   order by id_karyawan asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[nama]" ?></td>

                            <td><a href="?pg=absen&act=edit&id_karyawan=<?php echo $r['id_karyawan'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                            <td><a href="?pg=absen&act=delete&id_karyawan=<?php echo $r['id_karyawan'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
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
      $query = $mysqli->query("INSERT INTO karyawan (id_karyawan,nama) VALUES ('','$_POST[nama]') ");
      echo "<script>window.location='home.php?pg=absen&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Karyawan </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=kategori&act=view">Data Karyawan</a></li>
            <li class="active"><a href="#">Tambah Data</a></li>
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
                        <label class="form-label">Nama Karyawan</label>
                        <input name="nama" type="text" class="form-control" required>
                      </div>
                      <!-- <div class="form-group">
                        <label class="form-label">Keterangan</label>
                        <input name="ket" type="text" class="form-control" required>
                      </div> -->
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
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM karyawan WHERE id_karyawan='$_GET[id_karyawan]'"));
    if (isset($_POST['update'])) {

      $mysqli->query("UPDATE karyawan SET nama='$_POST[nama]'
    
    WHERE id_karyawan='$_POST[id_karyawan]'");
      echo "<script>window.location='home.php?pg=absen&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Karyawan </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=kategori&act=view">Data Karyawan</a></li>
            <li class="active">Update Data </li>
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
                      <input type="hidden" class="form-control" id="id_karyawan" name="id_karyawan" required value="<?php echo $d['id_karyawan']; ?>">
                      <div class="form-group">
                        <label class="form-label">Nama Karyawan</label>
                        <input name="nama" type="text" class="form-control" value="<?php echo $d['nama']; ?>" required>
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
    $mysqli->query("DELETE FROM karyawan WHERE id_karyawan='$_GET[id_karyawan]'");
    echo "<script>window.location='home.php?pg=absen&act=view'</script>";
    break;
}
?>