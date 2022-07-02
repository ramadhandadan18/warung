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
          <h1> Data Customer </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=customer&act=view">Data Customer</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box-header">
              </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-body">
                  <div class="form-group">
                    <h2> Ini Adalah Halaman Manajemen Customer</h2>
                    <br>
                    <a href="?pg=customer&act=add"> <button type="button" class="btn btn-danger"><i class="fa fa-plus"> Tambah Data </i></button> </a>

                  </div>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Customer</th>
                          <th>No Hp</th>
                          <th>Alamat</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT * FROM customer
                   order by id asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[nama]" ?></td>
                            <td><?php echo "$r[no_hp]" ?></td>
                            <td><?php echo "$r[alamat]" ?></td>

                            <td><a href="?pg=customer&act=edit&id=<?php echo $r['id'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                            <td><a href="?pg=customer&act=delete&id=<?php echo $r['id'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
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
      </div>
      <!--/.container -->
    </div>
    <!-- /.content-wrapper -->

  <?php
    break;
    // PROSES TAMBAH DATA Customer //
  case 'add':
    if (isset($_POST['add'])) {
      $query = $mysqli->query("INSERT INTO customer (id,nama,no_hp,alamat) VALUES ('','$_POST[nama]','$_POST[no_hp]',
  '$_POST[alamat]')");
      echo "<script>window.location='home.php?pg=customer&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Customer </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=customer&act=view">Data Customer</a></li>
            <li class="active"><a href="#">Tambah Data Customer</a></li>
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
                        <label class="form-label">Nama Customer</label>
                        <input name="nama" type="text" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">No HP</label>
                        <input name="no_hp" type="text" class="form-control" required>
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
          </div> <!-- /.col -->
          <!-- </div> -->
          <!-- /.row (main row) -->
        </section> <!-- /.content -->
      </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->


  <?php
    break;
    // PROSES EDIT DATA Customer //
  case 'edit':
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM customer WHERE id='$_GET[id]'"));
    if (isset($_POST['update'])) {


      $mysqli->query("UPDATE customer SET nama='$_POST[nama]', no_hp='$_POST[no_hp]', 
      alamat='$_POST[alamat]'
      WHERE id='$_POST[id]'");
      echo "<script>window.location='home.php?pg=customer&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Customer </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=customer&act=view">Data Customer</a></li>
            <li class="active">Update Data Customer</li>
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
                        <label class="form-label">Nama Customer</label>
                        <input name="nama" type="text" class="form-control" value="<?php echo $d['nama']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">No HP</label>
                        <input name="no_hp" class="form-control" value="<?php echo $d['no_hp']; ?>" type="text" class="form-control">
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
          </div> <!-- /.col -->
          <!-- </div> -->
          <!-- /.row (main row) -->
        </section> <!-- /.content -->
      </div><!-- /.container -->
    </div>
    <!-- /.content-wrapper -->


<?php
    break;

    // PROSES HAPUS DATA Customer //
  case 'delete':
    $mysqli->query("DELETE FROM customer WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=customer&act=view'</script>";
    break;
}
?>