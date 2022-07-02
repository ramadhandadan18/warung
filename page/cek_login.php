<?php
error_reporting(0);

include "../config/koneksi.php";
$pass = md5($_POST['pass']);

$login = $mysqli->query("SELECT * FROM users WHERE username='$_POST[username]' AND password='$pass'");
if (mysqli_num_rows($login) == 0) {
  $login = $mysqli->query("SELECT * FROM customers WHERE username='$_POST[username]' AND password='$pass'");
}
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0) {
  session_start();

  // inisialisasi session /////////

  ("username");
  ("password");
  // ("status");
  ("id_akses");

  $_SESSION['username']     = $r['username'];
  $_SESSION['password']     = $r['password'];
  // $_SESSION['status']       = $r['status'];
  $_SESSION['id_akses']     = $r['id_akses'];

  if ($_SESSION['id_akses'] == 4) {
    header('location:../customer.php');
  } else {
    header('location:home.php');
  }
} else {
  echo "<SCRIPT language=Javascript>
  alert('Login Anda Gagal,  username dan password tidak valid. Silahkan Hubungi Admin')
  </script>";
  echo "
  <meta http-equiv='refresh' content='0; url=../index.php'/>";
}
