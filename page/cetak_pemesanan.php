<?php
// sesuai kan root file mPDF anda
$nama_dokumen = 'Laporan pemesanan MCC'; //Beri nama file PDF hasil.
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

$tglpemesananaw = $_POST['tglpemesananaw'];
$tglpemesananak = $_POST['tglpemesananak'];


$tglaw = tgl_indo($tglpemesananaw);
$tglak = tgl_indo($tglpemesananak);

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
                <left> LAPORAN PEMESANAN DIGITAL MENU CAFE ROADWAY COFFEE<br> </left>
                <center> <?php echo "TANGGAL $tglaw SAMPAI  $tglak" ?> </center>
            </h2>

        </th>
    </tr>
</table>
<hr style="height:8px;" />

<br>
<h3 style="text-align:center;"> LAPORAN PEMESANAN DIGITAL MENU CAFE ROADWAY COFFEEDIGITAL MENU CAFE ROADWAY COFFEE</h3>


<table cellspacing="0" cellpadding="5" border="1">

    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kode Transaksi</th>
        <th>Nama Menu</th>
        <th>Harga</th>
        <th>Jumlah Beli</th>
        <th>Total pemesanan</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $tampil = $mysqli->query("SELECT a.*,b.*,c.*,d.* FROM transaksi_pemesanan a INNER JOIN transaksi_pemesanan_detail b
     ON a.id=b.id_pemesanan INNER JOIN menu c ON b.id_menu=c.id INNER JOIN harga d 
     ON c.id=d.id_menu WHERE a.tgl BETWEEN  '$_POST[tglpemesananaw]' AND '$_POST[tglpemesananak]'
     order by a.kd_transaksi asc");
        $no = 1;
        while ($r = mysqli_fetch_array($tampil)) {
            $total = $r['harga'] * $r['porsi'];
        ?>
            <tr>
                <td><?php echo "$no" ?></td>
                <td><?php echo "$r[tgl]" ?></td>
                <td><?php echo "$r[kd_transaksi]" ?></td>
                <td><?php echo "$r[nama_menu]" ?></td>
                <td><?php echo "$r[atas_nama]" ?></td>
                <td><?php echo "Rp. " . number_format("$r[harga]", '0', '.', '.') ?></td>
                <td><?php echo "<b>$r[porsi]</b> porsi" ?> </td>
                <td><?php echo "Rp. " . number_format("$total", '0', '.', '.') ?></td>

            </tr>
        <?php
            $no++;
        }
        ?>

        <tr>
            <td align="center" colspan="7"> <span style="font-weight:bold">TOTAL</span></td>
            <?php

            $liatHarga = mysqli_fetch_array($mysqli->query("SELECT sum(total) as total_pemesanan FROM transaksi_pemesanan

                        where  tgl BETWEEN '$_POST[tglpemesananaw]' AND  '$_POST[tglpemesananak]'

                        ORDER BY kd_transaksi ASC"));
            ?>

            <td><span style="font-weight:bold"><?php echo "Rp." . number_format("$liatHarga[total_pemesanan]", '0', '.', '.') ?></td>

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