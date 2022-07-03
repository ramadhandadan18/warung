<?php
session_start();
// require_once("config.php");
// include "config/koneksi.php";
require_once("koneksiPDO.php");

if (isset($_POST['register'])) {

    // filter data yang diinputkan
    $kd_customer = $_POST['kd_customer'];
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = md5($_POST["password"]);
    // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];
    $id_akses = $_POST['id_akses'];

    //cek username
    $query = $db->prepare("SELECT * FROM customers WHERE username = ?");
    $query->execute(array($username));
    if ($query->rowCount() != 0) {
        // echo "<div align='center'>Username Sudah Terdaftar! <a href='register.php'>Back</a></div>";
        echo "<div class='text-center alert alert-danger' role='alert'>Username Sudah Terdaftar!
        <button type='button' class='btn btn-sm btn-info'><a href='login.php'>Login</button></div>";
    } else {
        // if (!$username || !$pass) {
        //     echo "<div align='center'>Masih ada data yang kosong! <a href='daftar.php'>Back</a>";
        // } else {
        //     $sql = $db->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
        //     $simpan = $sql->execute(array($username, $pass));
        //     if ($simpan) {
        //         echo "<div align='center'>Pendaftaran Sukses, Silahkan <a href='login.php'>Login</a></div>";
        //     } else {
        //         echo "<div align='center'>Proses Gagal!</div>";
        //     }
        // }


        // menyiapkan query
        $sql = "INSERT INTO customers (nama, username, password, kd_customer, notelp, alamat, id_akses) 
            VALUES (:nama, :username, :password, :kd_customer, :notelp, :alamat, :id_akses)";
        $stmt = $db->prepare($sql);

        // bind parameter ke query
        $params = array(
            ":nama" => $nama,
            ":username" => $username,
            ":password" => $password,
            // ":email" => $email
            ":kd_customer" => $kd_customer,
            ":notelp" => $notelp,
            ":alamat" => $alamat,
            ":id_akses" => $id_akses
        );

        // eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($params);
        // var_dump($params);

        // jika query simpan berhasil, maka user sudah terdaftar
        // maka alihkan ke halaman login
        if ($saved) header("Location: login.php");
    }
}

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> REG APLIKASI RUMAH MAKAN DEWI SRI | CIREBON</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck 
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <p class="login-box-msg">Daftar Pelanggan</p>
            <form action="" method="POST">
                <?php $kd_cust = kd_cust_pemesanan();
                ?>
                <input type="hidden" name="kd_customer" class="form-control" value="<?php echo $kd_cust; ?>" name="kd_customer">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                    <span class="glyphicon glyphicon-comment form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="notelp" class="form-control" placeholder="No Telepon" required>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                </div>
                <input type="hidden" name="id_akses" class="form-control" value="4" name="id_akses">
                <!-- <button type="submit" class="btn btn-primary btn-block"></i>Daftar</button> -->
                <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

            </form>

            <div class="social-auth-links text-center mt-2 mb-3">
                <a href="login.php" class="btn btn-block btn-primary">
                    <i class="fa fa-sign-in mr-2"></i> Login
                </a>
            </div>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

</html>