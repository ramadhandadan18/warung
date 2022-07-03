<?php
// error_reporting(0);
include "../config/koneksi.php";
// include "../config/function.php";
include "../config/fungsi_indotgl.php";
session_start();
// if(isset($_SESSION['username'])) {
//   header('location:index.php'); }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>APLIKASI DIGITAL MENU CAFE ROADWAY COFFEE DIGITAL MENU CAFE ROADWAY COFFEE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-red-light.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/select2.min.css">

  <!-- Boostrap Sub Menu -->
  <link rel="stylesheet" href="../dist/css/bootstrap-submenu.min.css">

  <!--  <link href="../dist/slider/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="../dist/slider/js-image-slider.js" type="text/javascript"></script> -->
  <script src="../plugins/slider/js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="hold-transition skin-red-light layout-boxed layout-top-nav ">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/">DIGITAL MENU CAFE ROADWAY COFFEE <span class="sr-only">(current)</span></a></li>
              <!-- <li><a href="#">Link</a></li> -->
              <?php
              if ($_SESSION['id_akses'] == 1) {
              ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?pg=kategori&act=view">Data Kategori Menu</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=menu&act=view">Data Menu</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=hrg&act=view">Data Harga</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=stok&act=view">Data Stok Menu</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=pggna&act=view">Data User</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=barang&act=view">Kelola Barang</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=reservasi&act=view">Reservasi</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Transaksi <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?pg=pmsn&act=view"><i class="fa fa-check-square-o"></i> Transaksi Pemesanan Menu</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=pmby&act=view"><i class="fa fa-check-square-o"></i> Transaksi Pembayaran Menu</a></li>
                    <li class="divider"></li>
                    <!-- <li><a href="?pg=pnjln&act=view"><i class="fa fa-check-square-o"></i> Transaksi Penjualan Tunai</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=pmbln&act=view"><i class="fa fa-check-square-o"></i> Transaksi Pembelian Menu</a></li> -->
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="divider"></li>
                    <li><a href="?pg=lap_pemesanan&act=view"><i class="fa fa-check-square-o"></i> Laporan Pemesanan</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=lap_pembayaran&act=view"><i class="fa fa-check-square-o"></i> Laporan Pembayaran</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Karyawan<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?pg=absen&act=view"><i class="fa fa-check-square-o"></i>Absensi</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=lembur&act=view"><i class="fa fa-check-square-o"></i>Lembur</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengaturan<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?pg=pengaturan&act=view">Pengaturan Aplikasi</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=kode&act=view">Kode dan Link</a></li>
                    <!-- <li><a href="?pg=pnjln&act=view"><i class="fa fa-check-square-o"></i> Transaksi Penjualan Tunai</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=pmbln&act=view"><i class="fa fa-check-square-o"></i> Transaksi Pembelian Menu</a></li> -->
                  </ul>
                </li>
              <?php }  ?>
              <?php
              if ($_SESSION['id_akses'] == 0) {
              ?>
                <li><a href="?pg=stok&act=view">Stok</a></li>
              <?php }  ?>

              <?php
              if ($_SESSION['id_akses'] == 3) {
              ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservasi<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?pg=reservasi&act=view"><i class="fa fa-check-square-o"></i>Daftar Reservasi</a></li>
                    <li class="divider"></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Transaksi <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?pg=pmsn&act=view"><i class="fa fa-check-square-o"></i> Transaksi Pemesanan Menu</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=pmby&act=view"><i class="fa fa-check-square-o"></i> Transaksi Pembayaran Menu</a></li>
                    <li class="divider"></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Karyawan<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="?pg=absen&act=view"><i class="fa fa-check-square-o"></i>Absensi</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=lembur&act=view"><i class="fa fa-check-square-o"></i>Lembur</a></li>
                  </ul>
                </li>
              <?php } ?>
              <?php
              if ($_SESSION['id_akses'] == 2 || $_SESSION['id_akses'] == 3) {
              ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="divider"></li>
                    <li><a href="?pg=lap_pemesanan&act=view"><i class="fa fa-check-square-o"></i> Laporan Pemesanan</a></li>
                    <li class="divider"></li>
                    <li><a href="?pg=lap_pembayaran&act=view"><i class="fa fa-check-square-o"></i> Laporan Pembayaran</a></li>
                  </ul>
                </li>
              <?php } ?>
            </ul>
            <!-- <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
              </form> -->
          </div><!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifikasi Pemesanan -->
              <!-- <div id="get_notif" >
                <div id="loading" > -->
              <li class="dropdown notifications-menu" id="get_notif">
                <?php
                include "notifikasi.php";
                ?>
              </li>
              <li class="footer"><a href="#">Lihat Selengkapnya</a></li>
            </ul>
            </li>
            <!-- notifikasi pesanan -->
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                $profil = mysqli_fetch_array($mysqli->query("select * from users where username = '$_SESSION[username]'"))
                ?>
                <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
                <span class="hidden-xs"> <?php echo strtoupper($_SESSION['username']); ?> </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
                  <p>
                    <?php echo " $_SESSION[username] " ?> - ADMIN
                    <small>APLIKASI DIGITAL MENU CAFE ROADWAY COFFEE</small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                  </div>
                </li>
              </ul>
            </li>

            </ul>
          </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>
    <!-- </header> -->


    <!-- Content Wrapper. Contains page content -->
    <?php
    include "content.php";
    ?>
    <!-- /.content-wrapper -->


    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>APLIKASI DIGITAL MENU CAFE ROADWAY COFFEE</b>
      </div>
      <strong> LA AKSI 2022 <a href="#">DIGITAL MENU CAFE ROADWAY COFFEE</a>. | <a href=' title='' target='_blank'>R&N</a>
      </strong>
    </footer>


    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../dist/js/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.5 -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- daterangepicker -->
  <script src="../dist/js/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- DataTables -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="../plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- ChartJS 1.0.1 -->
  <script src="../plugins/chartjs/Chart.min.js"></script>
  <!-- Donut Chart -->
  <script src="../plugins/chartjs/Chart.Doughnut.js"></script>

  <!-- Fileinput.js -->
  <script src="../bootstrap/js/photo_adm.js"></script>

  <!-- Select2 -->
  <script src="../plugins/select2/select2.full.min.js"></script>

  <!-- page script -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example1').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'copyHtml5',
            footer: true
          },
          {
            extend: 'excelHtml5',
            footer: true
          },
          {
            extend: 'csvHtml5',
            footer: true
          },
          {
            extend: 'pdfHtml5',
            footer: true
          }
        ]
      });

      $('#tabel_pesanan').DataTable({
        "paging": false,
        "filtering": false,
        "ordering": false,
        "info": false,
        "searching": false,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'copyHtml5',
            footer: true
          },
          {
            extend: 'excelHtml5',
            footer: true
          },
          {
            extend: 'csvHtml5',
            footer: true
          },
          {
            extend: 'pdfHtml5',
            footer: false
          }
        ]
      });

    });
  </script>
  <script>
    $(function() {

      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

      });
    });
  </script>

  <!-- page script Select2 Elements -->
  <script>
    $(function() {
      //Initialize Select2 Elements
      $(".select2").select2();
    });
  </script>

  <!-- page script Submenu -->
  <script src="../dist/js/bootstrap-submenu.min.js"></script>

  <!-- page script Dropdown Submenu -->
  <script type="text/javascript">
    $(document).ready(function() {

      $(".dropdown-submenu").click(function(event) {
        // stop bootstrap.js to hide the parents
        event.stopPropagation();
        // hide the open children
        $(this).find(".dropdown-submenu").removeClass('open');
        // add 'open' class to all parents with class 'dropdown-submenu'
        $(this).parents(".dropdown-submenu").addClass('open');
        // this is also open (or was)
        $(this).toggleClass('open');
      });
    });
  </script>

  <!-- page script datepicker -->
  <script>
    $(document).ready(function() {
      var date_input = $('input[id="date"]'); //our date input has the name "date"
      var container = $('.content form').length > 0 ? $('.content form').parent() : "body";
      var options = {
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>
  <script>
    $(document).on('click', '.menu', function() {
      alert("asdadss");
      // var id_registrasi = $(this).data('id');
      // $('#id_registrasi').val(id_registrasi);
      // $('#modal_confirm_bayar').modal('show');
    })
  </script>
  <script type="text/javascript"></script>
</body>

</html>

<script>
  var refreshId = setInterval(function() {
    // $("#loading").html("<img src='../dist/img/loader.gif' width='10px' height='10px'/>");
    $('#get_notif').load('notifikasi.php');
  }, 3000);
</script>