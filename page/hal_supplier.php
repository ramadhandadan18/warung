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
          <h1> Data Supplier </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=spplr&act=view">Data Supplier</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-list"></i>
                  <h3 class="box-title">Daftar Supplier</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <a href="?pg=spplr&act=add"> <button type="button" class="btn btn-danger" style="background-color: #dd3974 !important;"><i class="fa fa-plus"> Tambah Data </i></button> </a>

                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Supplier</th>
                          <th>Alamat</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT * FROM supplier
                   order by id asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[nama]" ?></td>
                            <td><?php echo "$r[alamat]" ?></td>

                            <td><a href="?pg=spplr&act=edit&id=<?php echo $r['id'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                            <td><a href="?pg=spplr&act=delete&id=<?php echo $r['id'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
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
            <!-- </div> -->
            <!-- /.row (main row) -->
        </section> <!-- /.content -->
      </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->

  <?php
    break;
    // PROSES TAMBAH DATA Supplier //
  case 'add':
    if (isset($_POST['add'])) {
      $query = $mysqli->query("INSERT INTO supplier (id,nama,alamat) VALUES ('','$_POST[nama]',
  '$_POST[alamat]')");
      echo "<script>window.location='home.php?pg=spplr&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Supplier </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=spplr&act=view">Data Supplier</a></li>
            <li class="active"><a href="#">Tambah Data Supplier</a></li>
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
                        <label class="form-label">Nama Supplier</label>
                        <input name="nama" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <input name="alamat" type="text" class="form-control" required>
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
            <!-- </div> -->
            <!-- /.col -->
            <!-- </div> -->
            <!-- /.row (main row) -->
        </section> <!-- /.content -->
      </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->


  <?php
    break;
    // PROSES EDIT DATA Supplier //
  case 'edit':
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM supplier WHERE id='$_GET[id]'"));
    if (isset($_POST['update'])) {


      $mysqli->query("UPDATE supplier SET nama='$_POST[nama]', 
      alamat='$_POST[alamat]'
      WHERE id='$_POST[id]'");
      echo "<script>window.location='home.php?pg=spplr&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Supplier </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=spplr&act=view">Data Supplier</a></li>
            <li class="active">Update Data Supplier</li>
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
                        <label class="form-label">Nama Supplier</label>
                        <input name="nama" type="text" class="form-control" value="<?php echo $d['nama']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <input name="alamat" class="form-control" value="<?php echo $d['alamat']; ?>" type="text" class="form-control">
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
          </div>
          <!-- /.col -->
          <!-- </div> -->
          <!-- /.row (main row) -->
        </section> <!-- /.content -->
      </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->


<?php
    break;

    // PROSES HAPUS DATA Supplier //
  case 'delete':
    $mysqli->query("DELETE FROM supplier WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=spplr&act=view'</script>";
    break;
}
?>