<?php
  session_start();
  session_destroy();
   echo "<SCRIPT language=Javascript>
  alert('Anda Telah Berhasil Keluar dari Sistem. Terimakasih')
  </script>
  <meta http-equiv='refresh' content='0; url=../index.php'/>";

// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:

//  header('location:http://www.alamatwebsite.com');
?>
