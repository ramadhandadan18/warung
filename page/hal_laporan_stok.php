<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
switch ($_GET['act']) {
    // PROSES VIEW DATA USER //      
  case 'view':
?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> Data Laporan Stok Barang</h1>
        <ol class="breadcrumb">
          <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
          <li class="active"><a href="?pg=lap_stok&act=view">Data Laporan Stok Barang</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box-header">
              <!-- <a href="?pg=lap_stok&act=add"> <button type="button" class="btn btn-danger"><i class = "fa fa-plus"> Tambah Data </i></button> </a> -->
            </div><!-- /.box-header -->
            <!-- general form elements -->
            <div class="box box-danger">
              <div class="box-body">
                <div class="form-group">
                  <h2> Ini Adalah Halaman <b>Laporan Stok</b> BARANG DAGANG</h2>

                </div>
                <!-- <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Jenis Login</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $tampil = $mysqli->query("SELECT users.*,akses_user.* FROM users JOIN akses_user ON users.id_akses=akses_user.id_akses
                   order by users.idusers asc");
                  $no = 1;
                  while ($r = mysqli_fetch_array($tampil)) {
                  ?>
                    <tr>
                      <td><?php echo "$no" ?></td>
                      <td><?php echo "$r[username]" ?></td>
                      <td><?php echo "$r[nama]" ?></td>

                      <td><a href="?pg=lap_stok&act=edit&id=<?php echo $r['idusers'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                      <td><a href="?pg=lap_stok&act=delete&id=<?php echo $r['idusers'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                    </tr>

                    <?php
                    $no++;
                  }
                    ?>
                </tbody>
              </table>
            </div> -->
                <!-- /.box-body -->
              </div>
            </div><!-- /.box -->
          </div> <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </section> <!-- /.content -->
    </div><!-- /.container -->
    </div><!-- /.content-wrapper -->

  <?php
    break;
    // PROSES TAMBAH DATA Laporan Stok Barang//
  case 'add':
    if (isset($_POST['add'])) {
      $query = $mysqli->query("INSERT INTO users (idusers,username,password,id_akses) VALUES ('','$_POST[username]',
  md5('$_POST[password]'),'$_POST[id_akses]')");
      echo "<script>window.location='home.php?pg=lap_stok&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> Data Laporan Stok Barang</h1>
        <ol class="breadcrumb">
          <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
          <li class="active"><a href="?pg=lap_stok&act=view">Data Laporan Pembelian</a></li>
          <li class="active"><a href="#">Tambah Data Laporan Pembelian</a></li>
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
                      <label class="form-label">Username</label>
                      <input name="username" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Password</label>
                      <input name="password" type="password" class="form-control" required>
                    </div>

                    <!-- Select2 Single Item -->
                    <div class="form-group">
                      <label>Jenis Login</label>
                      <select id='id_akses' name='id_akses' class="form-control select2" data-validation="[NOTEMPTY]">
                        <option value="">-- Silahkan Pilih Hak Akses User --</option>
                        <?php
                        //if ($_SESSION['id_akses'] == "1") { 
                        $result = $mysqli->query("SELECT * from akses_user");
                        while ($row = mysqli_fetch_array($result)) {
                          echo "<option value='$row[id_akses]'>" . $row['nama'] . "</option>";
                        }

                        //}else if  ($_SESSION['id_akses'] == "4") { 
                        // $result=mysql_query("SELECT * from akses_user where id_akses != '1' and id_akses !='2' and id_akses !='4' ");
                        //       while ($row = mysql_fetch_array($result)) {
                        //echo "<option value='$row[id_akses]'>" . $row['nama'] . "</option>";
                        //  }
                        //  }  
                        ?>
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
        </div> <!-- /.col -->
    </div>
    <!-- /.row (main row) -->
    </section> <!-- /.content -->
    </div><!-- /.container -->
    </div><!-- /.content-wrapper -->


  <?php
    break;
    // PROSES EDIT DATA Laporan Stok Barang//
  case 'edit':
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM users WHERE idusers='$_GET[id]'"));
    if (isset($_POST['update'])) {

      if (empty($_POST['password'])) {

        $mysqli->query("UPDATE users SET username='$_POST[username]',
      id_akses='$_POST[id_akses]'
      WHERE idusers='$_POST[id]'");
        echo "<script>window.location='home.php?pg=lap_stok&act=view'</script>";
      } else {
        $mysqli->query("UPDATE users SET username='$_POST[username]', 
      password=md5('$_POST[password]'), id_akses='$_POST[id_akses]'
      WHERE idusers='$_POST[id]'");
        echo "<script>window.location='home.php?pg=lap_stok&act=view'</script>";
      }
    }
  ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> Data Laporan Stok Barang</h1>
        <ol class="breadcrumb">
          <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
          <li class="active"><a href="?pg=lap_stok&act=view">Data Laporan Pembelian</a></li>
          <li class="active">Update Data Laporan Pembelian</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group">
                  <h2> Ini Adalah Halaman Manajemen Laporan Stok BarangHarga BARANG DAGANG</h2>

                </div>
                <!-- form start -->
                <!-- <form role="form" method = "POST" action="">
              <div class="box-body">
                <input type="hidden" class="form-control" id="id" name="id" required  value= "<?php echo $d['idusers']; ?>">
                <div class="form-group">
                  <label class="form-label">Username</label>
                  <input name="username"
                  type="text"
                  class="form-control" value="<?php echo $d['username']; ?>"
                  required>
                </div>
                <div class="form-group">
                  <label class="form-label">Password</label>
                  <input name="password"
                  type="password"
                  class="form-control" 
                  >
                </div>

                <div class="form-group">
                  <label>Jenis Login</label>
                  <select id='id_akses' name='id_akses' class="form-control select2"
                  >
                  <option value="">-- Silahkan Pilih Hak Akses User --</option>
                  <?php
                  $akses = $d['id_akses'];
                  //if ($_SESSION['id_akses'] == "1") { 
                  $result = $mysqli->query("SELECT * from akses_user");
                  while ($row = mysqli_fetch_array($result)) {
                    if ($akses == $row['id_akses']) {
                      echo "<option value='$row[id_akses]' selected>" . $row['nama'] . "</option>";
                    } else {
                      echo "<option value='$row[id_akses]'>" . $row['nama'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div> 

            </div> -->
                <!-- /.box-body -->

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
    </div><!-- /.content-wrapper -->


<?php
    break;

    // PROSES HAPUS DATA Laporan Stok Barang//
  case 'delete':
    $mysqli->query("DELETE FROM users WHERE idusers='$_GET[id]'");
    echo "<script>window.location='home.php?pg=lap_stok&act=view'</script>";
    break;
}
?>