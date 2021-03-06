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
          <h1> Data lembur </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=kategori&act=view">Data Lembur</a></li>
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
                  <h3 class="box-title">Lembur</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                  <a href="?pg=lembur&act=add"> <button type="button" class="btn btn-danger" style="background-color: #dd3974 !important;"><i class="fa fa-plus"> Tambah Data </i></button> </a>

                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Karyawan</th>
                          <th>Jam Lembur</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $tampil = $mysqli->query("SELECT * FROM lembur
                   order by id_lembur asc");
                        $no = 1;
                        while ($r = mysqli_fetch_array($tampil)) {
                        ?>
                          <tr>
                            <td><?php echo "$no" ?></td>
                            <td><?php echo "$r[nama]" ?></td>
                            <td><?php echo "$r[jam]" ?></td>

                            <td><a href="?pg=kategori&act=edit&id_embur=<?php echo $r['id_embur'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                            <td><a href="?pg=kategori&act=delete&id_embur=<?php echo $r['id_embur'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
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
      $query = $mysqli->query("INSERT INTO lembur (id_embur,nama, jam) VALUES ('','$_POST[nama]','$_POST[jam]') ");
      echo "<script>window.location='home.php?pg=lembur&act=view'</script>";
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
                        <select name="nama" class="form-control" multiple="multiple" required>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Jam Lembur</label>
                        <input name="jam" type="text" class="form-control" required>
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
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM lembur WHERE id_embur='$_GET[id_embur]'"));
    if (isset($_POST['update'])) {

      $mysqli->query("UPDATE lembur SET nama='$_POST[nama]', 
    jam='$_POST[jam]'
    WHERE id_embur='$_POST[id_embur]'");
      echo "<script>window.location='home.php?pg=lembur&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data Lembur </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=kategori&act=view">Data Lembur</a></li>
            <li class="active">Update Data Lembur</li>
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
                      <input type="hidden" class="form-control" id="id_embur" name="id_embur" required value="<?php echo $d['id_embur']; ?>">
                      <div class="form-group">
                        <label class="form-label">Nama Karyawan</label>
                        <input name="nama" type="text" class="form-control" value="<?php echo $d['nama']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Jam</label>
                        <input name="jam" type="text" class="form-control" value="<?php echo $d['jam']; ?>">
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
    $mysqli->query("DELETE FROM kategori_menu WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=kategori&act=view'</script>";
    break;
}
?>