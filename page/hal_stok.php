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
        <h1> Data stok </h1>
        <ol class="breadcrumb">
          <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
          <li class="active"><a href="?pg=stok&act=view">Data stok</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-list"></i>
                <h3 class="box-title">Daftar Stok Menu</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button class="btn btn-info btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->
              </div>
              <div class="box-body">
                <a href="?pg=stok&act=add"> <button type="button" class="btn btn-danger">
                    <i class="fa fa-plus"> Tambah Data </i></button> </a>

                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama menu</th>
                        <th>Stok awal</th>
                        <th>Sisa</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $tampil = $mysqli->query("SELECT menu.*,stok.* FROM menu JOIN stok ON menu.id=stok.id_menu
                   order by stok.id_menu asc");
                      $no = 1;
                      while ($r = mysqli_fetch_array($tampil)) {
                      ?>
                        <tr>
                          <td><?php echo "$no" ?></td>
                          <td><?php echo "$r[nama_menu]" ?></td>
                          <td><?php echo "$r[stok]" ?></td>
                          <td><?php echo "$r[sisa]" ?></td>

                          <td><a href="?pg=stok&act=edit&id=<?php echo $r['id'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                          <td><a href="?pg=stok&act=delete&id=<?php echo $r['id'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
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
    <!-- </div> -->
    <!-- /.content-wrapper -->

  <?php
    break;
    // PROSES TAMBAH DATA stok //
  case 'add':
    if (isset($_POST['add'])) {
      $query = $mysqli->query("INSERT INTO stok (id,id_menu,stok,sisa) VALUES ('','$_POST[id_menu]',
    '$_POST[stok_awal]','$_POST[sisa]')");
      echo "<script>window.location='home.php?pg=stok&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data stok </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=stok&act=view">Data stok</a></li>
            <li class="active"><a href="#">Tambah Data stok</a></li>
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
                        <label class="form-label">Nama menu</label>
                        <select id='id_menu' name='id_menu' class="form-control" data-validation="[NOTEMPTY]">
                          <option value="">-- Silahkan Pilih Nama menu--</option>
                          <?php
                          //if ($_SESSION['id_akses'] == "1") { 
                          $result = $mysqli->query("SELECT * from menu");
                          while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='$row[id]'>" . $row['nama_menu'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Stok Awal</label>
                        <input name="stok_awal" type="number" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Sisa</label>
                        <input name="sisa" type="number" class="form-control" required>
                      </div>


                    </div>

                </div><!-- /.box-body -->

              </div><!-- /.box -->
            </div> <!-- /.col -->

            <!-- </div> -->
            <!-- /.row -->


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
    // PROSES EDIT DATA stok //
  case 'edit':
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM stok WHERE id='$_GET[id]'"));
    if (isset($_POST['update'])) {
      $mysqli->query("UPDATE stok SET id_menu='$_POST[id_menu]', stok='$_POST[stok]', sisa='$_POST[sisa]'
    WHERE id='$_POST[id]'");
      echo "<script>window.location='home.php?pg=stok&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data stok </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=stok&act=view">Data stok</a></li>
            <li class="active">Update Data stok</li>
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
                        <label class="form-label">Nama menu</label>
                        <select id='id_menu' name='id_menu' class="form-control" data-validation="[NOTEMPTY]">
                          <option value="">-- Silahkan Pilih Nama menu--</option>
                          <?php
                          $cek_nilai = $d['id_menu'];
                          $result = $mysqli->query("SELECT * from menu");
                          while ($row = mysqli_fetch_array($result)) {
                            if ($row['id'] == $cek_nilai) {
                              echo "<option value='$row[id]' selected>" . $row['nama_menu'] . "</option>";
                            } else {
                              echo "<option value='$row[id]' >" . $row['nama_menu'] . "</option>";
                            }
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Stok Awal</label>
                        <input name="stok" type="number" class="form-control" value="<?php echo $d['stok']; ?>" required>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Sisa</label>
                        <input name="sisa" type="number" class="form-control" value="<?php echo $d['sisa']; ?>" required>
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

    // PROSES HAPUS DATA stok //
  case 'delete':
    $mysqli->query("DELETE FROM stok WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=stok&act=view'</script>";
    break;
}
?>