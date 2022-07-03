<?php
// if(empty($_SESSION['username'])){
//    echo "Not found!";
// } else {
switch ($_GET['act']) {
    // PROSES VIEW DATA USER //      
  case 'view':
?>

    <!-- <div class="content-wrapper"> -->
    <div class="container">

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1> Data menu </h1>
        <ol class="breadcrumb">
          <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
          <li class="active"><a href="?pg=menu&act=view">Data menu</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-list"></i>
                <h3 class="box-title">Daftar Menu</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button class="btn btn-info btn-sm pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                </div><!-- /. tools -->
              </div>
              <div class="box-body">
                <div class="form-group">
                  <a href="?pg=menu&act=add"> <button type="button" class="btn btn-danger" style="background-color: #dd3974 !important;"><i class="fa fa-plus"> Tambah Data </i></button> </a>

                </div>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kategori Menu menu</th>
                        <th>Nama menu</th>
                        <th>gambar</th>
                        <th>Ket</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      error_reporting(0);
                      $tampil = $mysqli->query("SELECT a.*,b.*,a.id as id_menu FROM menu a INNER JOIN kategori_menu b on a.id_kategori=b.id
                     order by a.id asc");
                      $no = 1;
                      while ($r = mysqli_fetch_array($tampil)) {
                      ?>
                        <tr>
                          <td><?php echo "$no" ?></td>
                          <td><?php echo "$r[nama_kategori]" ?></td>
                          <td><?php echo "$r[nama_menu]" ?></td>
                          <!-- <td><img src="<?php echo $r['gambar'] ?>" width="50px"></td> -->
                          <td><?php echo "<img src=../upload/menu/" . $r['gambar'] . " width='60px'>"; ?></td>
                          <td><?php echo "$r[ket]" ?></td>

                          <td><a href="?pg=menu&act=edit&id=<?php echo $r['id_menu'] ?>"><button type="button" class="btn bg-orange"><i class="fa fa-pencil-square-o"></i></button></a></td>
                          <td><a href="?pg=menu&act=delete&id=<?php echo $r['id_menu'] ?>"><button type="button" class="btn btn-info" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class="fa fa-trash-o"></i></button></a></td>
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
    <!-- </div> -->
  <?php

    break;
    // PROSES TAMBAH DATA menu //
  case 'add':
    error_reporting(0);


    if (isset($_POST['add'])) {
      ///////////////////////////foto //////////////////////////////// 
      $lokasi_file = $_FILES['gambar']['tmp_name'];
      $foto_file = $_FILES['gambar']['name'];
      $tipe_file = $_FILES['gambar']['type'];
      $ukuran_file = $_FILES['gambar']['size'];

      $direktori = "../upload/menu/$foto_file";


      $sql = null;
      $MAX_FILE_SIZE = 1000000;
      //100kb
      if ($ukuran_file > $MAX_FILE_SIZE) {
        // header("Location:url?page=form_produk&status=1");
        exit();
      }
      $sql = null;
      if ($ukuran_file > 0) {
        move_uploaded_file($lokasi_file, $direktori);
      }

      $query = $mysqli->query("INSERT INTO menu (id,id_kategori, nama_menu,gambar, ket) VALUES ('','$_POST[id_kategori]','$_POST[nama]','$foto_file','$_POST[ket]') ");
      echo "<script>window.location='home.php?pg=menu&act=view'</script>";
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data menu </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=menu&act=view">Data menu</a></li>
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
                  <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="form-label">Nama Kategori</label>
                        <select id='id_menu' name='id_kategori' class="form-control" data-validation="[NOTEMPTY]">
                          <option value="">-- Silahkan Pilih Nama Kategori--</option>
                          <?php
                          //if ($_SESSION['id_akses'] == "1") { 
                          $result = $mysqli->query("SELECT * from kategori_menu");
                          while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='$row[id]'>" . $row['nama_kategori'] . "</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Nama menu</label>
                        <input name="nama" type="text" class="form-control" required>
                      </div>
                      <div class="form-group ">
                        <ul class="breadcrumb">
                          <label for="foto">Foto </label>
                        </ul>
                      </div>
                      <div class="form-group">

                        <a class="cboxElement "> <?php echo " <img src='upload/menu/" . $data['foto'] . "' id='uploadPreview1' width='120' height='140'/>"; ?> </a>
                        <input type="file" id="uploadImage1" onchange="PreviewImage(1)" name='gambar'>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Keterangan</label>
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

    <!-- upload gambar dengan preview -->
    <script type="text/javascript">
      function PreviewImage(no) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage" + no).files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("uploadPreview" + no).src = oFREvent.target.result;
        };
      }
    </script>
    <!-- end upload gambar dengan preview -->

  <?php
    break;
    // PROSES EDIT DATA menu //
  case 'edit':
    error_reporting(0);
    $d = mysqli_fetch_array($mysqli->query("SELECT * FROM menu WHERE id='$_GET[id]'"));
    if (isset($_POST['update'])) {

      //  jika foto ganti
      $lokasi_file = $_FILES['gambar']['tmp_name'];
      $foto_file = $_FILES['gambar']['name'];
      $tipe_file = $_FILES['gambar']['type'];
      $ukuran_file = $_FILES['gambar']['size'];

      $direktori = "../upload/menu/$foto_file";


      $sql = null;
      $MAX_FILE_SIZE = 1000000;
      //100kb
      if ($ukuran_file > $MAX_FILE_SIZE) {
        // header("Location:url?page=form_produk&status=1");
        exit();
      }
      $sql = null;
      if ($ukuran_file > 0) {
        move_uploaded_file($lokasi_file, $direktori);
      }

      if ($foto_file) {
        $mysqli->query("UPDATE menu SET id_kategori='$_POST[id_kategori]',nama_menu='$_POST[nama]', 
    ket='$_POST[ket]',gambar='$foto_file'
    WHERE id='$_POST[id]'");
        echo "<script>window.location='home.php?pg=menu&act=view'</script>";
      } else {
        $mysqli->query("UPDATE menu SET id_kategori='$_POST[id_kategori]',nama_menu='$_POST[nama]', 
    ket='$_POST[ket]'
    WHERE id='$_POST[id]'");
        echo "<script>window.location='home.php?pg=menu&act=view'</script>";
      }
    }
  ?>

    <div class="content-wrapper">
      <div class="container">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Data menu </h1>
          <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=menu&act=view">Data menu</a></li>
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
                  <form role="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="box-body">
                      <input type="hidden" class="form-control" id="id" name="id" required value="<?php echo $d['id']; ?>">
                      <div class="form-group">
                        <label class="form-label">Nama Kategori</label>
                        <select id='id_menu' name='id_kategori' class="form-control" data-validation="[NOTEMPTY]">
                          <option value="">-- Silahkan Pilih Nama Kategori--</option>
                          <?php
                          $cek_nilai = $d['id_kategori'];
                          $result = $mysqli->query("SELECT * from kategori_menu");
                          while ($row = mysqli_fetch_array($result)) {
                            if ($row['id'] == $cek_nilai) {
                              echo "<option value='$row[id]' selected>" . $row['nama_kategori'] . "</option>";
                            } else {
                              echo "<option value='$row[id]' >" . $row['nama_kategori'] . "</option>";
                            }
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Nama menu</label>
                        <input name="nama" value="<?php echo $d['nama_menu']; ?>" type="text" class="form-control" required>
                      </div>
                      <div class="form-group ">
                        <ul class="breadcrumb">
                          <label for="foto">Foto </label>
                        </ul>
                      </div>
                      <div class="form-group">

                        <a class="cboxElement "> <?php echo " <img src='../upload/menu/" . $d['gambar'] . "' id='uploadPreview1' width='120' height='140'/>"; ?> </a>
                        <input type="file" id="uploadImage1" onchange="PreviewImage(1)" name='gambar'>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Keterangan</label>
                        <input name="ket" value="<?php echo $d['ket']; ?>" type="text" class="form-control" required>
                      </div>
                      </select>
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
    <!-- upload gambar dengan preview -->
    <script type="text/javascript">
      function PreviewImage(no) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage" + no).files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("uploadPreview" + no).src = oFREvent.target.result;
        };
      }
    </script>
    <!-- end upload gambar dengan preview -->

<?php
    break;

    // PROSES HAPUS DATA menu //
  case 'delete':
    $mysqli->query("DELETE FROM menu WHERE id='$_GET[id]'");
    echo "<script>window.location='home.php?pg=menu&act=view'</script>";
    break;
}
?>