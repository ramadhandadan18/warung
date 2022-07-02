<?php
// sesuai kan root file mPDF anda
$nama_dokumen = 'Laporan pembayaran MCC'; //Beri nama file PDF hasil.
define('_MPDF_PATH', '../config/MPDF60/'); //sesuaikan dengan root folder anda
include(_MPDF_PATH . "mpdf.php"); //includekan ke file mpdf
$mpdf = new mPDF('utf-8', 'A4'); // Create new mPDF Document
//Beginning Buffer to save PHP variables and HTML tags
ob_start();

//Tuliskan file HTML di bawah sini , sesuai File anda .
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak
    masalah.-->
<?php

// Koneksi ke database //

error_reporting(0);
include "../config/koneksi.php";
include "../config/fungsi_indotgl.php";

$tglpembayaranaw = $_POST['tglpembayaranaw'];
$tglpembayaranak = $_POST['tglpembayaranak'];


$tglaw = tgl_indo($tglpembayaranaw);
$tglak = tgl_indo($tglpembayaranak);

?>

<!--CONTOH Code START-->
<table border='0' align='LEFT'>
    <tr>
        <th>
            <img src="../dist/img/logo.jpg" align="left" width='110' height='100px'>
        </th>
        <th width="20">
        </th>
        <th width="900px" align="left">
            <h2>
                <left> LAPORAN PEMBAYARAN DIGITAL MENU CAFE ROADWAY COFFEE<br> </left>
                <center> <?php echo "TANGGAL $tglaw SAMPAI  $tglak" ?> </center>
            </h2>

        </th>
    </tr>
</table>
<hr style="height:8px;" />

<br>
<h3 style="text-align:center;"> LAPORAN PEMBAYARAN DIGITAL MENU CAFE ROADWAY COFFEE </h3>


<table cellspacing="0" cellpadding="5" border="1">

    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kode pembayaran</th>
        <th>Kode Pemesanan</th>
        <th>Atas Nama</th>
        <th>Total Tagihan</th>
        <th>Total Bayar</th>
        <th>Total Kembali</th>
        <!-- <th>Status</th> -->
    </tr>
    </thead>
    <tbody>
        <?php
        $tampil = $mysqli->query("SELECT a.*,a.kd_transaksi as kd_transaksi_pemesanan, b.kd_transaksi as kd_transaksi_pembayaran, b.* FROM transaksi_pemesanan a INNER JOIN transaksi_pembayaran  b ON a.id=b.id_pemesanan WHERE a.tgl BETWEEN  '$_POST[tglpembayaranaw]' AND  '$_POST[tglpembayaranak]'order by b.tgl asc");
        $no = 1;
        while ($r = mysqli_fetch_array($tampil)) {
            $total = $r['harga'] * $r['porsi'];
            //   if($r[status]==0){
            //   $status = "<button type='button' class='btn btn-danger'><i class ='fa  fa-exclamation-triangle'> Belum Bayar</i></button>";
            // } else {
            //   $status = "<button type='button' class='btn btn-primary' style='background-color: #dd3974 !important;''><i class ='fa fa-check-square'> Sudah Bayar</i></button>";
            // }
        ?>
            <tr>
                <td><?php echo "$no" ?></td>
                <td><?php echo "$r[tgl]" ?></td>
                <td><?php echo "$r[kd_transaksi_pembayaran]" ?></td>
                <td><?php echo "$r[kd_transaksi_pemesanan]" ?></td>
                <td><?php echo "$r[atas_nama]" ?></td>
                <td><?php echo "Rp. " . number_format("$r[total]", '0', '.', '.') . " " ?></td>
                <td><?php echo "Rp. " . number_format("$r[nominal_bayar]", '0', '.', '.') . " " ?></td>
                <td><?php echo "Rp. " . number_format("$r[kembali]", '0', '.', '.') . " " ?></td>
                <!-- <td><?php echo "$status" ?></td>  -->

            </tr>
        <?php
            $no++;
        }
        ?>

        <tr>
            <td align="center" colspan="6"> <span style="font-weight:bold">TOTAL</span></td>
            <?php

            $liatHarga = mysqli_fetch_array($mysqli->query("SELECT sum(total) as total_pembayaran FROM transaksi_pembayaran

                        where  tgl BETWEEN '$_POST[tglpembayaranaw]' AND  '$_POST[tglpembayaranak]'

                        ORDER BY kd_transaksi ASC"));
            ?>

            <td><span style="font-weight:bold"><?php echo "Rp." . number_format("$liatHarga[total_pembayaran]", '0', '.', '.') ?></td>

        </tr>
    </tbody>
</table>

<br> <br>

<br>
<br>
<table border='0' align='right'>
    <tr>
        <br>
        <th><?php
            $tanggal = tgl_indo(date('Y-m-d'));
            ?>
            <p style="margin: 50px 8px 5px 420px;"> Gresik, <?php echo "$tanggal" ?>
                <h4>
                    <center> </center>
                </h4>
                <br>
                <br>
                <br>
                <br>
                Pemilik
        </th>
    </tr>
</table>

<?php
//Batas file sampe sini
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//$stylesheet = file_get_contents('css/zebra.css');
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
exit;
?>