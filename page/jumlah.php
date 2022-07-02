<?php
// $host = 'localhost';
//  $user = 'root';
//  $pass = '';
//  $db = 'ta_aplikasi_pasir';
//  mysql_select_db($db, mysql_connect($host, $user, $pass));
// error_reporting(0);

$j = ($_POST['jml']);
?>
<form class='form-ad' role='form' method='POST' enctype='multipart/form-data' action='?pg=gallery&act=add'>
  <?php
  for ($i = 1; $i <= $j; $i++) {

    echo "
<div class='col-sm-12'>

<!-- //////////////////////////// form input gambar dinamis ///////////////////////////// -->

        <div class='input-group control-group after-add-more'>
          <div class='row'>
            <div class='ads-details-info col-md-3'>
              <div class='btn btn-danger btn-file'>
              <i class='glyphicon glyphicon-folder-open'></i> &nbsp;Browse …
              <input class='file' data-preview-file-type='text' type='file' id='uploadImage" . $i . "' 
               onchange='PreviewImage(" . $i . ")' name='gambar" . $i . "'>
                  <div class='ripple-container'></div></div>
              </div>
            <div class='col-md-2'>
                <aside class='panel panel-body panel-details'>"; ?>
    <?php echo " <img src='../upload/gallery/" . $d['foto'] . "' id='uploadPreview" . $i . "' width='100' height='50'/>"; ?>
  <?php echo "
                </aside>
            </div>
          <!-- ///////////////////spasi/////////////////// -->
            <div class='col-md-7'>
            <input type='text' name='judul_gambar" . $i . "' class='form-control' placeholder='Masukkan Judul gambar' required>
            </div>
           
        </div>
          <!-- pemanis -->
          <div class='input-group-btn'>  </div>
        </div>
      
</div>
<br>";
  }
  ?>
  <br>
  <input type="hidden" name="jum" value="<?php echo $j; ?>">
  <center><button type='submit' name='add' class='btn btn-common'>Submit</button></center>
</form>