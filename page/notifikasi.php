              <?php
              include '../config/koneksi.php';
              // mysql_connect('localhost','root','');
              // mysql_select_db('aplikasi_pemesanan');

              $query   = "SELECT COUNT(*) as jumData  FROM transaksi_pemesanan Where status='0' ";
              $hasil  = $mysqli->query($query);
              $data     = mysqli_fetch_array($hasil);
              $jmldata = $data['jumData'];
              ?>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning" id="loading"><?php echo $jmldata ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Kamu Memiliki <?php echo $jmldata ?> Pesanan</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <?php
                    $tampil = $mysqli->query(" SELECT * FROM transaksi_pemesanan order by tgl desc");
                    $no = 1;
                    while ($r = mysqli_fetch_array($tampil)) {
                    ?>
                      <li>
                        <a href="?pg=pmsn&act=view">
                          <i class="fa fa-list text-aqua"></i> Pesanan Meja No. <?php echo "$r[nomer_meja] " ?>, Nama : <?php echo "$r[atas_nama]" ?>
                        </a>
                      </li>
                    <?php } ?>
                  </ul>