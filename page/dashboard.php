<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-body">

              <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <?php
                  $query   = "SELECT COUNT(*) as jumData  FROM menu ";
                  $hasil  = $mysqli->query($query);
                  $data     = mysqli_fetch_array($hasil);
                  $jmldata = $data['jumData'];
                  ?>
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?php echo $jmldata ?></h3>
                      <p>Daftar Menu</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="?pg=menu&act=view" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <?php
                  $query   = "SELECT COUNT(*) as jumData  FROM transaksi_pemesanan Where status='0' ";
                  $hasil  = $mysqli->query($query);
                  $data     = mysqli_fetch_array($hasil);
                  $jmldata = $data['jumData'];
                  ?>
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?php echo $jmldata ?><sup style="font-size: 20px"></sup></h3>
                      <p>Pesanan Belum Bayar</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="?pg=pmsn&act=view" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <?php
                  $query   = "SELECT COUNT(*) as jumData  FROM transaksi_pemesanan Where status='1' ";
                  $hasil  = $mysqli->query($query);
                  $data     = mysqli_fetch_array($hasil);
                  $jmldata = $data['jumData'];
                  ?>
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?php echo $jmldata ?></h3>
                      <p>Pesanan Sudah Bayar</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="?pg=pmsn&act=view" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <?php
                  $query   = "SELECT COUNT(*) as jumData  FROM transaksi_pemesanan";
                  $hasil  = $mysqli->query($query);
                  $data     = mysqli_fetch_array($hasil);
                  $jmldata = $data['jumData'];
                  ?>
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?php echo $jmldata ?></h3>
                      <p>Total Pesanan</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="?pg=pmsn&act=view" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div><!-- ./col -->
              </div><!-- /.row -->
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div> <!-- /.col -->
      </div>



      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-12 connectedSortable">
          <div class="callout callout-danger" style="background-color: #red !important;">
            <h4>Selamat Datang "<?php echo strtoupper($_SESSION['username']); ?>"</h4>
            <p>DI APLIKASI DIGITAL MENU CAFE ROADWAY COFFEE</p>
          </div>

        </section><!-- right col -->
      </div><!-- /.row (main row) -->

    </section><!-- /.content -->
  </div>
</div>